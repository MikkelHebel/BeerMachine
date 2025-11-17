<?php

namespace Database\Factories;

use App\Models\Batch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Time>
 */
class TimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'batch_id' => 1,        // overwrite this
            'temperature' => fake()->numberBetween(20, 37),
            'humidity' => fake()->numberBetween(30, 48.0),
            'vibration' => fake()->randomFloat(2, 0, 0.25),
            'time_stamp' => now()   // overwrite this
        ];
    }
}
