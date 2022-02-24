<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Models\Job;
use App\Services\Contracts\JobServiceContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Inertia\Inertia;
use Inertia\Response;

class JobController extends Controller
{

    protected JobServiceContract $jobService;

    public function __construct(JobServiceContract $jobService)
    {
        $this->jobService = $jobService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $jobs = $this->jobService->list();

        return \inertia('jobs/index');

        return Inertia::render(
            component: 'jobs/index',
            props: [
                'jobs' => $jobs
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render(
            component: 'jobs/create',
            props: [

            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreJobRequest $request
     * @return Response
     */
    public function store(StoreJobRequest $request): Response
    {
        $this->jobService->createJob($request->all());

        $jobs = $this->jobService->list();

        return Inertia::render(
            'jobs/Index',
            [
                'jobs' => $jobs
            ]
        )->with(
            [
                'message' => 'Job was succesfully created'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Job $job
     * @return Response
     */
    public function show(Job $job): Response
    {
        return Inertia::render(
            'jobs/Description',
            [
                'job' => $job
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Job $job
     * @return Response
     */
    public function edit(Job $job): Response
    {
        return Inertia::render(
            'jobs/Edit',
            [
                'job' => $job
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Job $job
     * @return RedirectResponse
     */
    public function update(Request $request, Job $job): RedirectResponse
    {
        $this->jobService->updateJob($job);

        return redirect()->back()->with(
            [
                "message" => 'Job successfully updated'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Job $job
     * @return RedirectResponse
     */
    public function destroy(Job $job): RedirectResponse
    {
        $this->jobService->deleteJob($job);

        return redirect()
            ->back()
            ->with(
                [
                    "message" => 'Job successfully deleted'
                ]
            );
    }
}
