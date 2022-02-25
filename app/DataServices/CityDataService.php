<?php

namespace App\DataServices;

use App\Models\City;

class CityDataService implements Contracts\CityDataServiceContract
{

    public function getById(int $cityId)
    {
        // TODO: Implement getById() method.
    }

    public function list()
    {
        // TODO: Implement list() method.
    }

    public function paginated(?int $perPage = null, array $relations = [])
    {
        // TODO: Implement paginated() method.
    }

    public function create(array $data): City
    {
        // TODO: Implement create() method.
    }

    public function update(City $city, array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(City $city): bool
    {
        // TODO: Implement delete() method.
    }
}
