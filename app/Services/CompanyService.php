<?php

namespace App\Services;

use App\DataServices\Contracts\CityDataServiceContract;
use App\DataServices\Contracts\CompanyDataServiceContract;
use App\Models\Company;
use App\Services\Contracts\CompanyServiceContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CompanyService implements CompanyServiceContract
{
    protected CompanyDataServiceContract $companyDataService;
    protected CityDataServiceContract $cityDataService;

    public function __construct(
        CompanyDataServiceContract $companyDataService,
        CityDataServiceContract $cityDataService
    ) {
        $this->companyDataService = $companyDataService;
        $this->cityDataService = $cityDataService;
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
        return $this->companyDataService->paginated($perPage, $relations);
    }

    public function create(array $data): Company
    {
       $data['data'] = json_encode( $data['data']);

        $city = $this->cityDataService->getByName($data['city']);

        $data['city_id'] = $city->id;

        unset($data['city']);

        return $this->companyDataService->create($data);
    }

    public function update(int $companyId, array $data): bool
    {
        $company = $this->getById($companyId);

        $data['data'] = json_encode( $data['data']);

        $city = $this->cityDataService->getByName($data['city']);

        $data['city_id'] = $city->id;

        unset($data['city']);

        return $this->companyDataService->update($company, $data);
    }

    public function delete(int $companyId): bool
    {
        $company = $this->getById($companyId);

        $jobs = $company->jobs();

        if ($jobs->count() > 0) {
            $jobs->delete();
        }

        return $this->companyDataService->delete($company);
    }
}
