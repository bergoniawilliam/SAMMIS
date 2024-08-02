<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\RefRanks;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UnitOfficesSeeder::class);
        $this->call(StationsSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RolesPermissionSeeder::class);
        $this->call(RefRanksSeeder::class);
        $this->call(ReportedMotorcycleOwnerSeeder::class);
        $this->call(MotorcycleReporterSeeder::class);
        $this->call(ReportedMotorcyclesSeeder::class);
        $this->call(StatusSeeder::class);
    }
}
