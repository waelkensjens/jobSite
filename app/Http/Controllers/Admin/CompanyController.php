<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use function redirect;

class CompanyController extends Controller
{

    protected CompanyService $companyService;
    protected string $componentPrefix;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
        $this->componentPrefix = 'Admin/Companies';
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $companies = $this->companyService->list();

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
        return Inertia::render(
            component: $this->componentPrefix.'/Create',
            props: [

            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorecompanyRequest $request
     * @return Response
     */
    public function store(StorecompanyRequest $request): Response
    {
        $this->companyService->createCompany(
            data: $request->all()
        );

        $companies = $this->companyService->list();

        return Inertia::render(
            $this->componentPrefix.'/Index',
            [
                'companies' => $companies
            ]
        )->with(
            [
                'message' => 'companie was succesfully created'
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
     * @param Company $company
     * @return Response
     */
    public function edit(Company $company): Response
    {
        return Inertia::render(
            $this->componentPrefix.'/Edit',
            [
                'company' => $company
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param company $company
     * @return RedirectResponse
     */
    public function update(Request $request, company $company): RedirectResponse
    {
        $this->companyService->updateCompany($company, $request->all());

        return redirect()->back()->with(
            [
                "message" => 'companie successfully updated'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return RedirectResponse
     */
    public function destroy(company $company): RedirectResponse
    {
        $this->companyService->deleteCompany($company);

        return redirect()
            ->back()
            ->with(
                [
                    "message" => 'companie successfully deleted'
                ]
            );
    }
}
