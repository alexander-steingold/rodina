<x-app-partials.card>
    <h2 class="text-lg text-slate-700">
        {{ __('general.order.orders_by_status') }}
    </h2>

    @foreach($data['orderByStatus'] as $key => $val)
        <div class="flex justify-between items-center mt-3">
            <div class="text-sm text-slate-700">
                {{ __('general.order.statuses.'.$key) }}
            </div>
            <div class="text-success">
                {{ $val }}
            </div>
        </div>
    @endforeach
</x-app-partials.card>
