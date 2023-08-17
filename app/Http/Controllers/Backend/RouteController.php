<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Courier;
use App\Models\Route;
use App\Http\Requests\RouteRequest;
use App\Services\RouteService;


class RouteController extends Controller
{

    public function __construct(private RouteService $routeService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = $this->routeService->index();
        return view('backend.route.index',
            [
                'routes' => $routes
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.route.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RouteRequest $request)
    {
        if ($this->routeService->store($request) === true) {
            return redirect()->route('route.index')->with('success', __('general.route.alerts.route_successfully_created'));
        } else {
            return redirect()->route('route.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route)
    {
        return view('backend.route.show', ['route' => $route]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route $route)
    {
        return view('backend.route.edit', ['route' => $route]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RouteRequest $request, Route $route)
    {
        if ($this->routeService->update($request, $route) === true) {
            return redirect()->route('route.index')->with('success', __('general.route.alerts.route_successfully_updated'));
        } else {
            return redirect()->route('route.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        //
    }
}
