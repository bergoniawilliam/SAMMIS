<?php

namespace App\Livewire\Viewer;

use Livewire\Component;
use App\Models\Station;
use App\Models\UnitOffice;
use App\Models\VerificationReport;
use App\Models\User;
use Auth;

class VerificationReports extends Component
{
    
    public $selected_unit_office_id;
    public $selected_station_id;
    public $selected_station_name="All";
    public $stations;
    public $date_from; // Add this line
    public $date_to;   // Add this line
    public $verificationReports = [];
    public $unit_offices = [];
    public $isInitialLoadUnitOffices = true;
    public $isInitialLoadStations = true;
    
    

    public function mount()
    {
        $this->verificationReports = VerificationReport::all();
        $this->applyFilters();
        
    }


    public function render()
    {
        $this->unit_offices = UnitOffice::all()->reverse();
        $this->applyFilters();
        $this->loadUnitOffices();
        return view('livewire.viewer.verification-report', [
            'verificationReports' => $this->verificationReports,
        ])->extends('layouts.app')->section('content');
       
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
            $this->selected_station_name = "All";
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
            $this->selected_station_name = "All";
        }
        $this->loadUnitOffices();
    }
     protected function loadUnitOffices()
    {
        $user = Auth::user();
        if($user->unit_office_id === null){
            $this->isInitialLoadUnitOffices = true;
        }else{
            $this->isInitialLoadUnitOffices = false;
        }
        if($user->station_id === null){
            $this->isInitialLoadStations = true;
        }else{
            $this->isInitialLoadStations = false;
        }
    }
    protected function applyFilters()
    {
        $user = Auth::user();
        $query = VerificationReport::query();
        if ($user->unit_office_id) {
            $this->selected_unit_office_id = $user->unit_office_id;
            $station_ids = UnitOffice::find($user->unit_office_id)->stations()->pluck('id');
            $query->whereIn('station_id', $station_ids);
        }
        if ($user->station_id) {
            $this->loadInitialStations($user->station_id);
            $this->selected_station_name = $user->station->name;
            $query->where('station_id', $user->station_id);
            
        }
        if ($this->selected_unit_office_id) {
            $station_ids = UnitOffice::find($this->selected_unit_office_id)->stations()->pluck('id');
            $query->whereIn('station_id', $station_ids);
        }
         if ($this->selected_station_name && $this->selected_station_name !== 'All') {
            $station = Station::where('name', $this->selected_station_name)->first();
            if ($station) {
                $query->where('station_id', $station->id);
            }
        }
        if ($this->date_from) {
            $query->whereDate('created_at', '>=', $this->date_from);
        }
        if ($this->date_to) {
            $query->whereDate('created_at', '<=', $this->date_to);
        }
        $this->verificationReports = $query->get();
    }
}
