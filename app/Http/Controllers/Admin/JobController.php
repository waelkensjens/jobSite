<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRequest;
use App\Models\Job;
use App\Services\Contracts\CompanyServiceContract;
use App\Services\Contracts\JobServiceContract;
use App\Services\Contracts\TypeServiceContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use function redirect;

class JobController extends Controller
{

    protected string $componentPrefix;
    protected JobServiceContract $jobService;
    protected TypeServiceContract $typeService;
    protected CompanyServiceContract $companyService;

    public function __construct(
        JobServiceContract $jobService,
        TypeServiceContract $typeService,
        CompanyServiceContract $companyService,
    ) {
        $this->jobService = $jobService;
        $this->typeService = $typeService;
        $this->companyService = $companyService;
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
        $types = $this->typeService->list();
        $companies = $this->companyService->list();

        return Inertia::render(
            component: $this->componentPrefix.'/Create',
            props: [
                'types' => $types,
                'companies' => $companies
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreJobRequest $request
     * @return RedirectResponse
     */
    public function store(StoreJobRequest $request): RedirectResponse
    {
        $this->jobService->create(
            data: $request->all()
        );

        return redirect(
            route('admin.jobs.index')
        )->with(
            [
                'success' => 'Job was successfully created'
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
     * @param int $jobId
     * @return Response
     */
    public function edit(int $jobId): Response
    {
        $job =$this->jobService->getByid(
           jobId:  $jobId
        );

        $types = $this->typeService->list();
        $companies = $this->companyService->list();

        return Inertia::render(
            $this->componentPrefix.'/Edit',
            [
                'job' => $job,
                'types' => $types,
                'companies' => $companies,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $jobId
     * @return RedirectResponse
     */
    public function update(Request $request, int $jobId): RedirectResponse
    {
        $this->jobService->update(
           jobId: $jobId,
           data: $request->all()
        );

        return redirect()->back()->with(
            [
                "success" => 'Job successfully updated'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $jobId
     * @return RedirectResponse
     */
    public function destroy(int $jobId): RedirectResponse
    {
        $this->jobService->delete(
            jobId: $jobId
        );

        return redirect()
            ->route('admin.jobs.index')
            ->with(
                [
                    "message" => 'Job successfully deleted'
                ]
            );
    }
}
