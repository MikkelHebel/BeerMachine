<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        // set lower and upper bound for speed for each type
        $types = [
            ['Pilsner', 0, 600],
            ['Wheat', 0, 300],
            ['IPA', 0, 150],
            ['Stout', 0, 200],
            ['Ale', 0, 100],
            ['Alcohol-Free', 0, 125]
        ];

        // for each of the types we set the name of a type to the type
        $i = 0;
        foreach ($types as $type) {

            Type::factory()->create(
                [
                    'name' => $type[0],
                    'mapped_type_id' => $i,
                    'lower_speed_limit' => $type[1],
                    'upper_speed_limit' => $type[2]
                ]
            );
            $i++;
        }
    }
}
