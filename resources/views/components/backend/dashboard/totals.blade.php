<x-app-partials.card {{ $attributes->merge(['class' => 'mt-2 lg:p-8']) }}>
    <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 ">
        <a href="{{ route('customer.index') }}">
            <div class="rounded-lg bg-slate-100 p-4 dark:bg-navy-700">
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

        <a href="{{ route('order.index') }}">
            <div class="rounded-lg bg-slate-100 p-4 dark:bg-navy-700">
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


        <a href="{{ route('courier.index') }}">
            <div class="rounded-lg bg-slate-100 p-4 dark:bg-navy-700">
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
        <a href="{{ route('route.index') }}">
            <div class="rounded-lg bg-slate-100 p-4 dark:bg-navy-700">
                <div class="flex justify-between">
                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                        {{  $data['totals']['totalRoutes']}}
                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="w-5 h-5 text-success">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                    </svg>
                </div>
                <p class="mt-1 text-sm">
                    {{ __('general.route.routes') }}
                </p>
            </div>
        </a>
        <a href="{{ route('event.index') }}">
            <div class="rounded-lg bg-slate-100 p-4 dark:bg-navy-700">
                <div class="flex justify-between">
                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                        {{  $data['totals']['totalEvents']}}
                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="w-5 h-5 text-success">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"/>
                    </svg>
                </div>
                <p class="mt-1 text-sm">
                    {{ __('general.event.events') }}
                </p>
            </div>
        </a>
        <a href="{{ route('container.index') }}">
            <div class="rounded-lg bg-slate-100 p-4 dark:bg-navy-700">
                <div class="flex justify-between">
                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                        {{  $data['totals']['totalContainers']}}
                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="w-5 h-5 text-success">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3"/>
                    </svg>

                </div>
                <p class="mt-1 text-sm">
                    {{ __('general.container.containers') }}
                </p>
            </div>
        </a>
    </div>
</x-app-partials.card>
