<x-app-partials.card {{ $attributes->merge(['class' => 'mt-2']) }}>
    <div class=" text-center">
        <div class="grid lg:grid-cols-3 gap-4 grid-cols-1">
            @foreach($data['total_payments_3months'] as $payment)
                <div class="rounded-lg bg-slate-100 p-4 dark:bg-navy-700">
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
