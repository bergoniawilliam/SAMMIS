<?php

namespace App\Livewire\ReportedMotorcycles\Add;

use Livewire\Component;
use Livewire\Attributes\On; 
use Livewire\Attributes\Validate;
class Page extends Component
{
    public $currentForm = 1;
    public $disablePreviousButton=true;
    public $disableNextButton=false;
    #[Validate('required|min:3')] 
    public $blotter_number = '';

    public function render()
    {
        return view('livewire.reported-motorcycles.add.page')->extends('layouts.app')
            ->section('content');
    }

    public function nextForm()
    {
        $this->dispatch('store-motorcycle');
    }

    public function previousForm()
    {
        $this->currentForm--;
        $this->disableNextButton = false;
        $this->disablePreviousButton = $this->currentForm === 1 ? true : false; 
    }

    #[On('validation-success')] 
    public function handleValidationSuccess()
    {
        $this->currentForm++;
        $this->disablePreviousButton = false;
        $this->disableNextButton = $this->currentForm === 3 ? true : false;
    }
}
