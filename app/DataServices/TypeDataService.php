<?php

namespace App\DataServices;

use App\DataServices\Contracts\TypeDataServiceContract;
use App\Models\Type;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TypeDataService implements TypeDataServiceContract
{

    public function create(array $data): Type
    {
        return Type::create($data);
    }

    public function list(): Collection
    {
        Return Type::all();
    }

    public function paginated(?int $perPage = null, array $relations = []): LengthAwarePaginator
    {
        return Type::with($relations)->paginate($perPage);
    }

    public function getById(int $typeId): Type
    {
        return Type::find($typeId);
    }

    public function createType(array $data): Type
    {
        return Type::create($data);
    }

    public function updateType(Type $type, array $data): bool
    {
        return $type->update($data);
    }

    public function deleteType(Type $type): bool
    {
        return $type->delete();
    }
}
