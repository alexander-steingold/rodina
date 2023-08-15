<x-app-partials.card {{ $attributes->merge(['class' => ' p-8']) }}>
    {{--    <div class="flex justify-between items-center mb-2 ">--}}
    {{--        <h2 class="text-xl text-slate-700 mb-2">--}}
    {{--            {{ __('general.payment.income') }}--}}
    {{--        </h2>--}}
    {{--        <a href="{{ route('order.index') }}"--}}
    {{--           class="btn -mr-1 h-8 w-8 rounded-full  p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">--}}
    {{--            <svg width="16" height="16" viewBox="0 0 8 16" xmlns="http://www.w3.org/2000/svg"--}}
    {{--                 fill="#10B981">--}}
    {{--                <path--}}
    {{--                    d="m.772 1.19-.619.62a.375.375 0 0 0 0 .53L5.8 8 .153 13.66a.375.375 0 0 0 0 .53l.62.62a.375.375 0 0 0 .53 0l6.544-6.545a.375.375 0 0 0 0-.53L1.302 1.19a.375.375 0 0 0-.53 0Z"></path>--}}
    {{--            </svg>--}}
    {{--        </a>--}}
    {{--    </div>--}}
    <div class=" text-center">
        <div class="inline-flex items-center">
            <div class="text-5xl font-semibold text-success space-x-6">
                $
            </div>
            <div class="ml-2">
                <h3 class="text-2xl font-medium text-slate-700">
                    {{ $data['total_payments'] }} NIS
                </h3>
                <div class="text-sm ">
                    {{ __('general.payment.total_income') }}
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4 sm:grid-cols-3 sm:gap-5 lg:grid-cols-3 mt-6">

            @foreach($data['total_payments_3months'] as $payment)
                <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                    <div class="flex justify-between space-x-1">
                        <p class="text-lg font-medium text-slate-700 dark:text-navy-100">
                            {{ $payment['total_payment'] }} NIS
                        </p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success dark:text-accent"
                             fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="mt-1 text-sm">
                        {{ $payment['month_name'] }}
                    </p>
                </div>
            @endforeach
        </div>

    </div>

</x-app-partials.card>
