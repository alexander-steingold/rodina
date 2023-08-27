<x-admin-layout title=" {{ __('navbar.dashboard') }}">
    <div class="grid lg:grid-cols-4 grid-cols-1 gap-4">
        <div class="lg:col-span-1">
            <x-backend.dashboard.sidebar :data="$data"/>
        </div>
        <div class="lg:col-span-3 ">
            <div class="ml-5 mb-6 mt-4 lg:mt-0">
                <h2 class="flex items-center space-x-1 text-slate-700 font-medium uppercase">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                    <div>
                        {{ __('general.general_stats') }}
                    </div>
                </h2>
                <x-backend.dashboard.totals :data="$data"/>
                @can('is_admin', auth()->user())
                    <h2 class="mt-4 flex items-center space-x-1 text-slate-700 font-medium uppercase">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                        <div>
                            {{ __('general.three_months_payments') }}
                        </div>
                    </h2>
                    <x-backend.dashboard.total_incomes :data="$data"/>
                @endcan
                <h2 class="mt-4 flex items-center space-x-1 text-slate-700 font-medium uppercase">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                    <div>
                        {{ __('general.the_week_events') }}
                    </div>
                </h2>
                <x-backend.dashboard.events :data="$data"/>
                {{--                <x-backend.dashboard.orders :data="$data"/>--}}

                {{--                <x-backend.dashboard.customers :data="$data"/>--}}

                {{--                <x-backend.dashboard.couriers :data="$data"/>--}}
            </div>
        </div>
    </div>
</x-admin-layout>
