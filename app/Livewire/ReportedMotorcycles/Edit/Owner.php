<?php

namespace App\Livewire\ReportedMotorcycles\Edit;

use App\Models\MotorcycleReporter;
use App\Models\ReportedMotorcycleOwner;
use App\Models\RefRank;
use App\Models\UnitOffice; 
use App\Models\Station;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;
use Livewire\Attributes\On;

class Owner extends Component
{
     public $owner_name;
    public $reporter_name;
    public $motor_model;
    public $selected_region_name_owner;
    public $selected_province_name_owner;
    public $selected_city_name_owner;
    public $selected_barangay_name_owner;
    public $regions_owner;
    public $provinces_owner;
    public $cities_owner;
    public $barangays_owner;
    public $last_name_owner;
    public $first_name_owner;
    public $middle_name_owner;
    public $qualifier_owner;
    public $cellphone_number_owner;
    public $street_owner;
    public $home_unit_number_owner;
    public $ownerId;
    public $reportedmotorcycleowner;
    public function render()
    {
        $this->motorcycles = MotorcycleReporter::all();
        $this->ranks = RefRank::all();
        $this->unit_offices = UnitOffice::all();
        return view('livewire.reported-motorcycles.edit.owner');
    }
     protected function rules()
    {
        return [
            'first_name_owner' => ['required', 'string'],   
            'last_name_owner' => ['required', 'string'], 
            'cellphone_number_owner' => ['required', 'integer'], 
            'selected_region_name_owner' => ['required', 'string'],
            'selected_province_name_owner' => ['required', 'string'],
            'selected_city_name_owner' => ['required', 'string'],
            'selected_barangay_name_owner' => ['required', 'string'],
            'street_owner' => ['required', 'string'],
            'home_unit_number_owner' => ['required', 'string'],
            
        ];
    }
    public function loadInitAddresses_owner()
    { 
        $this->regions_owner = Region::all();
       
    }
      public function updateProvincesList_owner()
    {
        
        if($this->selected_region_name_owner !== "")
        {
            $region = Region::where('name', $this->selected_region_name_owner)->get();
            $region_id = count($region) ? $region->pluck('region_id') : null;
            $this->provinces_owner = $region_id ? Province::where('region_id', $region_id)->get() : null;
        }
        else
        {
            
            $this->selected_province_name_owner = null;
            $this->provinces_owner = null;
            $this->cities_owner = null;
            $this->barangays_owner = null;
             
        }
    }
     #[On('validate-owner')] 
    public function validateOwner()
    {
        $this->validate();
        $this->dispatch('validation-success');
    }
    
    public function updateCitiesList_owner()
    {
          if($this->selected_province_name_owner !== "")
        {
            $province = Province::where('name', $this->selected_province_name_owner)->get();
            $province_id = count($province) ? $province->pluck('province_id') : null;
            $this->cities_owner = $province_id ? City::where('province_id', $province_id)->get() : null;
        }
        else
        {
            $this->selected_city_name_owner = null;
            $this->cities_owner = null;
            $this->barangays_owner = null;
            
        }
    }
    public function updateBarangayList_owner()
    {
          if($this->selected_city_name_owner !== "")
        {
            // $city = City::where('name', $this->selected_city_name_owner)->get();
            // $city_id = count($city) ? $city->pluck('city_id') : null;
            // $this->barangays_owner = $city_id ? Barangay::where('city_id', $city_id)->get() : null;    
            
             $province = Province::where('name', $this->selected_province_name_owner)->get();
            $province_id = count($province) ? $province->pluck('province_id') : null;
            $city = City::where('name', $this->selected_city_name_owner)->where('province_id', $province_id)->get();
            $city_id = count($city) ? $city->pluck('city_id') : null;
            $this->barangays_owner = $city_id ? Barangay::where('city_id', $city_id)->orderBy('name', 'ASC')->get() : null;   
        }
        else
        {
            $this->selected_barangay_name_owner = null;
            $this->barangays_owner = null;
            
        }
    } 
    public function clearProvince_owner()
    {
        $this->selected_province_name_owner = '';
        $this->selected_city_name_owner = '';
        $this->selected_barangay_name_owner = '';
        
    }
     public function clearCities_owner()
    {
        $this->selected_city_name_owner = '';
        $this->selected_barangay_name_owner = '';
    }
    public function clearBarangay_owner()
    { 
        $this->selected_barangay_name_owner = '';
    }
     #[On('populate-OwnerForm')]
    public function populateOwnerForm($ownerId)
    {
        // dd($reporterId);
        $this->reportedmotorcycleowner = ReportedMotorcycleOwner::find($ownerId);
        // dd($this->reportedmotorcycleowner);
        if($this->reportedmotorcycleowner){       
            $this->first_name_owner = $this->reportedmotorcycleowner->first_name;
            $this->middle_name_owner = $this->reportedmotorcycleowner->middle_name;
            $this->last_name_owner = $this->reportedmotorcycleowner->last_name;
            $this->qualifier_owner = $this->reportedmotorcycleowner->qualifier;
            $this->cellphone_number_owner = $this->reportedmotorcycleowner->cellphone_number;
            $this->selected_region_name_owner = $this->reportedmotorcycleowner->region;
            $this->selected_province_name_owner = $this->reportedmotorcycleowner->province;
            $this->selected_city_name_owner = $this->reportedmotorcycleowner->municipality;
            $this->selected_barangay_name_owner = $this->reportedmotorcycleowner->barangay;
            $this->street_owner = $this->reportedmotorcycleowner->street;
            $this->home_unit_number_owner = $this->reportedmotorcycleowner->home_unit_number;
           
        }
    }

     #[On('update-owner')]
    public function updateOwner()
    {
        $this->validate();
        $this->reportedmotorcycleowner = ReportedMotorcycleOwner::find($this->reportedmotorcycleowner->id);
        $this->reportedmotorcycleowner->first_name = $this->first_name_owner;
        $this->reportedmotorcycleowner->middle_name = $this->middle_name_owner;
        $this->reportedmotorcycleowner->last_name = $this->last_name_owner;
        $this->reportedmotorcycleowner->qualifier = $this->qualifier_owner;
        $this->reportedmotorcycleowner->cellphone_number = $this->cellphone_number_owner;
        $this->reportedmotorcycleowner->region = $this->selected_region_name_owner;
        $this->reportedmotorcycleowner->province = $this->selected_province_name_owner;
        $this->reportedmotorcycleowner->municipality = $this->selected_city_name_owner;
        $this->reportedmotorcycleowner->barangay = $this->selected_barangay_name_owner;
        $this->reportedmotorcycleowner->street = $this->street_owner;
        $this->reportedmotorcycleowner->home_unit_number = $this->home_unit_number_owner;
        $this->reportedmotorcycleowner->updated_by_id = Auth::user()->id;
        $this->reportedmotorcycleowner->save();

        $ownerId = $this->reportedmotorcycleowner->id;
        $this->dispatch('update-repoter',$ownerId);
        // session()->flash('message', 'User has been updated successfully!');
    }
}
