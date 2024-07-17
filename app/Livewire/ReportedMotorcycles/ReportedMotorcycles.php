<?php

namespace App\Livewire\ReportedMotorcycles;
use App\Models\ReportedMotorcycle;
use App\Models\RefRank;
use App\Models\UnitOffice;
use Livewire\Component;
use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;

class ReportedMotorcycles extends Component
{
    public $motorcycles;
    public $motorcycleID;
    
    public function render()
    {
        $this->motorcycles = ReportedMotorcycle::all();
        $this->ranks = RefRank::all();
        $this->unit_offices = UnitOffice::all();
        return view('livewire.reported-motorcycles.reported-motorcycles')->extends('layouts.app')
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
