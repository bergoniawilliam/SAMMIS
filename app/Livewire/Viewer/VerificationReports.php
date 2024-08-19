<?php

namespace App\Livewire\Viewer;

use Livewire\Component;
use App\Models\Station;
use App\Models\UnitOffice;
use App\Models\VerificationReport;

class VerificationReports extends Component
{
    public $verificationReports;
    public $selected_unit_office_id;
    public $unit_offices;
    public $selected_station_name="All";
    public $stations;
    public $date_from; // Add this line
    public $date_to;   // Add this line
    

    public function mount()
    {
        $this->verificationReports = VerificationReport::all();
    }


    public function render()
    {
        $this->unit_offices = UnitOffice::all()->reverse();
        
        return view('livewire.viewer.verification-report', [
            'verificationReports' => $this->verificationReports,
        ])->extends('layouts.app')->section('content');
    }

    public function filterResults()
    {
        // if($this->selected_unit_office_id)
        // {
        //     $station_ids = UnitOffice::find($this->selected_unit_office_id)->stations()->pluck('id');
        //     $this->verificationReports = VerificationReport::whereIn('station_id', $station_ids)->get();
        // }
        // else
        // {
        //     $this->verificationReports = VerificationReport::all();            
        // }
         // Start the query for filtering verification reports
    $query = VerificationReport::query();

        // Filter by selected unit office ID
        if ($this->selected_unit_office_id) {
            $station_ids = UnitOffice::find($this->selected_unit_office_id)->stations()->pluck('id');
            $query->whereIn('station_id', $station_ids);
        }

        // Filter by selected station name if it's not 'All'
        if ($this->selected_station_name && $this->selected_station_name !== 'All') {
            $station = Station::where('name', $this->selected_station_name)->first();
            if ($station) {
                $query->where('station_id', $station->id);
            }
        }

        // Filter by Date From
        if ($this->date_from) {
            $query->whereDate('created_at', '>=', $this->date_from);
        }

        // Filter by Date To
        if ($this->date_to) {
            $query->whereDate('created_at', '<=', $this->date_to);
        }

        // Get the filtered results
        $this->verificationReports = $query->get();


    }
        public function clearSearch()
    {
        // Reset the search field and refresh the table.
        $this->reset('selected_unit_office_id');
        $this->verificationReports = VerificationReport::all();
        $this->stations = Station::all();
        $this->selected_station_name = "All";
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
        
    }
}
