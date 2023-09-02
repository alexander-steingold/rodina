<?php

namespace App\Services;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;


class CustomerService
{
    public function index()
    {
        $filters = request()->only(
            'search',
            'status',
            'city_id',
            'orders_count'
        );
        $customers = Customer::latest()
            ->withCount('orders')
            ->filter($filters)
            ->paginate(10);
        $customers->appends(request()->query());
        return $customers;
    }

    public function store(CustomerRequest $request)
    {
        try {
            DB::beginTransaction();
            $customer = Customer::create($request->validated());
            DB::commit();

            DB::beginTransaction();
            $customer->trackers()->create($request->validated());
            DB::commit();

            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }


    }

    public function update(CustomerRequest $request, Customer $customer)
    {

        try {
            DB::beginTransaction();
            $customer->update($request->validated());
            DB::commit();

            DB::beginTransaction();
            $customer->trackers()->create($request->validated());
            DB::commit();

            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }

    public function lastCustomer()
    {
        $customer = Customer::lastCustomer()->withCount('orders')->get();
        return $customer;
    }

}
