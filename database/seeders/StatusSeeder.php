<?php

namespace Database\Seeders;
use App\Models\ReportedMotorcycleStatus;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      foreach (range(1, 30) as $index) {
    ReportedMotorcycleStatus::create([
        'reported_motorcycles_id' => rand(1, 40), // Assuming a foreign key
        'status' => 'Missing/Stolen',
        'remarks' => 'Remarks for status ' . $index,
        'created_by_id' => 1, // Assuming a foreign key
        'updated_by_id' => 1, // Assuming a foreign key
    ]);
}
    }
}
