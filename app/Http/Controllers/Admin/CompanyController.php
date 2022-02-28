<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use App\Services\Contracts\CityServiceContract;
use App\Services\Contracts\CompanyServiceContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use function redirect;

class CompanyController extends Controller
{

    protected CompanyServiceContract $companyService;
    protected string $componentPrefix;
    protected CityServiceContract $cityService;

    public function __construct(
        CompanyServiceContract $companyService,
        CityServiceContract $cityService
    ) {
        $this->companyService = $companyService;
        $this->cityService = $cityService;
        $this->componentPrefix = 'Admin/Companies';
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $companies = $this->companyService->paginated(5, ['city', 'jobs']);

        return Inertia::render(
            component: $this->componentPrefix.'/Index',
            props: [
                'companies' => $companies
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
        $cities = $this->cityService->list();

        return Inertia::render(
            component: $this->componentPrefix.'/Create',
            props: [
                'cities' => $cities
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorecompanyRequest $request
     * @return RedirectResponse
     */
    public function store(StorecompanyRequest $request): RedirectResponse
    {
        $this->companyService->create(
            data: $request->all()
        );

        return redirect()->to(
            route('admin.companies.index')
        )->with(
            [
                'success' => 'company was successfully created'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param company $company
     * @return Response
     */
    public function show(company $company): Response
    {
        return Inertia::render(
            $this->componentPrefix.'/Detail',
            [
                'company' => $company
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $companyId
     * @return Response
     */
    public function edit(int $companyId): Response
    {
        $company = $this->companyService->getById($companyId);

        $cities = $this->cityService->list();

        $company['data'] = json_decode($company['data']);
        return Inertia::render(
            $this->componentPrefix.'/Edit',
            [
                'company' => $company,
                'cities' => $cities,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $companyId
     * @return RedirectResponse
     */
    public function update(Request $request, int $companyId): RedirectResponse
    {
        $this->companyService->update($companyId, $request->all());

        return redirect()->back()->with(
            [
                "message" => 'companie successfully updated'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $companyId
     * @return RedirectResponse
     */
    public function destroy(int $companyId): RedirectResponse
    {
        $this->companyService->delete($companyId);

        return redirect()
            ->to(
                route('admin.companies.index')
            )
            ->with(
                [
                    "success" => 'company successfully deleted'
                ]
            );
    }
}
