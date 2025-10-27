<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admins = [true, false];

        foreach ($admins as $admin) {
            User::factory()->create([
                'is_admin' => $admin
            ]);
        }
    }
}
