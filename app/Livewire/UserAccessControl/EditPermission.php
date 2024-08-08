<?php

namespace App\Livewire\UserAccessControl;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class EditPermission extends Component
{
    public $role;
    public $permissions = [
        'user' => ['view', 'create', 'update', 'delete'],
        'reportedmotorcycle' => ['view', 'create', 'update', 'delete'],
        'developer' => ['view', 'create', 'update', 'delete'],
    ];
    public $rolePermissions = [];

    public function mount($id)
    {
        $this->role = Role::findOrFail($id);

        // Initialize the rolePermissions array
        foreach ($this->permissions as $resource => $actions) {
            foreach ($actions as $action) {
                $permissionName = $action . ' ' . $resource;
                $this->rolePermissions[$permissionName] = $this->role->hasPermissionTo($permissionName);
            }
        }
    }

    public function updatePermission($permissionName)
    {
        if ($this->role->hasPermissionTo($permissionName)) {
            $this->role->revokePermissionTo($permissionName);
        } else {
            $this->role->givePermissionTo($permissionName);
        }

        // Update the rolePermissions array
        $this->rolePermissions[$permissionName] = $this->role->hasPermissionTo($permissionName);
    }

    public function render()
    {
        return view('livewire.user-access-control.edit-permission')
        ->extends('layouts.app')->section('content');;
    }
   
}
