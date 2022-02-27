<?php

namespace App\DataServices\Contracts;

use App\Models\City;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CityDataServiceContract
{
    /**
     * Get a city by its id
     *
     * @param int $cityId
     * @return City|null
     */
    public function getById(int $cityId): ?City;

    /**
     * return a list of cities
     *
     * @return Collection
     */
    public function list(): Collection;

    /**
     * Return a paginated list of cities
     *
     * @param int|null $perPage
     * @param array $relations
     * @return LengthAwarePaginator
     */
    public function paginated(?int $perPage = null, array $relations = []): LengthAwarePaginator;

    /**
     * Create a city
     *
     * @param array $data
     * @return City
     */
    public function create(array $data): City;

    /**
     * update a city
     *
     * @param City $city
     * @param array $data
     * @return bool
     */
    public function update(City $city, array $data): bool;

    /**
     * delete a city
     *
     * @param City $city
     * @return bool
     */
    public function delete(City $city): bool;
}
