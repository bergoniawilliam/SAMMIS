<?php

namespace App\Livewire\ReportedMotorcycles\View;

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
    public $blotter_number;
    public $plate_number;
    public $chassis_number;
    public $engine_number;
    public $mvfile_number;
    public $street;
    public $date_time_missing;
    public $type;
    public $make;
    public $model;
    public $color;
    public $ioc;
    public $reportmotorcycle;
    public $reportmotorcycleId;
    public $motorcyclereporterId;
    public $reporter;
    public $reporterId;
    public $owner;
    public $ownerId;
    public $id;
    public function render()
    {
        $this->motorcycles = MotorcycleReporter::all();
        $this->ranks = RefRank::all();
        $this->unit_offices = UnitOffice::all();
        return view('livewire.reported-motorcycles.view.motorcycle');
    }
     #[On('populateReported-MotorcycleForm')]
    public function populateReportedMotorcycleForm($reportmotorcycleId)
    {
         $this->reportmotorcycle = ReportedMotorcycle::find($reportmotorcycleId);
        if($this->reportmotorcycle){       
            $this->blotter_number = $this->reportmotorcycle->blotter_number;
            $this->plate_number = $this->reportmotorcycle->plate_number;
            $this->chassis_number = $this->reportmotorcycle->chassis_number;
            $this->engine_number = $this->reportmotorcycle->engine_number;
            $this->mvfile_number = $this->reportmotorcycle->mvfile_number;
            $this->selected_region_name = $this->reportmotorcycle->region;
            $this->selected_province_name = $this->reportmotorcycle->province;
            $this->selected_city_name = $this->reportmotorcycle->municipality;
            $this->selected_barangay_name = $this->reportmotorcycle->barangay;
            $this->street = $this->reportmotorcycle->street;
            $this->type = $this->reportmotorcycle->type;
            $this->make = $this->reportmotorcycle->make;
            $this->model = $this->reportmotorcycle->model;
            $this->color = $this->reportmotorcycle->color;
            $this->ioc = $this->reportmotorcycle->ioc;
            $this->date_time_missing = $this->reportmotorcycle->date_time_missing;
        }
    }
    #[On('update-reportedMotorcycle')]
    public function updatereportedMotorcycle($ownerId,$motorcyclereporterId)
    {
        $this->validate();
        $this->reportmotorcycle = ReportedMotorcycle::find($this->reportmotorcycle->id);
        $this->reportmotorcycle->blotter_number = $this->blotter_number;
        $this->reportmotorcycle->plate_number = $this->plate_number;
        $this->reportmotorcycle->chassis_number = $this->chassis_number;
        $this->reportmotorcycle->engine_number = $this->engine_number;
        $this->reportmotorcycle->region = $this->selected_region_name;
        $this->reportmotorcycle->province = $this->selected_province_name;
        $this->reportmotorcycle->municipality = $this->selected_city_name;
        $this->reportmotorcycle->barangay = $this->selected_barangay_name;
        $this->reportmotorcycle->street = $this->street;
        $this->reportmotorcycle->date_time_missing = $this->date_time_missing;
        $this->reportmotorcycle->motorcycle_reporters_id = $motorcyclereporterId;
        $this->reportmotorcycle->reported_motorcycle_owners_id = $ownerId;
        $this->reportmotorcycle->type = $this->type;
        $this->reportmotorcycle->make = $this->make;
        $this->reportmotorcycle->model = $this->model;
        $this->reportmotorcycle->color = $this->color;
        $this->reportmotorcycle->ioc = $this->ioc;
        $this->reportmotorcycle->station_id = Auth::user()->station_id;
        $this->reportmotorcycle->updated_by_id = Auth::user()->id;
    //  dd("asdasdasd",$this->reportmotorcycle);
        $this->reportmotorcycle->save();
        
        $this->dispatch('update-status',$ownerId);
        // session()->flash('message', 'User has been updated successfully!');
    }



     protected function rules()
    {
        return [
           'blotter_number' => ['required', 'string', Rule::unique('reported_motorcycles')->ignore($this->reportmotorcycle->id)],
           'plate_number' => ['required', 'string', Rule::unique('reported_motorcycles')->ignore($this->reportmotorcycle->id)],
           'chassis_number' => ['required', 'string', Rule::unique('reported_motorcycles')->ignore($this->reportmotorcycle->id)],
           'engine_number' => ['required', 'string', Rule::unique('reported_motorcycles')->ignore($this->reportmotorcycle->id)],
           'mvfile_number' => ['required', 'string', Rule::unique('reported_motorcycles')->ignore($this->reportmotorcycle->id)],
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
    #[On('validate-motorcycle')] 
    public function validateMotor()
    {
 
        $this->date_time_missing = $this->date_time_missing ? Carbon::parse($this->date_time_missing)->format('Y-m-d H:i:s') : null;
        $this->validate();
        $this->dispatch('validation-success'); //dispatch nya yung validation-success. Check Page.php line 34 
        
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
