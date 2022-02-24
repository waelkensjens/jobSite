<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Job;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class JobFactory extends Factory
{

    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->text,
            'content' => $this->faker->text,
            'company_id' => 1,
            'type_id' => 1,
        ];
    }

    public function forCompany(Company $company)
    {
        return $this->state(function() use ($company) {
            return [
                'company_id' => $company->id
            ];
        });
    }
    public function forType(Type $type)
    {
        return $this->state(function() use ($type) {
            return [
                'company_id' => $type->id
            ];
        });
    }
}
