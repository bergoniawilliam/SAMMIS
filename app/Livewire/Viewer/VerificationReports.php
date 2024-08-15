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
        if($this->selected_unit_office_id)
        {
            $station_ids = UnitOffice::find($this->selected_unit_office_id)->stations()->pluck('id');
            $this->verificationReports = VerificationReport::whereIn('station_id', $station_ids)->get();
        }
        else
        {
            $this->verificationReports = VerificationReport::all();            
        }
    }
}
