<?php

namespace Database\Seeders;
use App\Models\RefRanks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefRanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       RefRanks::create([
            'name' => 'POLICE GENERAL',
            'abbvr' => 'PGEN',
        ]);
        RefRanks::create([
            'name' => 'POLICE LIEUTENANT GENERAL',
            'abbvr' => 'PLTGEN',
        ]);
        RefRanks::create([
            'name' => 'POLICE MAJOR GENERAL',
            'abbvr' => 'PMGEN',
        ]);
        RefRanks::create([
            'name' => 'POLICE BRIGADIER GENERAL',
            'abbvr' => 'PBGEN',
        ]);
        RefRanks::create([
            'name' => 'POLICE COLONEL',
            'abbvr' => 'PCOL',
        ]);
        RefRanks::create([
            'name' => 'POLICE LIEUTENANT COLONEL',
            'abbvr' => 'PLTCOL',
        ]);
        RefRanks::create([
            'name' => 'POLICE MAJOR',
            'abbvr' => 'PMAJ',
        ]);
        RefRanks::create([
            'name' => 'POLICE CAPTAIN',
            'abbvr' => 'PCPT',
        ]);
        RefRanks::create([
            'name' => 'POLICE LIEUTENANT',
            'abbvr' => 'PLT',
        ]);
        RefRanks::create([
            'name' => 'Police Executive Master Sergeant',
            'abbvr' => 'PEMS',
        ]);
        RefRanks::create([
            'name' => 'Police Chief Master Sergeant',
            'abbvr' => 'PCMS',
        ]);
        RefRanks::create([
            'name' => 'Police Senior Master Sergeant',
            'abbvr' => 'PSMS',
        ]);
        RefRanks::create([
            'name' => 'Police Master Sergeant',
            'abbvr' => 'PMSg',
        ]);
        RefRanks::create([
            'name' => 'Police Staff Sergeant',
            'abbvr' => 'PSSg',
        ]);
        RefRanks::create([
            'name' => 'Police Corporal',
            'abbvr' => 'PCpl',
        ]);
        RefRanks::create([
            'name' => 'Patrolman/Patrolwoman',
            'abbvr' => 'Pat',
        ]);
        RefRanks::create([
            'name' => 'NON-UNIFORMED PERSONNEL',
            'abbvr' => 'NUP',
        ]);
    }
}
