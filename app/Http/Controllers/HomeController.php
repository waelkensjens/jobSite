<?php

namespace App\Http\Controllers;

use App\DataServices\Contracts\JobDataServiceContract;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    protected JobDataServiceContract $jobDataService;

    public function __construct(JobDataServiceContract $jobDataServiceContract)
    {
        $this->jobDataService = $jobDataServiceContract;
    }


    public function index()
    {
        $jobs = $this->jobDataService->onlyActive();

        return Inertia::render(
            'Home',
            [
                'jobs' => $jobs
            ]
        );
    }

    /**
     * render details of a job
     *
     * @param int $jobId
     * @return Response
     */
    public function detail(int $jobId): Response
    {
        $job = $this->jobDataService->getById($jobId);

        return Inertia::render(
            'Detail',
            [
                'job' => $job
            ]
        );
    }
}
