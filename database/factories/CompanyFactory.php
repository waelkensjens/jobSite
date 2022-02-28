<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'VAT' => "BE0123456789",
            'city_id' => $this->faker->numberBetween(1, 125),
            'data' => json_encode(
                [
                    'street' => $this->faker->streetName,
                    'number' => $this->faker->randomNumber()
                ]
            )
        ];
    }

    public function forCity(City $city)
    {
        return $this->state(function() use ($city) {
            return [
                'city_id' => $city->id
            ];
        });
    }
}
