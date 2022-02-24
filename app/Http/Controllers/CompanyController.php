<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use App\Services\Contracts\CompanyServiceContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CompanyController extends Controller
{

    protected CompanyServiceContract $companyService;

    public function __construct(CompanyServiceContract $companyService)
    {
        $this->companyService = $companyService;
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
            component: 'companies/index',
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
            component: 'companies/create',
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
        $this->companyService->createcompany($request->all());

        $companies = $this->companyService->list();

        return Inertia::render(
            'companies/Index',
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
            'companies/Description',
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
            'companies/Edit',
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
        $this->companyService->updatecompanie($company);

        return redirect()->back()->with(
            [
                "message" => 'companie successfully updated'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param company $companie
     * @return RedirectResponse
     */
    public function destroy(company $companie): RedirectResponse
    {
        $this->companieService->deletecompanie($companie);

        return redirect()
            ->back()
            ->with(
                [
                    "message" => 'companie successfully deleted'
                ]
            );
    }
}
