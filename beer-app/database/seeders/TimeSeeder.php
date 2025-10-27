<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Time;
use Carbon\Carbon;

class TimeSeeder extends Seeder
{
    public function run(): void
    {
        Time::insert([
            ['batch_id' => 1, 'temperature' => 21.5, 'humidity' => 48.0, 'vibration' => 0.15, 'time_stamp' => Carbon::now()->subMinutes(3)],
            ['batch_id' => 1, 'temperature' => 22.1, 'humidity' => 49.0, 'vibration' => 0.20, 'time_stamp' => Carbon::now()->subMinutes(2)],
            ['batch_id' => 1, 'temperature' => 22.4, 'humidity' => 47.8, 'vibration' => 0.18, 'time_stamp' => Carbon::now()->subMinute()],
        ]);
    }
}
