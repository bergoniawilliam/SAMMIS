<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
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
    public $selected_unit_office_id;
    public $unit_office_id;
    public $selected_station_id;
    public $rank;
    public $station;



    protected $rules = [
        'email' => 'required|email|string',
        'first_name' => 'required',
        'last_name' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
   
    ];

    #[On('addUserForm')]
    public function createForm(){
        $this->update_mode = false;
        //clear the fields here
        $this->clearForm();
    }

    #[On('populateForm')]
    public function populateForm($userId){
        $this->update_mode = true;
        $this->user = User::find($userId);
        if($this->user){       
            $this->email = $this->user->email;
            $this->rank = $this->user->rank;
            $this->first_name = $this->user->first_name;
            $this->middle_name = $this->user->middle_name;
            $this->last_name = $this->user->last_name;
            $this->qualifier = $this->user->qualifier;
            $this->selected_station_id = $this->user->station_id;
            $this->selected_unit_office_id = $this->user->unit_office_id;
            // $this->updatedSelectedUnitOfficeId($this->user->unit_office_id);
            
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
        $this->dispatch('refresList');
    }
    public function store()
    {
        $this->validate();
        User::create([
            'email' => $this->email,
            'password' => Hash::make('qwerty54321'),
            'rank' => $this->rank,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'qualifier' => $this->qualifier,
            'station_id' => $this->selected_station_id,
            'unit_office_id' => $this->selected_unit_office_id,
        ]);
   
       
        session()->flash('message', 'User has been created successfully!');
        $this->clearForm();
    }

    public function updateUser()
    {
        $this->validate();
        $this->user->update([
            'email' => $this->email,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'qualifier' => $this->qualifier,
            'rank' => $this->rank,
            'station_id' => $this->selected_station_id,
            'unit_office_id' => $this->selected_unit_office_id
        ]);
        session()->flash('message', 'User has been updated successfully!');
    }

    public function destroyUser(){
        $this->dispatch('showDeleteMessage', lastName: $this->last_name);
        $this->user->delete();
        $this->clearForm();
    }
    public function render()
    {
         return view('livewire.user.users-form');
         
    }
     public function mount()
    {
        $this->unit_offices = UnitOffice::all();
        $this->ranks = RefRank::all();
        $this->stations = Station::all(); 

    }
    //  public function updatedSelectedUnitOfficeId($selected_unit_office_id)
    // {
    //     $this->stations = Station::where('unit_office_id', $selected_unit_office_id)->get();
    // //    dd($selected_unit_office_id);
    // }

    public function updateStationsList()
    {
        $stations = Station::where('unit_office_id', $this->selected_unit_office_id)->get();
        $this->stations= $stations;
    }


    public function clearSuccessMessage()
    {
        session()->forget('message');
    }
    public function clearForm(){
        $this->update_mode = false;
        $this->reset(['id','email', 'first_name', 'middle_name', 'last_name', 'qualifier','selected_unit_office_id','selected_station_id','rank']);
    }

}