<?php
namespace App\Livewire\UserAccessControl;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditPermission extends Component
{
    public $role;
    public $permissions = [
        'user' => ['view', 'create', 'update', 'delete'],
        'reportedmotorcycle' => ['view', 'create', 'update', 'delete'],
        'useraccesscontrol' => ['view', 'create', 'update', 'delete'],
    ];
    public $rolePermissions = [];
    public $originalPermissions = [];

    public function mount($id)
    {
        $this->role = Role::findOrFail($id);

        // Initialize the rolePermissions and originalPermissions arrays
        foreach ($this->permissions as $resource => $actions) {
            foreach ($actions as $action) {
                $permissionName = $action . ' ' . $resource;
                $hasPermission = $this->role->hasPermissionTo($permissionName);
                $this->rolePermissions[$permissionName] = $hasPermission;
                $this->originalPermissions[$permissionName] = $hasPermission;
            }
        }
    }

    public function updatePermission($permissionName)
    {
        $this->rolePermissions[$permissionName] = !$this->rolePermissions[$permissionName];
    }

    public function savePermissions()
{
    foreach ($this->rolePermissions as $permissionName => $hasPermission) {
        if ($hasPermission && !$this->role->hasPermissionTo($permissionName)) {
            $this->role->givePermissionTo($permissionName);
        } elseif (!$hasPermission && $this->role->hasPermissionTo($permissionName)) {
            $this->role->revokePermissionTo($permissionName);
        }
    }

    // Log the permissions to debug
    // \Log::info('Updated permissions for role', ['role' => $this->role->name, 'permissions' => $this->rolePermissions]);

    // Refresh the originalPermissions to reflect the saved state
    $this->originalPermissions = $this->rolePermissions;

    // Redirect to refresh the page
    session()->flash('message', 'Permission updated successfully!');
    return redirect()->route('user-access-control.edit-permission', ['id' => $this->role->id]);
    
    
}


    public function resetPermissions()
    {
        // Revert to the original permissions
        $this->rolePermissions = $this->originalPermissions;
        return redirect()->route('user-access-control.edit-permission', ['id' => $this->role->id]);
        
        
    }

    public function render()
    {
        return view('livewire.user-access-control.edit-permission')
            ->extends('layouts.app')
            ->section('content');
    }
    public function clearSuccessMessage()
    {
        session()->forget('message');
    }
}
