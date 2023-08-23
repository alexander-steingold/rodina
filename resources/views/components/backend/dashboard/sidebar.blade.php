@can('is_admin', auth()->user())
    <x-app-partials.card>
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
    </x-app-partials.card>
@endcan

<h2 class="text-slate-700 mt-4 font-medium uppercase">
    {{ __('general.order.orders_by_status') }}
</h2>
<x-app-partials.card class="mt-2">
    @foreach($data['orderByStatus'] as $key => $val)
        <div class="flex justify-between items-center mt-2">
            <div class="text-sm text-slate-700">
                <a href="{{ route('order.index') }}?status={{ $key  }}">
                    {{ __('general.order.statuses.'.$key) }}
                </a>
            </div>
            <div class="text-success">
                {{ $val }}
            </div>
        </div>
    @endforeach
</x-app-partials.card>
