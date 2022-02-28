<?php

namespace App\DataServices\Contracts;

use App\Models\Job;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface JobDataServiceContract
{
    /**
     * Get a job by its id
     *
     * @param int $jobId
     * @return mixed
     */
    public function getById(int $jobId);

    /**
     * return a collection of jobs
     *
     * @return mixed
     */
    public function list();


    /**
     * Return a paginated list of jobs
     *
     * @param int|null $perPage
     * @param array $relations
     * @return mixed
     */
    public function paginated(?int $perPage = null, array $relations = []): LengthAwarePaginator;

    /**
     * Create a Job
     *
     * @param array $data
     * @return Job
     */
    public function create(array $data): Job;

    /**
     * Update a given job
     *
     * @param Job $job
     * @param array $data
     * @return mixed
     */
    public function update(Job $job, array $data);

    /**
     * Delete a given job
     *
     * @param Job $job
     * @return bool
     */
    public function delete(Job $job): bool;

    /**
     * Fetch all jobs that are active
     *
     * @return Collection
     */
    public function onlyActive(): Collection;


}
