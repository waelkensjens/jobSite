<?php

namespace App\Http\Controllers;

use App\DataServices\Contracts\JobDataServiceContract;
use Inertia\Inertia;

class HomeController extends Controller
{
    protected JobDataServiceContract $jobDataService;

    public function __construct(JobDataServiceContract $jobDataServiceContract)
    {
        $this->jobDataService = $jobDataServiceContract;
    }


    public function index()
    {
        $jobs = $this->jobDataService->list();


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
     * @return \Inertia\Response
     */
    public function detail(int $jobId): \Inertia\Response
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
