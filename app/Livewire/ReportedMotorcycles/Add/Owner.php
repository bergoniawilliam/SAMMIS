<?php

namespace App\Livewire\ReportedMotorcycles\Add;

use App\Models\MotorcycleReporter;
use App\Models\RefRank;
use App\Models\UnitOffice; 
use App\Models\Station;

use Livewire\Component;

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
    public $selected_region_name="";
    public $selected_province_name="";
    public $selected_city_name="";
    public $selected_barangay_name="";
    public $regions;
    public $provinces;
    public $cities;
    public $barangays;
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
            'motor_model' => 'required',
        ];
    }
     public function loadInitAddresses()
    { 
        $this->regions = Region::all();
       
    }
      public function updateProvincesList()
    {
        
        if($this->selected_region_name !== "")
        {
            $region = Region::where('name', $this->selected_region_name)->get();
            $region_id = count($region) ? $region->pluck('region_id') : null;
            $this->provinces = $region_id ? Province::where('region_id', $region_id)->get() : null;
        }
        else
        {
            
            $this->selected_province_name = "";
            $this->provinces = null;
            $this->cities = null;
            $this->barangays = null;
             
        }
    }
     #[On('store-motorcycle')] 
    public function store()
    {
        $this->validate();
        // dd('validate lang muna ng motorcycle form');
    }
    public function updateCitiesList()
    {
          if($this->selected_province_name !== "")
        {
            $province = Province::where('name', $this->selected_province_name)->get();
            $province_id = count($province) ? $province->pluck('province_id') : null;
            $this->cities = $province_id ? City::where('province_id', $province_id)->get() : null;
        }
        else
        {
            $this->selected_city_name = "";
            $this->provinces = null;
            $this->cities = null;
            $this->barangays = null;
            
        }
    }
    public function updateBarangayList()
    {
          if($this->selected_city_name !== "")
        {
            $city = City::where('name', $this->selected_city_name)->get();
            $city_id = count($city) ? $city->pluck('city_id') : null;
            $this->barangays = $city_id ? Barangay::where('city_id', $city_id)->get() : null;            
        }
        else
        {
            $this->selected_barangay_name = "";
            $this->provinces = null;
            $this->cities = null;
            $this->barangays = null;
            
        }
    }
    public function clearProvince()
    {
        $this->selected_province_name = '';
        $this->selected_city_name = '';
        $this->selected_barangay_name = '';
        
    }
     public function clearCities()
    {
        $this->selected_city_name = '';
        $this->selected_barangay_name = '';
    }
    public function clearBarangay()
    {
        $this->selected_barangay_name = '';
    }
}
