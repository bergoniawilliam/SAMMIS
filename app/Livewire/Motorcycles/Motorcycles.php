<?php

namespace App\Livewire\Motorcycles;
use App\Models\Motorcycle;
use App\Models\RefRank;
use App\Models\UnitOffice;
use Livewire\Component;
use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;

class Motorcycles extends Component
{
    public $motorcycles;
    public $motorcycleID;
    
    public function render()
    {
        $this->motorcycles = Motorcycle::all();
        $this->ranks = RefRank::all();
        $this->unit_offices = UnitOffice::all();
        return view('livewire.motorcycles.motorcycles')->extends('layouts.app')
        ->section('content');
    }

    public function mount()
    {
        // dd(Region::all());
        // dd(Province::all());
        // dd(City::all());
        // dd(Barangay::find(1));
    }
}
