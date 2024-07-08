<?php

namespace Database\Seeders;
use App\Models\RefRank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefRanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       RefRank::create([
            'name' => 'POLICE GENERAL',
            'abbvr' => 'PGEN',
        ]);
        RefRank::create([
            'name' => 'POLICE LIEUTENANT GENERAL',
            'abbvr' => 'PLTGEN',
        ]);
        RefRank::create([
            'name' => 'POLICE MAJOR GENERAL',
            'abbvr' => 'PMGEN',
        ]);
        RefRank::create([
            'name' => 'POLICE BRIGADIER GENERAL',
            'abbvr' => 'PBGEN',
        ]);
        RefRank::create([
            'name' => 'POLICE COLONEL',
            'abbvr' => 'PCOL',
        ]);
        RefRank::create([
            'name' => 'POLICE LIEUTENANT COLONEL',
            'abbvr' => 'PLTCOL',
        ]);
        RefRank::create([
            'name' => 'POLICE MAJOR',
            'abbvr' => 'PMAJ',
        ]);
        RefRank::create([
            'name' => 'POLICE CAPTAIN',
            'abbvr' => 'PCPT',
        ]);
        RefRank::create([
            'name' => 'POLICE LIEUTENANT',
            'abbvr' => 'PLT',
        ]);
        RefRank::create([
            'name' => 'Police Executive Master Sergeant',
            'abbvr' => 'PEMS',
        ]);
        RefRank::create([
            'name' => 'Police Chief Master Sergeant',
            'abbvr' => 'PCMS',
        ]);
        RefRank::create([
            'name' => 'Police Senior Master Sergeant',
            'abbvr' => 'PSMS',
        ]);
        RefRank::create([
            'name' => 'Police Master Sergeant',
            'abbvr' => 'PMSg',
        ]);
        RefRank::create([
            'name' => 'Police Staff Sergeant',
            'abbvr' => 'PSSg',
        ]);
        RefRank::create([
            'name' => 'Police Corporal',
            'abbvr' => 'PCpl',
        ]);
        RefRank::create([
            'name' => 'Patrolman/Patrolwoman',
            'abbvr' => 'Pat',
        ]);
        RefRank::create([
            'name' => 'NON-UNIFORMED PERSONNEL',
            'abbvr' => 'NUP',
        ]);
    }
}
