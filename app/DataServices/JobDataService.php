<?php

namespace App\DataServices;

use App\Models\Job;
use PhpParser\Node\Stmt\Return_;

class JobDataService implements Contracts\JobDataServiceContract
{

    public function create(array $data): Job
    {
        return Job::create($data);
    }

    public function list()
    {
        Return Job::all();
    }

    public function paginated(?int $perPage = null, array $relations = [])
    {
        return Job::with($relations)->paginate($perPage);
    }

    public function getById(int $jobId)
    {
        return Job::find($jobId);
    }

    public function delete(Job $job): bool
    {
        return $job->delete();
    }
}
