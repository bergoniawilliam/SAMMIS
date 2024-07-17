<?php

namespace App\Livewire\ReportedMotorcycles\Add;

use Livewire\Component;

class Owner extends Component
{
    public $owner_name;
    public function render()
    {
        return view('livewire.reported-motorcycles.add.owner');
    }
}
