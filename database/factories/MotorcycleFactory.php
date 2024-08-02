<?php

namespace Database\Factories;
use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Base;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReportedMotorcycle>
 */
class MotorcycleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $region = Region::inRandomOrder()->first();
        // Get random province from the selected region
        $province = $region->provinces()->inRandomOrder()->first();
        // Get random city from the selected province
        $city = $province->cities()->inRandomOrder()->first();
        // Get random barangay from the selected city
        $barangay = $city->barangays()->inRandomOrder()->first();

        $brands = ['Honda', 'Yamaha', 'Suzuki', 'Kawasaki', 'Ducati', 'Harley-Davidson', 'BMW', 'Triumph'];
        $brandsAndModels = [
            'Honda' => ['CBR1000RR', 'CRF450R', 'Gold Wing', 'CB500F'],
            'Yamaha' => ['YZF-R1', 'MT-07', 'FJR1300', 'XSR900'],
            'Suzuki' => ['GSX-R1000', 'DR-Z400SM', 'SV650', 'V-Strom 650'],
            'Kawasaki' => ['Ninja ZX-10R', 'Z650', 'Versys 650', 'KLX250'],
            'Ducati' => ['Panigale V4', 'Monster 821', 'Scrambler', 'Diavel 1260'],
            'Harley-Davidson' => ['Sportster', 'Street Glide', 'Road King', 'Iron 883'],
            'BMW' => ['S1000RR', 'R1250GS', 'F850GS', 'R nineT'],
            'Triumph' => ['Speed Triple', 'Bonneville', 'Tiger 900', 'Daytona 765'],
        ];

        $color = ['Blue', 'Red', 'Green', 'White', 'Black', 'Pink'];

        $brand = $this->faker->randomElement(array_keys($brandsAndModels));
        $model = $this->faker->randomElement($brandsAndModels[$brand]);
        return [
            'blotter_number' => Str::random(8),
            'region' => $region->name,
            'province' => $province->name,
            'municipality' => $city->name,
            'barangay' => $barangay->name,
            'street' => $this->faker->streetAddress,
            'plate_number' => strtoupper($this->generator->lexify('???')) . ' ' .  $this->generator->numerify('###'),
            'mvfile_number' => 'MV' . Str::random(9),
            'chassis_number' => 'CH' . Str::random(9),
            'engine_number' => 'EN' . Str::random(9),
            'date_time_missing' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'motorcycle_reporters_id' => 1,
            'reported_motorcycle_owners_id' => 1,
            'type' => 'MC',
            'make' => $brand,
            'model' => $model,
            'color' => $this->faker->randomElement($color),
            'ioc' => $this->faker->name,
            'station_id' => rand(1, 78), // Adjust as needed
            'created_by_id' => 1,
            'updated_by_id' => 1,
        ];
    }
}
