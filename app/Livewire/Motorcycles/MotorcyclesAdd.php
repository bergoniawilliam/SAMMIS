<?php

namespace App\Livewire\Motorcycles;
use App\Models\Motorcycle;
use App\Models\RefRank;
use App\Models\UnitOffice;
use App\Models\Station;
use Livewire\Component;

class MotorcyclesAdd extends Component
{ 
    public $unit_offices; 
    public $ranks;
    public $stations;
    public $selected_unit_office_id=null;
    public $selected_station_name="";
    public $selected_rank_id=null;
    public function render()
    {
        $this->motorcycles = Motorcycle::all();
        $this->ranks = RefRank::all();
        $this->unit_offices = UnitOffice::all();
        return view('livewire.motorcycles.motorcycles-add')->extends('layouts.app')
            ->section('content');
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
}
