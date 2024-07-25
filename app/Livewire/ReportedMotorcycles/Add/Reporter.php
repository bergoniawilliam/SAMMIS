<?php

namespace App\Livewire\ReportedMotorcycles\Add;

use App\Models\MotorcycleReporter;
use App\Models\RefRank;
use App\Models\UnitOffice; 
use App\Models\Station;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;
use Livewire\Attributes\On;

class Reporter extends Component
{ 
    public $reporter_name;
    public $motor_model;
    public $selected_region_name_reporter="asdasdasd";
    public $selected_province_name_reporter="asdasdasd";
    public $selected_city_name_reporter="asdasdasd";
    public $selected_barangay_name_reporter="asdasdasd";
    public $regions_reporter;
    public $provinces_reporter;
    public $cities_reporter;
    public $barangays_reporter;
    public $first_name_reporter="asdasdasd";
    public $middle_name_reporter="asdasdasd";
    public $last_name_reporter="asdasdasd";
    public $qualifier_reporter="asdasdasd";
    public $cellphone_number_reporter="12312312";
    public $street_reporter="12312312";
    public $home_unit_number_reporter="12312312";
    public $ownerId;
    

    public function render()
    {
        $this->motorcycles = MotorcycleReporter::all();
        $this->ranks = RefRank::all();
        $this->unit_offices = UnitOffice::all();
        return view('livewire.reported-motorcycles.add.reporter');
    }
    protected function rules()
    {
        return [
            'first_name_reporter' => ['required', 'string'],   
            'last_name_reporter' => ['required', 'string'], 
            'cellphone_number_reporter' => ['required', 'string'], 
            'selected_region_name_reporter' => ['required', 'string'],
            'selected_province_name_reporter' => ['required', 'string'],
            'selected_city_name_reporter' => ['required', 'string'],
            'selected_barangay_name_reporter' => ['required', 'string'],
            'street_reporter' => ['required', 'string'],
            'home_unit_number_reporter' => ['required', 'string'],
            
        ];
    }
     public function loadInitAddresses_reporter()
    { 
        $this->regions_reporter = Region::all();
       
    }
      public function updateProvincesList_reporter()
    {
        
        if($this->selected_region_name_reporter !== "")
        {
            $region = Region::where('name', $this->selected_region_name_reporter)->get();
            $region_id = count($region) ? $region->pluck('region_id') : null;
            $this->provinces_reporter = $region_id ? Province::where('region_id', $region_id)->get() : null;
        }
        else
        {
            
            $this->selected_province_name_reporter = "";
            $this->provinces_reporter = null;
            $this->cities_reporter = null;
            $this->barangays_reporter = null;
             
        }
    }
     #[On('validate-reporter')] 
    public function validateReporter()
    {
        $this->validate();
        $this->dispatch('validation-success');
    }
    
    public function updateCitiesList_reporter()
    {
          if($this->selected_province_name_reporter !== "")
        {
            $province = Province::where('name', $this->selected_province_name_reporter)->get();
            $province_id = count($province) ? $province->pluck('province_id') : null;
            $this->cities_reporter = $province_id ? City::where('province_id', $province_id)->get() : null;
        }
        else
        {
            $this->selected_city_name_reporter = "";
            $this->provinces_reporter = null;
            $this->cities_reporter = null;
            $this->barangays_reporter = null;
            
        }
    }
    public function updateBarangayList_reporter()
    {
          if($this->selected_city_name_reporter !== "")
        {
            $city = City::where('name', $this->selected_city_name_reporter)->get();
            $city_id = count($city) ? $city->pluck('city_id') : null;
            $this->barangays_reporter = $city_id ? Barangay::where('city_id', $city_id)->get() : null;            
        }
        else
        {
            $this->selected_barangay_name_reporter = "";
            $this->provinces_reporter = null;
            $this->cities_reporter = null;
            $this->barangays_reporter = null;
            
        }
    }
    public function clearProvince_reporter()
    {
        $this->selected_province_name_reporter = '';
        $this->selected_city_name_reporter = '';
        $this->selected_barangay_name_reporter = '';
        
    }
     public function clearCities_reporter()
    {
        $this->selected_city_name_reporter = '';
        $this->selected_barangay_name_reporter = '';
    }
    public function clearBarangay_reporter()
    {
        $this->selected_barangay_name_reporter = '';
    }

    #[On('store-reporter')] 
    public function storeReporter($ownerId)
    {
            $reporter = MotorcycleReporter::create([
            'first_name' => $this->first_name_reporter,
            'middle_name' => $this->middle_name_reporter,
            'last_name' => $this->last_name_reporter,
            'qualifier' => $this->qualifier_reporter,
            'cellphone_number' => $this->cellphone_number_reporter,
            'region' => $this->selected_region_name_reporter,
            'province' => $this->selected_province_name_reporter,
            'municipality' => $this->selected_city_name_reporter,
            'barangay' => $this->selected_barangay_name_reporter,
            'street' => $this->street_reporter,
            'home_unit_number' => $this->home_unit_number_reporter,
            'created_by_id' => Auth::user()->id,
            'updated_by_id' => Auth::user()->id,
        ]);
            $reporterId = $reporter->id;
            
            // Dispatch the store-motorcycle event with the owner ID
            $this->dispatch('store-motorcycle', $reporterId , $ownerId);

    }
}
