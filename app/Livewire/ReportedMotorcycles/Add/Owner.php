<?php

namespace App\Livewire\ReportedMotorcycles\Add;

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
    public $selected_region_name_owner="asdasdasd";
    public $selected_province_name_owner="asdasdasd";
    public $selected_city_name_owner="asdasdasd";
    public $selected_barangay_name_owner="asdasdasd";
    public $regions_owner;
    public $provinces_owner;
    public $cities_owner;
    public $barangays_owner;
    public $last_name_owner="asdasdasd";
    public $first_name_owner="asdasdasd";
    public $middle_name_owner="asdasdasd";
    public $qualifier_owner="asdasdasd";
    public $cellphone_number_owner="12312312";
    public $street_owner="asdasdasd";
    public $home_unit_number_owner="asdasdasd";
    public $ownerId;
    public function render()
    {
        $this->motorcycles = MotorcycleReporter::all();
        $this->ranks = RefRank::all();
        $this->unit_offices = UnitOffice::all();
        return view('livewire.reported-motorcycles.add.owner');
    }
    protected function rules()
    {
        return [
            'first_name_owner' => ['required', 'string'],   
            'last_name_owner' => ['required', 'string'], 
            'cellphone_number_owner' => ['required', 'string'], 
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
            
            $this->selected_province_name_owner = "";
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
            $this->selected_city_name_owner = "";
            $this->provinces_owner = null;
            $this->cities_owner = null;
            $this->barangays_owner = null;
            
        }
    }
    public function updateBarangayList_owner()
    {
          if($this->selected_city_name_owner !== "")
        {
            $city = City::where('name', $this->selected_city_name_owner)->get();
            $city_id = count($city) ? $city->pluck('city_id') : null;
            $this->barangays_owner = $city_id ? Barangay::where('city_id', $city_id)->get() : null;            
        }
        else
        {
            $this->selected_barangay_name_owner = "";
            $this->provinces_owner = null;
            $this->cities_owner = null;
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
    #[On('store-owner')] 
    public function storeOwner()
    {
            $owner = ReportedMotorcycleOwner::create([
            'first_name' => $this->first_name_owner,
            'middle_name' => $this->middle_name_owner,
            'last_name' => $this->last_name_owner,
            'qualifier' => $this->qualifier_owner,
            'cellphone_number' => $this->cellphone_number_owner,
            'region' => $this->selected_region_name_owner,
            'province' => $this->selected_province_name_owner,
            'municipality' => $this->selected_city_name_owner,
            'barangay' => $this->selected_barangay_name_owner,
            'street' => $this->street_owner,
            'home_unit_number' => $this->home_unit_number_owner,
            'created_by_id' => Auth::user()->id,
            'updated_by_id' => Auth::user()->id,
        ]);
            $ownerId = $owner->id;  
            // Dispatch the store-motorcycle event with the owner ID
            $this->dispatch('store-reporter', $ownerId);

    }

}
