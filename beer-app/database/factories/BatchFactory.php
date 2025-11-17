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
        $type = $types->random();

        $amount = fake()->numberBetween(100, 500);
        $speed = fake()->numberBetween(10, $type->upper_speed_limit);

        // give the procent of successful beer in a batch, given a speed and the type
        $reg = [
            1 => 0.9985702219 / (1 + 0.0000202342 * exp(0.023864852 * $speed)),
            2 => 0.5,   // no data
            3 => 0.9950984065 / (1 + 0.0004130302 * exp(0.0629426035 * $speed)),
            4 => 0.0000069598 * pow($speed, 2) - 0.0000541783 * $speed + 0.5130477273,
            5 => 0.5,   // no data
            6 => -0.00000233318 * pow($speed, 2) - 0.0013350346 * $speed + 0.8422123946,
        ];

        $completed = $amount; // all beer are done
        $success = (int) $amount * $reg[$type->id];
        $failed = $completed - $success;

        $started_at = fake()->dateTime();

        return [
            'user_id' => fake()->numberBetween(1, count($users)), // id is not 0 indexed
            'type_id' => $type->id,
            'amount' => $amount,
            'speed' => $speed,
            'failed' => (int) $failed,
            'amount_completed' => $completed,
            'started_at' => $started_at,
            'completed_at' => fake()->dateTimeBetween($started_at, '+1 week'),
        ];
    }
}
