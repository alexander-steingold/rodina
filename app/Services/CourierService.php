<?php

namespace App\Services;

use App\Http\Requests\CourierRequest;
use App\Models\Courier;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;


class CourierService
{
    public function index()
    {
        $filters = request()->only(
            'search',
            'status',
            'city_id',
            'orders_count'
        );
        $couriers = Courier:: latest()
            ->withCount('orders')
            ->filter($filters)
            ->paginate(10);
        $couriers->appends(request()->query());
        return $couriers;
    }

    public function store(CourierRequest $request)
    {
        try {
            DB::beginTransaction();
            Courier::create($request->validated());
            DB::commit();
            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }

    public function update(CourierRequest $request, Courier $courier)
    {
        try {
            DB::beginTransaction();
            $courier->update($request->validated());
            DB::commit();
            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }

    public function lastCourier()
    {
        $courier = Courier::lastCourier()->withCount('orders')->get();
        return $courier;
    }

}
