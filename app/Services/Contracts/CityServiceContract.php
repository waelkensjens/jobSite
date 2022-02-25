<?php

namespace App\Services\Contracts;

use App\Models\City;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CityServiceContract
{
    /**
     * return a list of all cities
     *
     * @return Collection
     */
    public function list(): Collection;

    /**
     * return a list of all cities
     *
     * @param int|null $perPage
     * @param array $relations
     * @return LengthAwarePaginator
     */
    public function paginated(?int $perPage, array $relations): LengthAwarePaginator;

    /**
     * Create a new city
     *
     * @param array $data the data from the request
     * @return City        The created city
     */
    public function create(array $data): City;

    /**
     * Update a given city
     *
     * @param int $cityId
     * @param array $data The data we need to update on the city
     * @return bool
     */
    public function update(int $cityId, array $data): bool;

    /**
     * Delete a given city
     *
     * @param int $cityId
     * @return bool
     */
    public function delete(int $cityId): bool;
}
