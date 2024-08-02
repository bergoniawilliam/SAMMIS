<?php

namespace Database\Seeders;
use App\Models\ReportedMotorcycleStatus;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportedMotorcycleStatus::factory()
        ->count(200)
        ->create();
    }
}
