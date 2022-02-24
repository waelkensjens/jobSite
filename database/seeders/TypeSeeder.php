<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = config('types');

        foreach ($types as $type) {
            Type::factory()->create(
                [
                    'title' => $type
                ]
            );
        }
    }
}
