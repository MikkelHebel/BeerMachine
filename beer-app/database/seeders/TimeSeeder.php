<?php

namespace Database\Seeders;

use App\Models\Batch;
use Illuminate\Database\Seeder;
use App\Models\Time;

class TimeSeeder extends Seeder
{
    public function run(): void
    {
        $batches = Batch::all();

        foreach ($batches as $batch) {
            for ($i = 0; $i < $batch->amount_completed; $i++) {
                Time::factory()->create([
                    'batch_id' => $batch->id
                ]);
            }
        }
    }
}
