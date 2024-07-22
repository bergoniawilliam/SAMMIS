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
        MotorcycleReporter::create([

            'first_name' => 'william',
            'middle_name' => 'dorado',
            'last_name' => 'bergonia 1',
            'qualifier' => 'Barangay 1',
            'cellphone_number' => '1',
            'region' => 'Region 1',
            'province' => 'Province 1',
            'municipality' => 'Municipality 1',
            'barangay' => 'Barangay 1',
            'street' => 'Street 1',
            'home_unit_number' => 'Street 1',
           
         
        ]);
    }
}