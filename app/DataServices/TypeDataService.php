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
    public function getById(int $typeId): Type
    {
        return Type::find($typeId);
    }

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
    public function create(array $data): Type
    {
        return Type::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(Type $type, array $data): bool
    {
        return $type->update($data);
    }

    /**
     * @inheritDoc
     */
    public function delete(Type $type): bool
    {
       return $type->delete();
    }

    public function getByName(string $name): Type
    {
        return Type::where('title', $name)->first();
    }
}
