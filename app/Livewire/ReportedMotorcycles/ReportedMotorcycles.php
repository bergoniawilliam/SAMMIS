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
use Livewire\WithPagination;
use Auth;

class ReportedMotorcycles extends Component
{
    public $motorcycles;
    public $motorcycleID;
    use WithPagination;
    public $search = '';
    public $perPage=10;
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatedPaginate()
    {
        $this->resetPage(); 
    }
    public function render()
    {
        if(!Auth::user()->can('view reportedmotorcycle')){
            abort(403);
        }

        $this->ranks = RefRank::all();
        $this->unit_offices = UnitOffice::all();
        return view('livewire.reported-motorcycles.reported-motorcycles', [
            'reported_motorcycles' =>  ReportedMotorcycle::where('blotter_number', 'LIKE', '%' . $this->search . '%')
                  ->orWhere('plate_number', 'LIKE', '%' . $this->search . '%')
                  ->orWhere('mvfile_number', 'LIKE', '%' . $this->search . '%')
                  ->orWhere('chassis_number', 'LIKE', '%' . $this->search . '%')
                  ->orWhere('engine_number', 'LIKE', '%' . $this->search . '%')
                  ->orderBy('created_at', 'DESC')
                  ->paginate($this->perPage),
        ])->extends('layouts.app')
        ->section('content');
    }
    public function clearSuccessMessage()
    {
        session()->forget('message');
    }
   
    
}
