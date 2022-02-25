<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRequest;
use App\Models\Job;
use App\Services\JobService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use function redirect;

class JobController extends Controller
{

    protected string $componentPrefix;
    private JobService $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
        $this->componentPrefix = 'Admin/Jobs';
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {


       $jobs = $this->jobService->paginated(
           perPage: 5,
           relations: [
               'company',
               'type'
           ]
       );

        return Inertia::render($this->componentPrefix.'/Index', [
            'jobs' => $jobs
        ]);


        return Inertia::render(
            component: $this->componentPrefix.'/Index',
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
            component: $this->componentPrefix.'/Create',
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
            $this->componentPrefix.'/Index',
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
            $this->componentPrefix.'/Detail',
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
    public function edit(int $jobId): Response
    {

        $job =$this->jobService->getByid($jobId);

        return Inertia::render(
            $this->componentPrefix.'/Edit',
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
