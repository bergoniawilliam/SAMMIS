<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReportedMotorcycleOwner;

class ReportedMotorcycleOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportedMotorcycleOwner::create([

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
            'created_by_id' => 1, // Assuming a foreign key
            'updated_by_id' => 1, // Assuming a foreign key
           
         
        ]);
    }
}
