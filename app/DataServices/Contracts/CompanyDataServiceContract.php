<?php

namespace App\DataServices\Contracts;

interface CompanyDataServiceContract
{
    public function getById(int $companyId);



    public function list();

    public function paginated(?int $perPage = null, array $relations = []);

    /**
     * Create a Job
     *
     * @param array $data
     * @return Company
     */
    public function create(array $data): Company;

    public function update(Company $company, array $data);

    public function delete(Company $company): bool;
}
