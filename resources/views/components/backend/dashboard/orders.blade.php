<x-app-partials.card class="mt-6">
    <div class="flex justify-between items-center">
        <h2 class="text-xl text-slate-700 mb-2">
            {{ __('general.order.orders') }}
        </h2>
        <a href="{{ route('order.index') }}"
           class="btn -mr-1 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
            <svg width="16" height="16" viewBox="0 0 8 16" xmlns="http://www.w3.org/2000/svg"
                 fill="#10B981">
                <path
                    d="m.772 1.19-.619.62a.375.375 0 0 0 0 .53L5.8 8 .153 13.66a.375.375 0 0 0 0 .53l.62.62a.375.375 0 0 0 .53 0l6.544-6.545a.375.375 0 0 0 0-.53L1.302 1.19a.375.375 0 0 0-.53 0Z"></path>
            </svg>
        </a>
    </div>
    @if($data['lastOrder'])
        <x-backend.order.table-list
            :orders="$data['lastOrder']"
        />
    @else
        no customers
    @endif
</x-app-partials.card>
