<?php

namespace App\DataServices;

use App\Models\City;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CityDataService implements Contracts\CityDataServiceContract
{

    /**
     * @inheritDoc
     */
    public function getById(int $cityId): City
    {
        return City::find($cityId);
    }
    /**
     * @inheritDoc
     */
    public function list(): Collection
    {
        return City::all();
    }
    /**
     * @inheritDoc
     */
    public function paginated(?int $perPage = null, array $relations = []): LengthAwarePaginator
    {
        return City::with($relations)->paginate($perPage);
    }
    /**
     * @inheritDoc
     */
    public function create(array $data): City
    {
        return City::create($data);
    }
    /**
     * @inheritDoc
     */
    public function update(City $city, array $data): bool
    {
        return $city->update($data);
    }
    /**
     * @inheritDoc
     */
    public function delete(City $city): bool
    {
        return $city->delete();
    }
}
