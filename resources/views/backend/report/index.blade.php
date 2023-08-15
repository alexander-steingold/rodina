<x-admin-layout title="Admin Reports">
    <div class="grid lg:gap-6 lg:grid-cols-2  sm:grid-cols-2 sm:mb-4 xs:mb-4">
        <div>
            <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
                {{ __('general.report.reports') }}
            </h2>
        </div>
        <div class="flex lg:justify-end sm:justify-end">

        </div>
    </div>

    <div class="grid grid-cols-4 gap-4">
        <div class="col-span-1">
            <x-backend.report.sidebar-search
                :couriers="$data['couriers']"
            />
        </div>
        <div class="col-span-3 ">
            <div class="ml-5 mb-6">

                <x-backend.report.totals
                    :data="$data"
                />

                <div class="mt-4 mb-4">
                    <x-backend.report.total_incomes :data="$data" class="mt-0"/>
                </div>
                <x-backend.report.chart_year
                    :chartData="$data['total_payments_by_month']"
                />
                @if($data['orders'])
                    <x-app-partials.card class="p-6 mt-4">
                        <x-backend.report.table-list
                            :orders="$data['orders']"
                            export="1"
                        />
                    </x-app-partials.card>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
