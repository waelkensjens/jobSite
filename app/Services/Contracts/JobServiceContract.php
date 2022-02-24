<?php

namespace App\Services\Contracts;

use App\Models\Job;
use Illuminate\Support\Collection;

interface JobServiceContract
{

    /**
     * return a list of all jobs
     *
     * @return Collection
     */
    public function list(): Collection;

    /**
     * Create a new job
     *
     * @param array $data the data from the request
     * @return Job        The created job
     */
    public function createJob(array $data): Job;

    /**
     * Update a given job
     *
     * @param Job   $job The given job to update
     * @param array $data The data we need to update on the job
     * @return bool
     */
    public function updateJob(Job $job, array $data): bool;

    /**
     * Delete a given job
     *
     * @param Job $job
     * @return bool
     */
    public function deleteJob(Job $job): bool;
}
