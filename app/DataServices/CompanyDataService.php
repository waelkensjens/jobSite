<?php

namespace App\DataServices;

use App\DataServices\Contracts\Company;

class CompanyDataService implements Contracts\CompanyDataServiceContract
{

    public function getById(int $companyId)
    {
        // TODO: Implement getById() method.
    }

    public function list()
    {
        // TODO: Implement list() method.
    }

    public function paginated(?int $perPage = null, array $relations = [])
    {
        // TODO: Implement paginated() method.
    }

    public function create(array $data): Company
    {
        // TODO: Implement create() method.
    }

    public function update(Company $company, array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(Company $company): bool
    {
        // TODO: Implement delete() method.
    }
}
