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
use App\Models\VerificationReport;
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
    public function performSearch()
    {
        // This method is triggered when the search button is clicked
        $this->render();
    }
    public function clearSearch()
{
    // Reset the search field and refresh the table.
    $this->reset('search');
    $this->render();
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
    public function storeMotorcyle($ownerId , $reporterId)
    {
            $reportmotorcycle = ReportedMotorcycle::create([
            'blotter_number' => $this->blotter_number,
            'plate_number' => $this->plate_number,
            'chassis_number' => $this->chassis_number,
            'engine_number' => $this->engine_number,
            'region' => $this->selected_region_name,
            'province' => $this->selected_province_name,
            'municipality' => $this->selected_city_name,
            'barangay' => $this->selected_barangay_name,
            'mvfile_number' => $this->mvfile_number,
            'street' => $this->street,
            'date_time_missing' => $this->date_time_missing,
            'date_time_missing' => $this->date_time_missing,
            'motorcycle_reporters_id' => $reporterId,
            'reported_motorcycle_owners_id' => $ownerId,
            'type' => $this->type,
            'make' => $this->make,
            'model' => $this->model,
            'color' => $this->color,
            'ioc' => $this->ioc,
            'station_id' => Auth::user()->station_id,
            'created_by_id' => Auth::user()->id,
            'updated_by_id' => Auth::user()->id,
        ]);
            $reportmotorcycleId = $reportmotorcycle->id;
            $this->dispatch('store-status', $reportmotorcycleId);
       
    }
   
    
}
