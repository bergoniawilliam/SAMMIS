<?php

namespace App\Livewire\Viewer;

use Livewire\Component;
use App\Models\Station;
use App\Models\UnitOffice;
use App\Models\VerificationReport;

class VerificationReports extends Component
{
    public $verificationReports;
    public $selected_unit_office_id=null;
    public $unit_offices;

  public function mount()
{
    $this->verificationReports = VerificationReport::with('station.unitOffice', 'user.rank')->get();
}


    public function render()
    {
        $this->unit_offices = UnitOffice::all()->reverse();
        
        return view('livewire.viewer.verification-report', [
            'verificationReports' => $this->verificationReports,
        ])->extends('layouts.app')->section('content');
    }
     public function updatedSelectedUnitOfficeId($selected_unit_office_id, $station_id = null)
    {
        
        $this->selected_station_name='All';
        if($selected_unit_office_id){
            $this->stations = Station::where('unit_office_id', $selected_unit_office_id)->get();
        }else{
            $this->stations = Station::all();
        }
        
    }
}
