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
        $query = User::query();

        if ($this->search) {
            $query->where('email', 'LIKE', '%' . $this->search . '%')
                  ->orWhere('first_name', 'LIKE', '%' . $this->search . '%');
        }

        $users = $query->paginate(5);

        return view('livewire.users.users', [
            'users' => $users,
        ])->extends('layouts.app')->section('content');
    }
}