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
       foreach (range(1, 50) as $index) {
        ReportedMotorcycle::create([
        'blotter_number' => Str::random(8),
        'region' => 'Region ' . $index,
        'province' => 'Province ' . $index,
        'municipality' => 'Municipality ' . $index,
        'barangay' => 'Barangay ' . $index,
        'street' => 'Street ' . $index,
        'plate_number' => 'XYZ' . Str::random(3),
        'mvfile_number' => 'MV' . Str::random(9),
        'chassis_number' => 'CH' . Str::random(9),
        'engine_number' => 'EN' . Str::random(9),
        'date_time_missing' => now(),
        'motorcycle_reporters_id' => 1, // Adjust as needed
        'reported_motorcycle_owners_id' => 1, // Adjust as needed
        'type' => 'Type ' . $index,
        'make' => 'Make ' . $index,
        'model' => 'Model ' . $index,
        'color' => 'Color ' . $index,
        'ioc' => 'Pat Juan Dela Cruz',
        'station_id' => rand(1, 10), // Adjust as needed
        'created_by_id' => 1, // Assuming a foreign key
        'updated_by_id' => 1, // Assuming a foreign key
    ]);
    }
    }
}
