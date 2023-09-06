<?php

namespace App\Http\Controllers\Backend;

use App\Enums\UserStatuses;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\City;
use App\Models\Customer;
use App\Services\CustomerService;


class CustomerController extends Controller
{
    protected $statuses;

    public function __construct(private CustomerService $customerService)
    {
        parent::__construct();
        $this->statuses = UserStatuses::keyLabels();
    }

    public function index()
    {
        $customers = $this->customerService->index();
        $cities = City::all();
        return view('backend.customer.index',
            [
                'customers' => $customers,
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
        //$this->authorize('viewAny', $customer);
        $cities = City::all();
        return view('backend.customer.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        // $this->authorize('store', Customer::class);
        if ($this->customerService->store($request) === true) {
            return redirect()->route('customer.index')->with('success', __('general.customer.alerts.customer_successfully_created'));
        } else {
            return redirect()->route('customer.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //$this->authorize('view', $customer);

        return view('backend.customer.show', ['customer' => $customer->load([
            'orders' => function ($query) {
                $query->orderBy('created_at', 'asc');
            },
            'city'
        ])]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //$this->authorize('update', $customer);
        $cities = City::all();
        return view('backend.customer.edit', ['customer' => $customer, 'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        //$this->authorize('update', $customer);
        if ($this->customerService->update($request, $customer) === true) {
            return redirect()->route('customer.index')->with('success', __('general.customer.alerts.customer_successfully_updated'));
        } else {
            return redirect()->route('customer.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        try {
            $this->authorize('delete', $customer);
            $customer->delete();
            return redirect()->route('customer.index')->with('success', __('general.customer.alerts.customer_successfully_deleted'));
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            return redirect()->route('customer.index')->with('error', __('general.alerts.operation_failed') . ' ' . __('general.alerts.customer_has_orders'));
        }
    }
}
