<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'developer',
            'email' => 'dev@dev.com',
            'password' => Hash::make('dev'),
        ]);

        $admins = [true, false];

        foreach ($admins as $admin) {
            User::factory()->create([
                'is_admin' => $admin
            ]);
        }
    }
}
