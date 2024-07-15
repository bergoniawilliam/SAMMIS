<?php

namespace App\Livewire\Users;
use App\Models\UnitOffice;
use App\Models\RefRank;
use App\Models\Station;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
 
class UsersAdd extends Component
{
    public $email = "";
    public $first_name = "";
    public $middle_name = "";
    public $last_name = "";
    public $qualifier = "";
    public $unit_offices;
    public $ranks;
    public $stations;
    public $selected_station_name="";
    public $selected_rank_id;
    public $selected_unit_office_id="";
    public $isActive="1";
    public $users;

    public function render()
    {
        $this->ranks = RefRank::all();
        $this->unit_offices = UnitOffice::all();
        return view('livewire.users.users-add') 
            ->extends('layouts.app')
            ->section('content');
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
    protected function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'selected_station_name' => ['required', function ($attribute, $value, $fail) {
                if ($value !== 'All' && !in_array($value, $this->stations->pluck('name')->toArray())) {
                    $fail('The selected station is invalid.');
                }
            }],
        ];
    }
    public function save()
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
            'station_id' => $this->getStationId($this->selected_station_name),
            'unit_office_id' => $this->selected_unit_office_id ? $this->selected_unit_office_id : null,
            'isActive' => $this->isActive,
        ]);
   
       
        session()->flash('message', 'User has been created successfully!');
        
    }
    public function getStationId($station_name){
        $station = Station::where("name", $station_name)->pluck('id');
        if(count($station) > 0){
            return Station::where("name", $station_name)->pluck('id')[0];
        }
    }
    public function clearSuccessMessage()
    {
        session()->forget('message');  
    }
    
}
