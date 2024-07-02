<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
class Users extends Component
{
    public $search = '';
    public $users;
    public $userId;
    use WithPagination;
    
    public function render()
    {
        $this->users = User::all();
        return view('livewire.user.users')->extends('layouts.app')->section('content');
    }
      public function editUser($id)
    {
        $this->dispatch('populateForm', $id);
    }
   
}
