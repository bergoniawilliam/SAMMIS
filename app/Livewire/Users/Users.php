<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Station;
use Livewire\WithPagination;
use Livewire\Attributes\On;
class Users extends Component
{
    public $users;
    public $userId;
    use WithPagination;
    public function render()
    { 
        $this->users = User::all();
        return view('livewire.users.users')
            ->extends('layouts.app')
            ->section('content');
        
    }
}
