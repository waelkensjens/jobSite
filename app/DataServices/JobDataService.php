<?php

namespace App\DataServices;

use App\Models\Job;
use Illuminate\Pagination\LengthAwarePaginator;
use PhpParser\Node\Stmt\Return_;

class JobDataService implements Contracts\JobDataServiceContract
{

    /**
     * @inheritDoc
     */
    public function getById(int $jobId)
    {
        return Job::find($jobId);
    }
    /**
     * @inheritDoc
     */
    public function list()
    {
        return Job::all();
    }
    /**
     * @inheritDoc
     */
    public function paginated(?int $perPage = null, array $relations = []): LengthAwarePaginator
    {
        return Job::with($relations)->paginate();
    }
    /**
     * @inheritDoc
     */
    public function create(array $data): Job
    {
        return Job::create($data);
    }
    /**
     * @inheritDoc
     */
    public function update(Job $job, array $data)
    {
        return $job->update($data);
    }
    /**
     * @inheritDoc
     */
    public function delete(Job $job): bool
    {
        return $job->delete();
    }
}
