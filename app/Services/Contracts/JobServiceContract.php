<?php

namespace App\Services\Contracts;

use App\Models\Job;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface JobServiceContract
{
    /**
     * Fetch a job by id
     *
     * @param int $jobId
     * @return Job
     */
    public function getById(int $jobId): Job;

    /**
     * return a list of all jobs
     *
     * @return Collection
     */
    public function list(): Collection;

    /**
     * return a paginated list of all jobs
     *
     * @param int|null $perPage
     * @param array $relations
     * @return LengthAwarePaginator
     */
    public function paginated(?int $perPage, array $relations): LengthAwarePaginator;

    /**
     * Create a new job
     *
     * @param array $data the data from the request
     * @return Job        The created job
     */
    public function create(array $data): Job;

    /**
     * Update a given job
     *
     * @param int $jobId
     * @param array $data The data we need to update on the job
     * @return bool
     */
    public function update(int $jobId, array $data): bool;

    /**
     * Delete a given job
     *
     * @param int $jobId
     * @return bool
     */
    public function delete(int $jobId): bool;
}
