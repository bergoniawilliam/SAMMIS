<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\UnitOffice;
use App\Models\RefRank;
use App\Models\Station;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\AuditTrailUser;
class UsersEdit extends Component
{
    public $user;
    public $id;
    public $email = "";
    public $isActive=false;
    public $first_name = "";
    public $middle_name = "";
    public $last_name = "";
    public $qualifier = "";
    public $update_mode = false;
    public $unit_offices; 
    public $ranks;
    public $stations;
    public $selected_unit_office_id=null;
    public $selected_station_name="";
    public $selected_rank_id=null;
    public $selected_station="All";
 
    protected function rules()
    {
        return [
            'email' => ['required', 'email', 'string', Rule::unique('users')->ignore($this->user->id)],
            'first_name' => 'required',
            'last_name' => 'required',
            'selected_station_name' => ['required', function ($attribute, $value, $fail) {
                if ($value !== 'All' && !in_array($value, $this->stations->pluck('name')->toArray())) {
                    $fail('The selected station is invalid.');
                    
                }
            }],
        ];
    }

    public function render()
    {
        if (!$this->user)
        {
            abort(404);
        }
        $this->ranks = RefRank::all();
        $this->unit_offices = UnitOffice::all();
        return view('livewire.users.users-edit')
            ->extends('layouts.app')
            ->section('content');
            
    }
    public function mount($id)
    {
  
        $this->user = User::find($id);
        if($this->user){       
            $this->email = $this->user->email;
            $this->first_name = $this->user->first_name;
            $this->middle_name = $this->user->middle_name;
            $this->last_name = $this->user->last_name;
            $this->qualifier = $this->user->qualifier;
            $this->selected_rank_id = $this->user->rank_id;
            $this->selected_unit_office_id = $this->user->unit_office_id;
            $this->loadInitialStations($this->user->station_id);
            $this->selected_station_name = $this->user->station ? $this->user->station->name : "All";
            $this->isActive = $this->user->isActive;
        }
    }
     public function updatedSelectedUnitOfficeId($selected_unit_office_id, $station_id = null)
    {
        $this->stations = null;
        $this->selected_station_name='All';
        if($selected_unit_office_id){
            $this->stations = Station::where('unit_office_id', $selected_unit_office_id)->get();
        }else{
            $this->stations = Station::all();
        }
        
    }
     public function loadInitialStations()
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
    public function getStationId($station_name){
        $station = Station::where("name", $station_name)->pluck('id');
        if(count($station) > 0){
            return Station::where("name", $station_name)->pluck('id')[0];
        }
        else
        {
            return 0;
        }
    }

    public function update()
    {
        $this->validate();
        $user = User::find($this->user->id);
        $user->email = $this->email;
        $user->first_name = $this->first_name;
        $user->middle_name = $this->middle_name;
        $user->middle_name = $this->middle_name;
        $user->last_name = $this->last_name;
        $user->qualifier = $this->qualifier;
        $user->rank_id = $this->selected_rank_id;
        $user->station_id = $this->getStationId($this->selected_station_name);
        $user->unit_office_id = $this->selected_unit_office_id ? $this->selected_unit_office_id : null;
        $user->isActive = $this->isActive;
        // $user->save();

        $newValues = $user->getDirty();
        // dd($newValues);
        $changes = [];
        foreach ($newValues as $attribute => $newValue)
        {
            $oldValue = $user->getOriginal($attribute);
            $changes [] = "{ $attribute : $oldValue to $newValue }";
        }

        // dd($changes);

        if (!empty($user->getDirty())) {
            AuditTrailUser::create([
                'user_id' => $this->user->id,
                'action' => 'update',
                'updated_fields' => $changes,
            ]);
            $user->save();
        }


        session()->flash('message', 'User has been updated successfully!');
    }
    public function clearSuccessMessage()
    {
        session()->forget('message');  
    }
     public function toggleIsActive()
    {
         $this->isActive = !$this->isActive ? 0 : 1;
        $this->user->isActive = $this->isActive;

    }
     

}
