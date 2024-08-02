<?php

namespace Database\Seeders;
use App\Models\ReportedMotorcycleOwner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportedMotorcycleOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportedMotorcycleOwner::factory()
        ->count(50)
        ->create();
    }
}
