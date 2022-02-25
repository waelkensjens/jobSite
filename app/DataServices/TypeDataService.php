<?php

namespace App\DataServices;

use App\DataServices\Contracts\TypeDataServiceContract;
use App\Models\Type;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TypeDataService implements TypeDataServiceContract
{
    /**
     * @inheritDoc
     */
    public function list(): Collection
    {
        return Type::all();
    }

    /**
     * @inheritDoc
     */
    public function paginated(?int $perPage, array $relations): LengthAwarePaginator
    {
        return Type::with($relations)->paginate();
    }

    /**
     * @inheritDoc
     */
    public function createType(array $data): Type
    {
        return Type::create($data);
    }

    /**
     * @inheritDoc
     */
    public function updateType(Type $type, array $data): bool
    {
        return $type->update($data);
    }

    /**
     * @inheritDoc
     */
    public function deleteType(Type $type): bool
    {
       return $type->delete();
    }
}
