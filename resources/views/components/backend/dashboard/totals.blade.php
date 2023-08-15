<div class="grid grid-cols-3 gap-4 sm:grid-cols-3 sm:gap-5 lg:grid-cols-3">
    <a href="{{ route('order.index') }}">
        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
            <div class="flex justify-between space-x-1">
                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                    {{  $data['totals']['totalOrders']}}
                </p>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <p class="mt-1 text-sm">
                {{ __('general.order.orders') }}
            </p>
        </div>
    </a>

    <a href="{{ route('customer.index') }}">
        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
            <div class="flex justify-between">
                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                    {{  $data['totals']['totalCustomers']}}
                </p>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-success" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
            <p class="mt-1 text-sm">
                {{ __('general.customer.customers') }}
            </p>
        </div>
    </a>

    <a href="{{ route('courier.index') }}">
        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
            <div class="flex justify-between">
                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                    {{  $data['totals']['totalCouriers']}}
                </p>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5  text-success" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                </svg>
            </div>
            <p class="mt-1 text-sm">
                {{ __('general.courier.couriers') }}
            </p>
        </div>
    </a>
</div>
