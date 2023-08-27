<x-admin-layout title="  {{ __('general.order.order_details') }}">
    <div class="grid lg:gap-6 lg:grid-cols-2  sm:grid-cols-2 lg:mb-2 xs:mb-2">
        <div>
            <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
                {{ __('general.order.order_details') }}
            </h2>
        </div>
        <div class="flex lg:justify-end sm:justify-end">
            <x-app-partials.link-button class="text-xs font-medium uppercase py-1.5"
                                        href="{{ route('order.edit', $order) }}"
                                        type="success">
                {{ __('general.order.edit_order') }}
            </x-app-partials.link-button>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="col-span-2">
            <x-backend.order.tabs
                :order="$order"
            />
            <x-backend.tracker-table
                :module="$order"
            />
        </div>
        <div>
            <x-backend.order.statuses
                :order="$order"
            />
        </div>
    </div>
</x-admin-layout>
