<?php

namespace App\Livewire\ReportedMotorcycles\Edit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On; 
use Livewire\Attributes\Validate;
use App\Models\ReportedMotorcycle;
class Page extends Component
{
    public $currentForm = 1;
    public $disablePreviousButton=true;
    public $disableNextButton=false;
    public $nextButtonLabel="Next";
    public $reportmotorcycle;
    public $reportmotorcycleId;
    public $reporter;
    public $reporterId;
    public $owner;
    public $ownerId;
    public function render() 
    {
        return view('livewire.reported-motorcycles.edit.page')->extends('layouts.app')
            ->section('content');
        
    }
     public function nextForm()
    {
        switch ($this->currentForm) {
            case (1):
                $this->dispatch('validate-motorcycle');
                break;
            case (2):
                $this->dispatch('validate-reporter');
                break;
            case (3):
                $this->dispatch('validate-owner'); 
                break;
             case (4):
                $this->dispatch('validate-status');
                break;
        }
    }

    public function previousForm()
    {
        $this->currentForm--;
        $this->disableNextButton = false;
        $this->disablePreviousButton = $this->currentForm === 1 ? true: false; 
         if($this->currentForm === 3)
        {
            $this->nextButtonLabel = "Next";
        }
    }

    public function skip()
    {
       
        $this->currentForm = 4;
        $this->nextButtonLabel = "Submit";
        $this->disablePreviousButton = false;
        // dd($this->currentForm);

      
    }
    #[On('validation-success')] 
    public function handleValidationSuccess()
    {
        
        $this->currentForm++;
        $this->disablePreviousButton = false;
        if($this->currentForm === 4)
        {
            $this->nextButtonLabel = "Submit";
        }
        if($this->currentForm === 5)
        { 
          
            $this->dispatch('update-owner');
            $this->currentForm--;
        }
    }
    public function clearSuccessMessage()
    {
         session()->forget('message');  
    }

    public function mount($id){
        $this->reportmotorcycle = ReportedMotorcycle::find($id);
        $this->reportmotorcycleId = $this->reportmotorcycle->id;
        $this->reporterId = $this->reportmotorcycle->motorcycle_reporters_id;
        $this->ownerId = $this->reportmotorcycle->reported_motorcycle_owners_id;
    }
    public function populateForms(){
        if( $this->reportmotorcycleId)
        {
            $this->dispatch('populateReported-MotorcycleForm', $this->reportmotorcycleId);
            $this->dispatch('populate-ReporterForm', $this->reporterId);
            $this->dispatch('populate-OwnerForm', $this->ownerId);
            $this->dispatch('populate-StatusForm', $this->reportmotorcycleId);
        }
    } 

   
} 
