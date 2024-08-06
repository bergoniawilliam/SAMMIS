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

        

        foreach ($roles as $roleName)
        {
            $role = Role::where('name', $roleName)->first();
            if (! $role) {
                $role = Role::create(['name' => $roleName]);
            }
            
            if($roleName === 'admin')
            {
                $permissions = [];
                $resources = ['user','reportedmotorcycle'];
                foreach ($resources as $resource)
                {
                    $permissionList = ['view','create','update','delete'];
                    foreach($permissionList as $access)
                    {
                        $permissionName = $access . ' ' . $resource;
                        $this->createPermissionIfNotExist($permissionName);
                        $permissions[] = $permissionName;
                    }
                    $role->syncPermissions($permissions);
                }
            }

            if($roleName === 'encoder')
            {
                $permissions = [];
                $resources = ['reportedmotorcycle'];
                foreach ($resources as $resource)
                {
                    $permissionList = ['view','create','update','delete'];
                    foreach($permissionList as $access)
                    {
                        $permissionName = $access . ' ' . $resource;
                        $this->createPermissionIfNotExist($permissionName);
                        $permissions[] = $permissionName;
                    }
                    $role->syncPermissions($permissions);
                }
            }

            if($roleName === 'verifier')
            {
                $permissions = [];
                $resources = ['reportedmotorcycle'];
                foreach ($resources as $resource)
                {
                    $permissionList = ['view'];
                    foreach($permissionList as $access)
                    {
                        $permissionName = $access . ' ' . $resource;
                        $this->createPermissionIfNotExist($permissionName);
                        $permissions[] = $permissionName;
                    }
                    $role->syncPermissions($permissions);
                }
            }

            if($roleName === 'viewer')
            {
                $permissions = [];
                $resources = ['reportedmotorcycle'];
                foreach ($resources as $resource)
                {
                    $permissionList = ['view'];
                    foreach($permissionList as $access)
                    {
                        $permissionName = $access . ' ' . $resource;
                        $this->createPermissionIfNotExist($permissionName);
                        $permissions[] = $permissionName;
                    }
                    $role->syncPermissions($permissions);
                }
            }
        }

    }
    
    public function createPermissionIfNotExist($permissionName)
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
