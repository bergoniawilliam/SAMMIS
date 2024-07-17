<?php

namespace App\Livewire\ReportedMotorcycles\Add;

use Livewire\Component;
use Livewire\Attributes\On;

class Motorcycle extends Component
{
    public $motor_model;
    public function render()
    {
        return view('livewire.reported-motorcycles.add.motorcyle');
    }

    protected function rules()
    {
        return [
            'motor_model' => 'required',
        ];
    }

    #[On('store-motorcycle')] 
    public function store()
    {
        $this->validate();
        // dd('validate lang muna ng motorcycle form');
    }
}
