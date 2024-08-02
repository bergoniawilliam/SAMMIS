<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use App\Models\ReportedMotorcycle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ReportedMotorcyclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportedMotorcycle::factory()
        ->count(50)
        ->create();
    }
}

