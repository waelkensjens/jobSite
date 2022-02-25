<?php

namespace App\Services\Contracts;

use App\Models\Type;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface TypeServiceContract
{
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
    public function createType(
        array $data
    ): Type;

    /**
     * Update a given Type
     *
     * @param Type   $type The given Type to update
     * @param array $data The data we need to update on the Type
     * @return bool
     */
    public function updateType(
        Type $type,
        array $data
    ): bool;

    /**
     * Delete a given Type
     *
     * @param Type $type
     * @return bool
     */
    public function deleteType(Type $type): bool;
}
