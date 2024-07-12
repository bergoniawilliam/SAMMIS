<?php

namespace App\Livewire\User;

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
    
    

    public function addUser(){
        $this->dispatch('addUserForm');
    }

   

    public function deleteUser($id)
    {
        $this->dispatch('deleteUserForm', userId: $id);
    }

    #[On('showDeleteMessage')]
    public function showDeleteMessage($lastName)
    {
        session()->flash('message', $lastName . ' has been delete successfully!');
    }

    public function clearSuccessMessage()
    {
        session()->forget('message');
        $this->dispatch('loadInitialStations');
       
        
    }
    #[On('refresList')]
    public function render()
    {
        $this->users = User::all();
        return view('livewire.user.users')
            ->extends('layouts.app')
            ->section('content');
    }
     public function editUser($id)
    {
        $this->dispatch('populateForm', userId: $id);
    }
   
}
