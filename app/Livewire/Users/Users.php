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
    public $search='';
    use WithPagination;
    public function render()
    { 
        if (!$this->search) {
        $this->users = User::all();
        } else {
        $this->users = User::where('email', 'LIKE', '%' . $this->search . '%')
                   ->orWhere('first_name', 'LIKE', '%' . $this->search . '%')
                   ->get();
        }
        
        return view('livewire.users.users')->extends('layouts.app')
        ->section('content');
        
    }
   

    public function updatedSearch()
    {
       
    }
}
