<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['Pilsner', 'Wheat', 'IPA', 'Stout', 'Ale', 'Alcohol-Free'];

        // for each of the types we set the name of a type to the type
        foreach ($types as $type) {
            Type::factory()->create(
                ['name' => $type]
            );
        }
    }
}
