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

    /**
     * @inheritDoc
     */
    public function getById(int $typeId): Type
    {
        return $this->typeDataService->getById($typeId);
    }

    /**
     * @inheritDoc
     */
    public function list(): Collection
    {
        return $this->typeDataService->list();
    }

    /**
     * @inheritDoc
     */
    public function paginated(
        $perPage = null,
        $relations = []
    ): LengthAwarePaginator {
        return  $this->typeDataService->paginated($perPage, $relations);
    }

    /**
     * @inheritDoc
     */
    public function create(
        array $data
    ): type {
        return $this->typeDataService->create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(
        int $typeId,
        array $data
    ): bool {
        $type = $this->getById($typeId);
        return $this->typeDataService->update($type, $data);
    }

    /**
     * @inheritDoc
     */
    public function delete(
        int $typeId
    ): bool {
        $type = $this->getById($typeId);
        return $this->typeDataService->delete($type);
    }
}
