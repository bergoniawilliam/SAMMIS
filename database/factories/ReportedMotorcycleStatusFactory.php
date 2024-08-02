<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ReportedMotorcycle;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReportedMotorcycleStatus>
 */
class ReportedMotorcycleStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['Missing/Stolen', 'Recovered', 'Released']);
        return [
            'reported_motorcycles_id' => ReportedMotorcycle::inRandomOrder()->first()->id,
            'status' => $status,
            'remarks' => $this->faker->text(200),
            'created_by_id' => 1, // Assuming a foreign key
            'updated_by_id' => 1, // Assuming a foreign key
        ];
    }
}
