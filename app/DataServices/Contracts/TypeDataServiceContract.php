<?php

namespace App\DataServices\Contracts;

use App\Models\Type;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface TypeDataServiceContract
{
    /**
     * Fetch a type by id
     *
     * @param int $typeId
     * @return Type
     */
    public function getById(int $typeId): Type;

    /**
     * return a list of all Types
     *
     * @return Collection
     */
    public function list(): Collection;

    /**
     * return a list of all Types
     *
     * @param int|null $perPage
     * @param array $relations
     * @return LengthAwarePaginator
     */
    public function paginated(
        ?int $perPage,
        array $relations
    ): LengthAwarePaginator;

    /**
     * Create a new Type
     *
     * @param array $data the data from the request
     * @return Type        The created Type
     */
    public function create(
        array $data
    ): Type;

    /**
     * Update a given Type
     *
     * @param Type   $type The given Type to update
     * @param array $data The data we need to update on the Type
     * @return bool
     */
    public function update(
        Type $type,
        array $data
    ): bool;

    /**
     * Delete a given Type
     *
     * @param Type $type
     * @return bool
     */
    public function delete(Type $type): bool;

    /**
     * Fetch a type by name
     *
     * @param string $name
     * @return mixed
     */
    public function getByName(string $name): Type;
}
