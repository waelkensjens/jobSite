<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use App\Models\City;
use App\Models\Type;
use App\Services\TypeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use function redirect;

class TypeController extends Controller
{

    protected TypeService $typeService;
    protected string $componentPrefix;

    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
        $this->componentPrefix = 'Admin/Types';
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $types = $this->typeService->paginated();

        return Inertia::render(
            component: $this->componentPrefix.'/Index',
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
            component: $this->componentPrefix.'/Create',
            props: [

            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTypeRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTypeRequest $request): RedirectResponse
    {
        $this->typeService->create($request->all());

        return redirect()->to(
            route('admin.types.index')
        )->with(
            [
                'success' => 'type was succesfully created'
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
     * @param int $typeId
     * @return Response
     */
    public function edit(int $typeId): Response
    {
        $type = $this->typeService->getById($typeId);

        return Inertia::render(
            $this->componentPrefix.'/Edit',
            [
                'type' => $type
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $typeId
     * @return RedirectResponse
     */
    public function update(Request $request, int $typeId): RedirectResponse
    {
        $this->typeService->update(
            $typeId,
            $request->all()
        );

        return redirect()->back()->with(
            [
                "success" => 'City successfully updated'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $typeId
     * @return RedirectResponse
     */
    public function destroy(int $typeId): RedirectResponse
    {
        $this->typeService->delete($typeId);

        return redirect()
            ->route('admin.types.index')
            ->with(
                [
                    "success" => 'type successfully deleted'
                ]
            );
    }
}
