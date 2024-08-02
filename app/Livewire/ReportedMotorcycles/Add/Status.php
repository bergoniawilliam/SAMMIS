<?php

namespace App\Livewire\ReportedMotorcycles\Add;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\ReportedMotorcycleStatus;
use Illuminate\Support\Facades\Auth;

class Status extends Component
{
    public $status="Missing/Stolen";
    public $remarks;
    public function render()
    {
        return view('livewire.reported-motorcycles.add.status');
    }
      protected function rules()
    {
        return [
          
           'status' => ['required', 'string'],
           'remarks' => ['required', 'string'],
           
        ];
    }
    #[On('validate-status')] 
    public function validateStatus()
    {
        
        $this->validate();
        $this->dispatch('validation-success'); //dispatch nya yung validation-success. Check Page.php line 34 
    }

    #[On('store-status')] 
    public function storeStatus($reportmotorcycleId)
    {
            ReportedMotorcycleStatus::create([
            'reported_motorcycles_id' => $reportmotorcycleId,
            'status' => 'Missing/Stolen',
            'remarks' => $this->remarks,
            'created_by_id' => Auth::user()->id,
            'updated_by_id' => Auth::user()->id,
        ]);
        session()->flash('message', 'Reported Motorcycle has been created successfully!');
        return redirect('reported-motorcycles');
    }

}
