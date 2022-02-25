<?php

namespace App\Services;

use App\DataServices\Contracts\CompanyDataServiceContract;
use App\Models\Company;
use App\Services\Contracts\CompanyServiceContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CompanyService implements CompanyServiceContract
{
    protected CompanyDataServiceContract $companyDataService;

    public function __construct(CompanyDataServiceContract $companyDataService)
    {
        $this->companyDataService = $companyDataService;
    }

    /**
     * @inheritDoc
     */
    public function getById(int $companyId)
    {
        return $this->companyDataService->getById($companyId);
    }

    public function list(): Collection
    {
        return $this->companyDataService->list();
    }

    public function paginated(?int $perPage, array $relations): LengthAwarePaginator
    {
        return $this->companyDataService($perPage, $relations);
    }

    public function create(array $data): Company
    {
        return $this->companyDataService->create($data);
    }

    public function update(int $companyId, array $data): bool
    {
        $company = $this->getById($companyId);
        return $this->companyDataService->update($company, $data);
    }

    public function delete(int $companyId): bool
    {
        $company = $this->getById($companyId);
        return $this->companyDataService->delete($company);
    }
}
