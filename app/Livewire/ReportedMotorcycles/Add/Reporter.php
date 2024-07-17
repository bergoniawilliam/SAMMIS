<?php

namespace App\Livewire\ReportedMotorcycles\Add;

use Livewire\Component;

class Reporter extends Component
{
    public $reporter_name;

    public function render()
    {
        return view('livewire.reported-motorcycles.add.reporter');
    }
}
