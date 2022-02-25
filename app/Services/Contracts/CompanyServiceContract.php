<?php

namespace App\Services\Contracts;

use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CompanyServiceContract
{
    /**
     * return a list of all companies
     *
     * @return Collection
     */
    public function list(): Collection;

    /**
     * return a list of all companies
     *
     * @param int|null $perPage
     * @param array $relations
     * @return LengthAwarePaginator
     */
    public function paginated(?int $perPage, array $relations): LengthAwarePaginator;

    /**
     * Create a new company
     *
     * @param array $data the data from the request
     * @return Company        The created company
     */
    public function create(array $data): Company;

    /**
     * Update a given company
     *
     * @param int $companyId
     * @param array $data The data we need to update on the company
     * @return bool
     */
    public function update(int $companyId, array $data): bool;

    /**
     * Delete a given company
     *
     * @param int $companyId
     * @return bool
     */
    public function delete(int $companyId): bool;
}
