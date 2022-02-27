<?php

namespace App\DataServices;

use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CompanyDataService implements Contracts\CompanyDataServiceContract
{
    /**
     * @inheritDoc
     */
    public function getById(int $companyId): Company
    {
        return Company::find($companyId);
    }
    /**
     * @inheritDoc
     */
    public function list(): Collection
    {
        return Company::all();
    }
    /**
     * @inheritDoc
     */
    public function paginated(?int $perPage = null, array $relations = []): LengthAwarePaginator
    {
        return Company::with($relations)->paginate($perPage);
    }
    /**
     * @inheritDoc
     */
    public function create(array $data): Company
    {
        return Company::create($data);
    }
    /**
     * @inheritDoc
     */
    public function update(Company $company, array $data): bool
    {
        return $company->update($data);
    }
    /**
     * @inheritDoc
     */
    public function delete(Company $company): bool
    {
        return $company->delete();
    }

    /**
     * @inheritDoc
     */
    public function getByName(string $name): ?Company
    {
        return Company::where('name', $name)->first();
    }
}
