<?php

namespace App\DataServices\Contracts;

use App\Models\Job;

interface JobDataServiceContract
{

    /**
     * Create a Job
     *
     * @param array $data
     * @return Job
     */
    public function create(array $data): Job;

    public function list();

    public function paginated(?int $perPage = null, array $relations = []);

    public function getById(int $jobId);
}
