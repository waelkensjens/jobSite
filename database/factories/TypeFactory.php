<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class TypeFactory extends Factory
{
    protected $model = Type::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => 'bediende'
        ];
    }
}
