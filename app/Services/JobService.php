<?php

namespace App\Services;

use App\DataServices\Contracts\JobDataServiceContract;
use App\Models\Job;
use App\Services\Contracts\JobServiceContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class JobService implements JobServiceContract
{
    protected JobDataServiceContract $jobDataService;

    public function __construct(JobDataServiceContract $jobDataService)
    {
        $this->jobDataService = $jobDataService;
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
        return $this->jobDataService->create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $jobId, array $data): bool
    {
        $job = $this->getById($jobId);
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
