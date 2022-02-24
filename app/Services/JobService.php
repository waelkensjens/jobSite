<?php

namespace App\Services;

use App\DataServices\Contracts\JobDataServiceContract;
use App\Models\Job;
use Illuminate\Support\Collection;

class JobService implements Contracts\JobServiceContract
{

    protected JobDataServiceContract $jobDataService;

    public function __construct(
        JobDataServiceContract $jobDataService
    ) {
        $this->jobDataService = $jobDataService;
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
    public function createJob(array $data): Job
    {
        return $this->jobDataService->create($data);
    }

    /**
     * @inheritDoc
     */
    public function updateJob(Job $job, array $data): bool
    {
        // TODO: Implement updateJob() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteJob(Job $job): bool
    {
        // TODO: Implement deleteJob() method.
    }
}
