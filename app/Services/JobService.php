<?php

namespace App\Services;

use App\DataServices\Contracts\CompanyDataServiceContract;
use App\DataServices\Contracts\JobDataServiceContract;
use App\DataServices\Contracts\TypeDataServiceContract;
use App\Models\Job;
use App\Services\Contracts\JobServiceContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class JobService implements JobServiceContract
{
    protected JobDataServiceContract $jobDataService;
    protected CompanyDataServiceContract $companyDataService;
    protected TypeDataServiceContract $typeDataService;

    public function __construct(
        JobDataServiceContract $jobDataService,
        CompanyDataServiceContract $companyDataService,
        TypeDataServiceContract $typeDataService,
    ) {
        $this->jobDataService = $jobDataService;
        $this->companyDataService = $companyDataService;
        $this->typeDataService = $typeDataService;
    }
    /**
     * @inheritDoc
     */
    public function getById(int $jobId): Job
    {
        return $this->jobDataService->getById($jobId);
    }

    /**
     * @inheritDoc
     */
    public function list(): Collection
    {
        return $this->jobDataService->list();
    }

    /**
     * @inheritDoc
     */
    public function paginated($perPage = null, $relations = []): LengthAwarePaginator
    {
       return  $this->jobDataService->paginated($perPage, $relations);
    }
    /**
     * @inheritDoc
     */
    public function create(array $data): Job
    {

        $company = $this->companyDataService->getByName($data['company']);

        if (!$company){
           $company = $this->companyDataService->create(
                [
                    'name' => $data['company']
                ]
            );
        }
        $type = $this->typeDataService->getByName($data['type']);

        $data = [
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $data['content'],
            'is_active' => $data['is_active'],
            'company_id' => $company->id,
            'type_id' => $type->id,
        ];

        return $this->jobDataService->create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $jobId, array $data): bool
    {
        $job = $this->getById($jobId);
        $company = $this->companyDataService->getByName($data['company']);
        $type = $this->typeDataService->getByName($data['type']);

        $data['company_id'] = $company->id;
        $data['type_id'] = $type->id;

        unset($data['company'], $data['type']);

        return $this->jobDataService->update($job, $data);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $jobId): bool
    {
        $job = $this->getById($jobId);
        return $this->jobDataService->delete($job);
    }
}
