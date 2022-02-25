<?php

namespace App\Services;

use App\DataServices\Contracts\CityDataServiceContract;
use App\Models\City;
use App\Services\Contracts\CityServiceContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CityService implements CityServiceContract
{

    protected CityDataServiceContract $cityDataService;

    public function __construct(CityDataServiceContract $cityDataService)
    {
        $this->cityDataService = $cityDataService;
    }

    /**
     * @inheritDoc
     */
    public function getById(int $cityId): City
    {
        return $this->cityDataService->getById($cityId);
    }

    /**
     * @inheritDoc
     */
    public function list(): Collection
    {
        return $this->cityDataService->list();
    }

    /**
     * @inheritDoc
     */
    public function paginated(?int $perPage, array $relations): LengthAwarePaginator
    {
        return $this->cityDataService->paginated($perPage, $relations);
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): City
    {
        return $this->cityDataService->create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $cityId, array $data): bool
    {
        $city = $this->getById($cityId);

        return $this->cityDataService->update($city, $data);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $cityId): bool
    {
        $city = $this->getById($cityId);

        return $this->cityDataService->delete($city);
    }
}
