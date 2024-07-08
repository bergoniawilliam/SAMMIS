<?php

namespace Database\Seeders;
use App\Models\UnitOffice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitOfficesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
         UnitOffice::create([
            'unit_office_name' => 'Cagayan Police Provincial Office',
            'abbvr' => 'CPPO',
        ]);
        UnitOffice::create([
            'unit_office_name' => 'Isabela Police Provincial Office',
            'abbvr' => 'IPPO',
        ]);
        UnitOffice::create([
            'unit_office_name' => 'Nueva Vizcaya Police Provincial Office',
            'abbvr' => 'NVPPO',
        ]);
         UnitOffice::create([
            'unit_office_name' => 'Quirino Police Provincial Office',
            'abbvr' => 'QPPO',
        ]);
         UnitOffice::create([
            'unit_office_name' => 'Santiago City Provincial Office',
            'abbvr' => 'SCPO',
        ]);
        UnitOffice::create([
            'unit_office_name' => 'Batanes Police Provincial Office',
            'abbvr' => 'BPPO',
        ]);
    }
}
