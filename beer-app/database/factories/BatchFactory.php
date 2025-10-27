<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Type;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Batch>
 */
class BatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        $types = Type::all();

        $amount = fake()->numberBetween(0, 500);
        $failed = fake()->numberBetween(0, $amount);
        $completed = fake()->numberBetween($failed, $amount);

        $started_at = fake()->dateTime();

        return [
            'user_id' => fake()->numberBetween(1, count($users)), // id is not 0 indexed
            'type_id' => fake()->numberBetween(1, count($types)),
            'amount' => $amount,
            'failed' => $failed,
            'amount_completed' => $completed,
            'started_at' => $started_at,
            'completed_at' => fake()->dateTimeBetween($started_at, '+1 week'),
        ];
    }
}
