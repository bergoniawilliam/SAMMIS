<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use App\Models\UnitOffice;
use App\Models\RefRank;
use App\Models\Station;

class UsersForm extends Component
{
    public $user;
    public $id;
    public $email = "";
    public $first_name = "";
    public $middle_name = "";
    public $last_name = "";
    public $qualifier = "";
    public $update_mode = false;
    public $unit_offices;
    public $ranks;
    public $stations;
    public $selected_unit_office_id=null;
    public $selected_station_id="all";
    public $selected_rank_id=null;
    public $selected_station="All";
        
    protected function rules()
    {
        return [
            'email' => ['required', 'email', 'string', $this->update_mode ? Rule::unique('users')->ignore($this->user->id) : 'unique:users,email'],
            'first_name' => 'required',
            'last_name' => 'required',
            'selected_station' => ['required', function ($attribute, $value, $fail) {
                if ($value !== 'All' && !in_array($value, $this->stations->pluck('name')->toArray())) {
                    $fail('The selected station is invalid.');
                }
            }],
        ];
    }

    #[On('addUserForm')]
    public function createForm(){
        $this->update_mode = false;
        //clear the fields here
        $this->resetMessage();
        $this->clearForm();

    }

    #[On('populateForm')]
    public function populateForm($userId){
        $this->resetMessage();
        $this->update_mode = true;
        $this->user = User::find($userId);
        
        if($this->user){       
            $this->email = $this->user->email;
            $this->first_name = $this->user->first_name;
            $this->middle_name = $this->user->middle_name;
            $this->last_name = $this->user->last_name;
            $this->qualifier = $this->user->qualifier;
            $this->selected_rank_id = $this->user->rank_id;
            $this->selected_unit_office_id = $this->user->unit_office_id;
            $this->loadInitialStations($this->user->station_id);
            $this->selected_station = $this->user->station ? $this->user->station->name : "All";
        }
    }

    #[On('deleteUserForm')]
    public function deleteUserForm($userId)
    {
        $this->user = User::find($userId);
        if($this->user){
            $this->email = $this->user->email;
            $this->first_name = $this->user->first_name;
            $this->middle_name = $this->user->middle_name;
            $this->last_name = $this->user->last_name;
            $this->qualifier = $this->user->qualifier;
        }
    }
   
    public function save()
    {
        if($this->update_mode){
            $this->updateUser();
        }else{
            $this->store();
        }
        // $this->dispatch('refresList');
    }
    public function store()
    {
        $this->validate();
        User::create([
            'email' => $this->email,
            'password' => Hash::make('qwerty54321'),
            'rank_id' => $this->selected_rank_id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'qualifier' => $this->qualifier,
            'station_id' => $this->getStationId($this->selected_station),
            'unit_office_id' => $this->selected_unit_office_id ? $this->selected_unit_office_id : null,
        ]);
   
       
        session()->flash('message', 'User has been created successfully!');
        $this->clearForm();
    }

    public function updateUser()
    {
        $this->validate();
        //  dd($this->getStationId($this->selected_station));
        $this->user->update([
            'email' => $this->email,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'qualifier' => $this->qualifier,
            'rank_id' => $this->selected_rank_id,
            'station_id' => $this->getStationId($this->selected_station),
            'unit_office_id' => $this->selected_unit_office_id ? $this->selected_unit_office_id : null,
        ]);
        session()->flash('message', 'User has been updated successfully!');
    }

    public function getStationId($station_name){
        $station = Station::where("name", $station_name)->pluck('id');
        if(count($station) > 0){
            return Station::where("name", $station_name)->pluck('id')[0];
        }
    }

    public function destroyUser(){
        $this->dispatch('showDeleteMessage', lastName: $this->last_name);
        $this->user->delete();
        $this->clearForm();
    }

    public function render()
    {  
        $this->ranks = RefRank::all();
        $this->unit_offices = UnitOffice::orderBy('unit_office_name','asc')->get();
        
        $this->loadInitialStations();
        return view('livewire.user.users-form');
        
    }


    public function updatedSelectedUnitOfficeId($selected_unit_office_id, $station_id = null)
    {
        $this->stations = null;
        $this->stations = Station::where('unit_office_id', $selected_unit_office_id)->get();
    }

    public function loadInitialStations($station_id = null)
    { 
        $unit_office = UnitOffice::find($this->selected_unit_office_id);
        if ($unit_office) {
            $this->stations = $unit_office->stations()->orderBy('name', 'asc')->get();
        }
        else
        {
            $this->stations = Station::all();
        }
    }

    public function resetMessage()
    {
        session()->forget('message');
    }
    
    public function clearForm(){
        $this->update_mode = false;
        $this->reset(['id','email', 'first_name', 'middle_name', 'last_name', 'qualifier','selected_rank_id','selected_unit_office_id','selected_station','stations']);
    }

}