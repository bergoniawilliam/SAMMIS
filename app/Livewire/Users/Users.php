<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Station;
use Livewire\WithPagination;
use Auth;

use Livewire\Attributes\On;
class Users extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage=10;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatedPaginate()
    {
        $this->resetPage();
    }

    public function render()
    {
        if(!Auth::user()->can('view user')){
            abort(403);
        }
        return view('livewire.users.users', [
            'users' =>  User::where('email', 'LIKE', '%' . $this->search . '%')
                  ->orWhere('first_name', 'LIKE', '%' . $this->search . '%')
                  ->paginate($this->perPage),
        ])->extends('layouts.app')->section('content');
    }
}