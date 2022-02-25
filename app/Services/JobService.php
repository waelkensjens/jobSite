<?php

namespace App\Services;

use App\Models\Job;
use Illuminate\Support\Collection;

class JobService
{
    /**
     * @inheritDoc
     */
    public function list(): Collection
    {
        return $this->jobDataService->list();
    }


    public function paginated($perPage = 20)
    {
       return  Job::paginate($perPage);
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
