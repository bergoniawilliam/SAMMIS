<?php

namespace Database\Seeders;
use App\Models\Unit_Offices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitOfficesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
         Unit_Offices::create([
            'unit_office_name' => 'Cagayan Police Provincial Office',
            'abbvr' => 'CPPO',
        ]);
        Unit_Offices::create([
            'unit_office_name' => 'Isabela Police Provincial Office',
            'abbvr' => 'IPPO',
        ]);
        Unit_Offices::create([
            'unit_office_name' => 'Nueva Vizcaya Police Provincial Office',
            'abbvr' => 'NVPPO',
        ]);
         Unit_Offices::create([
            'unit_office_name' => 'Quirino Police Provincial Office',
            'abbvr' => 'QPPO',
        ]);
         Unit_Offices::create([
            'unit_office_name' => 'Santiago City Provincial Office',
            'abbvr' => 'SCPO',
        ]);
        Unit_Offices::create([
            'unit_office_name' => 'Batanes Police Provincial Office',
            'abbvr' => 'BPPO',
        ]);
    }
}
