<?php

namespace Database\Seeders;
use App\Models\MotorcycleReporter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class MotorcycleReporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MotorcycleReporter::factory()
        ->count(50)
        ->create();
    }
}
