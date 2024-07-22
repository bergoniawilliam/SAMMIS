<?php

namespace Database\Seeders;

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
        ReportedMotorcycle::create([
            'blotter_number' => '12312312',
            'region' => 'Region 1',
            'province' => 'Province 1',
            'municipality' => 'Municipality 1',
            'barangay' => 'Barangay 1',
            'street' => 'Street 1',
            'plate_number' => 'XYZ123',
            'mvfile_number' => 'MV123456789',
            'chassis_number' => 'CH123456789',
            'engine_number' => 'EN123456789',
            'date_time_missing' => now(),
            'motorcycle_reporters_id' => 1, // Assuming a foreign key
            'reported_motorcycle_owners_id' => 1, // Assuming a foreign key
            'type' => 'Type 1',
            'make' => 'Make 1',
            'model' => 'Model 1',
            'color' => 'Red',
            'ioc' => 'Pat Juan Dla Cruz',            
            'station_id' => 1, // Assuming a foreign key
            'created_by_id' => 1, // Assuming a foreign key
            'updated_by_id' => 1, // Assuming a foreign key
        ]);

         ReportedMotorcycle::create([
            'blotter_number' => 'XXX12312',
            'region' => 'Region 2',
            'province' => 'Province 2',
            'municipality' => 'Municipality2',
            'barangay' => 'Barangay 2',
            'street' => 'Street 2',
            'plate_number' => 'ABC123',
            'mvfile_number' => '31231231',
            'chassis_number' => 'BF56456456',
            'engine_number' => '5THG5H45645645',
            'date_time_missing' => now(),
            'motorcycle_reporters_id' => 1, // Assuming a foreign key
            'reported_motorcycle_owners_id' => 1, // Assuming a foreign key
            'type' => 'Type 1',
            'make' => 'Make 1',
            'model' => 'Model 1',
            'color' => 'Red',
            'ioc' => 'Pat Juan Dla Cruz',            
            'station_id' => 1, // Assuming a foreign key
            'created_by_id' => 1, // Assuming a foreign key
            'updated_by_id' => 1, // Assuming a foreign key
        ]);

       
    }
}
