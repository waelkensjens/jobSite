<?php

namespace App\DataServices\Contracts;

use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CompanyDataServiceContract
{
    /**
     * Fetch a company by id
     *
     * @param int $companyId
     * @return Company
     */
    public function getById(int $companyId): Company;


    /**
     * return a list of companies
     *
     * @return Collection
     */
    public function list(): Collection;

    /**
     * return a paginated list of companies
     *
     * @param int|null $perPage
     * @param array $relations
     * @return LengthAwarePaginator
     */
    public function paginated(?int $perPage = null, array $relations = []): LengthAwarePaginator;

    /**
     * Create a Company
     *
     * @param array $data
     * @return Company
     */
    public function create(array $data): Company;

    /**
     * update a given company
     *
     * @param Company $company
     * @param array $data
     * @return bool
     */
    public function update(Company $company, array $data): bool;

    /**
     * Delete a given company
     *
     * @param Company $company
     * @return bool
     */
    public function delete(Company $company): bool;
}
