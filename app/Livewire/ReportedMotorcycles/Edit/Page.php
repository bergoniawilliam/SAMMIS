<?php

namespace App\Livewire\ReportedMotorcycles\Edit;

use Livewire\Component;
use Livewire\Attributes\On; 
class Page extends Component
{
    public $currentForm = 1;
    public $disablePreviousButton=true;
    public $disableNextButton=false;
    public function render()
    {
        return view('livewire.reported-motorcycles.edit.page')->extends('layouts.app')
            ->section('content');
    }
     public function nextForm()
    {
        $this->dispatch('store-motorcycle');
        $this->currentForm++;
        $this->disablePreviousButton = false;
        $this->disableNextButton = $this->currentForm === 3 ? true: false;
  
    }

    public function previousForm()
    {
        $this->currentForm--;
        $this->disableNextButton = false;
        $this->disablePreviousButton = $this->currentForm === 1 ? true: false;
        
    }
}
