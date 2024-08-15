<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ReportedMotorcycle;

class Counter extends Component
{
    public $reportedMotorcycles;

    public function mount()
    {
        // Eager load station and unit office relationships
        $this->reportedMotorcycles = ReportedMotorcycle::with('station.unitOffice')->get();
    }

    public function render()
    {
        return view('livewire.counter', [
            'reportedMotorcycles' => $this->reportedMotorcycles,
        ])->extends('layouts.app');
    }
}
