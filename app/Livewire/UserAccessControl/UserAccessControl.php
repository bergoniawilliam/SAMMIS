<?php

namespace App\Livewire\UserAccessControl;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Livewire\Component;

class UserAccessControl extends Component
{
    public $roleUserCounts;
    
    public function render()
    {
        return view('livewire.user-access-control.user-access-control')
        ->extends('layouts.app')->section('content');
    }

    public function mount()
    {
        $roles = Role::all();

        $this->roleUserCounts = $roles->mapWithKeys(function ($role) {
            return [$role->name => User::role($role->name)->count()];
        });
        
    }
}
