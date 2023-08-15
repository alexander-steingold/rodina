<?php

namespace App\Http\Controllers\Backend;

use App\Enums\UserStatuses;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourierRequest;
use App\Models\City;
use App\Models\Courier;
use App\Services\CourierService;
use Illuminate\Http\Request;

class CourierController extends Controller
{

    public function __construct(private CourierService $courierService)
    {
        $this->statuses = UserStatuses::keyLabels();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $couriers = $this->courierService->index();
        $cities = City::all();
        return view('backend.courier.index',
            [
                'couriers' => $couriers,
                'statuses' => $this->statuses,
                'cities' => $cities
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('backend.courier.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourierRequest $request)
    {
        if ($this->courierService->store($request) === true) {
            return redirect()->route('courier.index')->with('success', __('general.courier.alerts.courier_successfully_created'));
        } else {
            return redirect()->route('courier.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Courier $courier)
    {
        return view('backend.courier.show', ['courier' => $courier->load([
            'orders' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
            'city'
        ])]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Courier $courier)
    {
        $cities = City::all();
        return view('backend.courier.edit', ['courier' => $courier, 'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourierRequest $request, Courier $courier)
    {
        if ($this->courierService->update($request, $courier) === true) {
            return redirect()->route('courier.index')->with('success', __('general.courier.alerts.courier_successfully_updated'));
        } else {
            return redirect()->route('courier.index')->with('error', __('general.courier.operation_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courier $courier)
    {
        try {
            $this->authorize('delete', $courier);
            $courier->delete();
            return redirect()->back()->with('success', __('general.courier.alerts.courier_successfully_deleted'));
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            return redirect()->back()->with('error', __('general.alerts.operation_failed') . ' ' . __('general.alerts.courier_has_orders'));
        }
    }
}
