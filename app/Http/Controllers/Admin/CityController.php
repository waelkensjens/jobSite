<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Models\City;
use App\Services\CityService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use function redirect;

class CityController extends Controller
{

    protected CityService $cityService;
    protected string $componentPrefix;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
        $this->componentPrefix = 'Admin/Cities';
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $cities = $this->cityService->list();

        return Inertia::render(
            component: $this->componentPrefix.'/Index',
            props: [
                'cities' => $cities
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
     * @param StoreCityRequest $request
     * @return Response
     */
    public function store(StoreCityRequest $request): Response
    {
        $this->cityService->createCity($request->all());

        $cities = $this->cityService->list();

        return Inertia::render(
            $this->componentPrefix.'/Index',
            [
                'cities' => $cities
            ]
        )->with(
            [
                'message' => 'city was succesfully created'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param City $city
     * @return Response
     */
    public function show(City $city): Response
    {
        return Inertia::render(
            $this->componentPrefix.'/Detail',
            [
                'city' => $city
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return Response
     */
    public function edit(City $city): Response
    {
        return Inertia::render(
            $this->componentPrefix.'/Edit',
            [
                'city' => $city
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param City $city
     * @return RedirectResponse
     */
    public function update(Request $request, City $city): RedirectResponse
    {
        $this->cityService->updateCity($city, $request->all());

        return redirect()->back()->with(
            [
                "message" => 'City successfully updated'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return RedirectResponse
     */
    public function destroy(City $city): RedirectResponse
    {
        $this->cityService->deleteCity($city);

        return redirect()
            ->back()
            ->with(
                [
                    "message" => 'city successfully deleted'
                ]
            );
    }
}
