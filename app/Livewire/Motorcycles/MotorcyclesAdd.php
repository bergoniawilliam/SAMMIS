<?php

namespace App\Livewire\Motorcycles;
use App\Models\Motorcycle;
use App\Models\RefRank;
use App\Models\UnitOffice;
use App\Models\Station;
use Livewire\Component;

use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;

class MotorcyclesAdd extends Component
{ 
    public $selected_region_name="";
    public $regions;
    public $provinces;
    public $cities;
    public $barangays;

    public function render()
    {
        $this->motorcycles = Motorcycle::all();
        $this->ranks = RefRank::all();
        $this->unit_offices = UnitOffice::all();
        return view('livewire.motorcycles.motorcycles-add')->extends('layouts.app')
            ->section('content');
    }
    public function loadInitAddresses()
    { 
        $this->regions = Region::all();
        // $this->provinces = Province::all();
        // $this->cities = City::all();
        // $this->barangays = Barangay::all();
        // dd(Province::where('region_id', 03)->get()->pluck('name')[0]);  get specific field and get the position of the value from the list
    }

    public function updateProvincesList()
    {
        if($this->selected_region_name !== "")
        {
            $region = Region::where('name', $this->selected_region_name)->get();
            $region_id = count($region) ? $region->pluck('region_id') : null;
            $this->provinces = $region_id ? Province::where('region_id', $region_id)->get() : null;
        }
        else
        {
            $this->provinces = null;
            $this->cities = null;
            $this->barangays = null;
        }
    }

    public function updateCitiesList()
    {
        
    }

    public function updateBarangaysList()
    {
        
    }
}
