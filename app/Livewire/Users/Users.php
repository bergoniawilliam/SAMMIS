<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Station;
use Livewire\WithPagination;

use Livewire\Attributes\On;
class Users extends Component
{
    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        return view('livewire.users.users', [
            'users' =>  User::where('email', 'LIKE', '%' . $this->search . '%')
                  ->orWhere('first_name', 'LIKE', '%' . $this->search . '%')->paginate(5),
        ])->extends('layouts.app')->section('content');
    }
}