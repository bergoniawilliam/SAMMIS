<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::firstOrCreate([
            'name' => 'view user',
            'guard_name' => 'web',
        ]);

        Permission::firstOrCreate([
            'name' => 'create user',
            'guard_name' => 'web',
        ]);

        Permission::firstOrCreate([
            'name' => 'update user',
            'guard_name' => 'web',
        ]);

        Permission::firstOrCreate([
            'name' => 'delete user',
            'guard_name' => 'web',
        ]);

    }
}
