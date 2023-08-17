<?php

namespace App\Services;

use App\Http\Requests\RouteRequest;
use App\Models\Route;
use Illuminate\Support\Facades\DB;


class RouteService
{
    public function index()
    {
        $filters = request()->only(
            'search'
        );
        $routes = Route::latest()
            ->filter($filters)
            ->get();
        //$routes->appends(request()->query());
        return $routes;
    }

    public function store(RouteRequest $request)
    {
        try {
            DB::beginTransaction();
            Route::create($request->validated());
            DB::commit();
            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }

    public function update(RouteRequest $request, Route $route)
    {
        try {
            DB::beginTransaction();
            $route->update($request->validated());
            DB::commit();
            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }


}
