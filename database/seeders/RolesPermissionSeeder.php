<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $roles = Role::pluck('name');

        $resources = ['user','reportedmotorcycle'];

        foreach ($roles as $roleName)
        {
            $role = Role::where('name', $roleName)->first();
            if (! $role) {
                $role = Role::create(['name' => $roleName]);
            }
            $permissions = [];
            foreach ($resources as $resource) {
                //view
                $permissionName = 'view ' . $resource;
                $this->createRoleIfNotExist($permissionName);
                $permissions[] = $permissionName;

                //create
                $permissionName = 'create ' . $resource;
                $this->createRoleIfNotExist($permissionName);
                $permissions[] = $permissionName;

                //update
               $permissionName = 'update ' . $resource;
                $this->createRoleIfNotExist($permissionName);
                $permissions[] = $permissionName;

                $permissionName = 'delete ' . $resource;
                $this->createRoleIfNotExist($permissionName);
                $permissions[] = $permissionName;
            }
            $role->syncPermissions($permissions);
        }

    }
    
    public function createRoleIfNotExist($permissionName)
    {
        $permissions = Permission::pluck('name')->toArray();
        $result = in_array($permissionName, $permissions);

        if (! $result) {
            //create the permission if not exist
            Permission::firstOrCreate([
                'name' => $permissionName,
                'guard_name' => 'web',
            ]);
        }
    }


}
