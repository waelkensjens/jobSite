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
        $cities = $this->cityService->paginated(5, []);

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
        $this->cityService->create($request->all());

        $cities = $this->cityService->list();

        return Inertia::render(
            $this->componentPrefix.'/Index',
            [
                'cities' => $cities
            ]
        )->with(
            [
                'success' => 'city was successfully created'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $cityId
     * @return Response
     */
    public function show(int $cityId): Response
    {
        $city = $this->cityService->getById($cityId);

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
     * @param int $cityId
     * @return Response
     */
    public function edit(int $cityId): Response
    {
        $city = $this->cityService->getById($cityId);

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
     * @param int $cityId
     * @return RedirectResponse
     */
    public function update(Request $request, int $cityId): RedirectResponse
    {
        $this->cityService->update($cityId, $request->all());

        return redirect()->back()->with(
            [
                "success" => 'City successfully updated'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $cityId
     * @return RedirectResponse
     */
    public function destroy(int $cityId): RedirectResponse
    {
        $this->cityService->delete($cityId);

        return redirect()
            ->to(route('admin.cities.index'))
            ->with(
                [
                    "success" => 'city successfully deleted'
                ]
            );
    }
}
