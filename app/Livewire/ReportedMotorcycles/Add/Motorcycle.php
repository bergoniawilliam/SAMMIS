<?php

namespace App\Livewire\ReportedMotorcycles\Add;

use App\Models\MotorcycleReporter;
use App\Models\ReportedMotorcycle;
use App\Models\RefRank;
use App\Models\UnitOffice; 
use App\Models\Station;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;
use Livewire\Attributes\On;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class Motorcycle extends Component
{
    public $motor_model;
    public $selected_region_name=null;
    public $selected_province_name=null;
    public $selected_city_name=null;
    public $selected_barangay_name=null;
    public $regions;
    public $provinces;
    public $cities;
    public $barangays;
    public $request;
    public $blotter_number="asdasdasd";
    public $plate_number="asdasdasd";
    public $chassis_number="asdasdasd";
    public $engine_number="asdasdasd";
    public $mvfile_number="asdasdasd";
    public $street="asdasdasd";
    public $date_time_missing;
    public $type="MC";
    public $make="asdasdasd";
    public $model="asdasdasd";
    public $color="asdasdasd";
    public $ioc="asdasdasd";
    public $ownerId;
    public $reporterId;
    public $reportmotorcycleId;
   
    public function render()
    {
        $this->motorcycles = MotorcycleReporter::all();
        $this->ranks = RefRank::all();
        $this->unit_offices = UnitOffice::all();
        return view('livewire.reported-motorcycles.add.motorcyle');
    }

    
    protected function rules()
    {
        return [
           'blotter_number' => ['required', 'string', Rule::unique('reported_motorcycles')],
           'plate_number' => ['required', 'string', Rule::unique('reported_motorcycles')],
           'chassis_number' => ['required', 'string', Rule::unique('reported_motorcycles')],
           'engine_number' => ['required', 'string', Rule::unique('reported_motorcycles')],
           'mvfile_number' => ['required', 'string', Rule::unique('reported_motorcycles')],
           'selected_region_name' => ['required', 'string'],
           'selected_province_name' => ['required', 'string'],
           'selected_city_name' => ['required', 'string'],
           'selected_barangay_name' => ['required', 'string'],
           'street' => ['required', 'string'],
           'date_time_missing' => ['required','date'],
           'type' => ['required', 'string'],
           'make' => ['required', 'string'],
           'model' => ['required', 'string'],
           'color' => ['required', 'string'],
           'ioc' => ['required', 'string'],
           
        ];
    }

    public function loadInitAddresses()
    { 
        $this->regions = Region::all();
        // $this->provinces = Province::all();
        // $this->cities = City::all();
        // $this->barangays = Barangay::all();
        // dd(Province::where('region_id', 03)->get()->pluck('name')[0]);  get specific field and get the position of the value from the list
    }
    public function updateProvincesList()
    {
        
        if($this->selected_region_name !== "")
        {
            $region = Region::where('name', $this->selected_region_name)->get();
            $region_id = count($region) ? $region->pluck('region_id') : null;
            $this->provinces = $region_id ? Province::where('region_id', $region_id)->orderBy('name', 'ASC')->get() : null;
        }
        else
        {
            $this->selected_province_name = null;
            $this->provinces = null;
            $this->cities = null;
            $this->barangays = null;
        }
        
    }

    public function updateCitiesList()
    {
          if($this->selected_province_name !== "")
        {
            $province = Province::where('name', $this->selected_province_name)->get();
            $province_id = count($province) ? $province->pluck('province_id') : null;
            $this->cities = $province_id ? City::where('province_id', $province_id)->orderBy('name', 'ASC')->get() : null;
        }
        else
        {
            $this->selected_city_name = null;
            $this->cities = null;
            $this->barangays = null;
            
        }
    }
    public function updateBarangayList()
    {
        if($this->selected_city_name !== "")
        {
            $province = Province::where('name', $this->selected_province_name)->get();
            $province_id = count($province) ? $province->pluck('province_id') : null;
            $city = City::where('name', $this->selected_city_name)->where('province_id', $province_id)->get();
            $city_id = count($city) ? $city->pluck('city_id') : null;
            $this->barangays = $city_id ? Barangay::where('city_id', $city_id)->orderBy('name', 'ASC')->get() : null;            
        }

        else
        {
            $this->selected_barangay_name = null;
            $this->barangays = null;
        }
    }

    #[On('validate-motorcycle')] 
    public function validateMotor()
    {

        $this->date_time_missing = $this->date_time_missing ? Carbon::parse($this->date_time_missing)->format('Y-m-d H:i:s') : null;
        $this->validate();
        $this->dispatch('validation-success'); //dispatch nya yung validation-success. Check Page.php line 34 
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
    #[On('store-motorcycle')] 
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
