<?php

namespace App\Services;

use App\Models\City;
use Illuminate\Support\Collection;

class CityService
{

    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return City::all();
    }

    /**
     * @param array $data
     * @return City
     */
    public function createCity(array $data): City
    {
        return City::create($data);
    }

    /**
     * @param City $city
     * @return void
     */
    public function updateCity(City $city, array $data): bool
    {
        return $city->update($data);
    }

    public function deleteCity(City $city): bool
    {
        return $city->delete();
    }
}
