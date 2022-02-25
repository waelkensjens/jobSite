<?php

namespace App\DataServices\Contracts;

use App\Models\City;

interface CityDataServiceContract
{
    public function getById(int $cityId);

    public function list();

    public function paginated(?int $perPage = null, array $relations = []);

    /**
     * Create a Job
     *
     * @param array $data
     * @return City
     */
    public function create(array $data): City;

    public function update(City $city, array $data);

    public function delete(City $city): bool;
}
