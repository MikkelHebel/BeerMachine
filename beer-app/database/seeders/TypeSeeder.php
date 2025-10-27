<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        Type::insert([
            ['name' => 'Pilsner'],
            ['name' => 'Wheat'],
            ['name' => 'IPA'],
            ['name' => 'Stout'],
            ['name' => 'Ale'],
            ['name' => 'Alcohol-Free'],
        ]);
    }
}
