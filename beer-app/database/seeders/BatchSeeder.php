<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Batch;

class BatchSeeder extends Seeder
{
    public function run(): void
    {
        Batch::insert([
            ['user_id' => 2, 'type_id' => 3, 'amount' => 200, 'failed' => 3, 'amount_completed' => 197],
            ['user_id' => 2, 'type_id' => 1, 'amount' => 100, 'failed' => 1, 'amount_completed' => 99],
        ]);
    }
}
