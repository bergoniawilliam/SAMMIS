<?php

namespace App\Livewire\ReportedMotorcycles\Add;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On; 
use Livewire\Attributes\Validate;
class Page extends Component
{
    public $currentForm = 1;
    public $disablePreviousButton=true;
    public $disableNextButton=false;
    public $nextButtonLabel="Next";
    public $ownerId;

    public function render()
    {
        return view('livewire.reported-motorcycles.add.page')->extends('layouts.app')
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
        $this->disablePreviousButton = $this->currentForm === 1 ? true : false; 
         if($this->currentForm === 3)
        {
            $this->nextButtonLabel = "Next";
        }
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
          
            $this->dispatch('store-owner');
            $this->currentForm--;
        }
    }
    public function clearSuccessMessage()
    {
         session()->forget('message');  
    }
}
