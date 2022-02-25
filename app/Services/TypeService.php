<?php

namespace App\Services;

use App\DataServices\Contracts\TypeDataServiceContract;
use App\Models\Type;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TypeService implements Contracts\TypeServiceContract
{
    protected TypeDataServiceContract $typeDataService;

    public function __construct(TypeDataServiceContract $typeDataService)
    {
        $this->typeDataService = $typeDataService;
    }

    public function list(): Collection
    {
        return $this->typeDataService->list();
    }

    public function paginated(?int $perPage, array $relations): LengthAwarePaginator
    {
        // TODO: Implement paginated() method.
    }

    public function createType(array $data): Type
    {
        // TODO: Implement createType() method.
    }

    public function updateType(Type $type, array $data): bool
    {
        // TODO: Implement updateType() method.
    }

    public function deleteType(Type $type): bool
    {
        // TODO: Implement deleteType() method.
    }
}
