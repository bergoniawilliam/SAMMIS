<?php

namespace Database\Factories;

use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MotorcycleReporter>
 */
class MotorcycleReporterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $suffixes = ['Jr.', 'Sr.', null];
        $suffix = $suffixes[array_rand($suffixes)];

        $region = Region::inRandomOrder()->first();
        // Get random province from the selected region
        $province = $region ? $region->provinces()->inRandomOrder()->first() : null;
        // Get random city from the selected province
        $city = $province ? $province->cities()->inRandomOrder()->first() : null;
        // Get random barangay from the selected city
        $barangay = $city ? $city->barangays()->inRandomOrder()->first() : null;

        return [
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->lastName,
            'last_name' => $this->faker->lastName,
            'qualifier' => $suffix,
            'cellphone_number' => $this->faker->phoneNumber,
            'region' => $region ? $region->name : 'Unknown',
            'province' => $region ? $province->name : 'Unknown',
            'municipality' => $city ? $city->name : 'Unknown',
            'barangay' => $barangay ? $barangay->name : 'Unknown',
            'street' => $this->faker->streetAddress,
            'home_unit_number' => '#' . rand(1, 78) . '-' . strtoupper(chr(rand(97, 122))),
            'created_by_id' => 1, // Assuming a foreign key
            'updated_by_id' => 1,
        ];
    }
}
