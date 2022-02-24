<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\StoreTypeRequest;
use App\Models\City;
use App\Models\Type;
use App\Services\Contracts\TypeServiceContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TypeController extends Controller
{

    protected TypeServiceContract $typeService;

    public function __construct(TypeServiceContract $typeService)
    {
        $this->typeService = $typeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $types = $this->typeService->list();

        return Inertia::render(
            component: 'Admin/types/index',
            props: [
                'types' => $types
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
            component: 'Admin/Types/create',
            props: [

            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTypeRequest $request
     * @return Response
     */
    public function store(StoreTypeRequest $request): Response
    {
        $this->typeService->createType($request->all());

        $types = $this->typeService->list();

        return Inertia::render(
            'Admin/Types/Index',
            [
                'types' => $types
            ]
        )->with(
            [
                'message' => 'type was succesfully created'
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
            'cities/Description',
            [
                'city' => $city
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Type $type
     * @return Response
     */
    public function edit(Type $type): Response
    {
        return Inertia::render(
            'Admin/Types/Edit',
            [
                'type' => $type
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Type $type
     * @return RedirectResponse
     */
    public function update(Request $request, Type $type): RedirectResponse
    {
        $this->typeService->updateType($type);

        return redirect()->back()->with(
            [
                "message" => 'City successfully updated'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Type $type
     * @return RedirectResponse
     */
    public function destroy(Type $type): RedirectResponse
    {
        $this->typeService->deleteType($type);

        return redirect()
            ->back()
            ->with(
                [
                    "message" => 'city successfully deleted'
                ]
            );
    }
}
