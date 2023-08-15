<x-admin-layout title="Edit Order">
    <div class=" mb-4">
        <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
            {{ __('general.order.edit_order') }}
        </h2>
    </div>

    <div class="grid w-ful gap-6 lg:grid-cols-3  mb-4">
        <div class=" w-full h-full col-span-2">
            <x-app-partials.card class="p-8">
                <x-backend.order.form
                    :countries="$countries"
                    :customers="$customers"
                    :couriers="$couriers"
                    :statuses="$statuses"
                    :order=$order
                    button="{{ __('form.save_changes') }}"
                    route="{{ route('order.update', $order) }}"
                    method="PUT"
                />
            </x-app-partials.card>
        </div>
        <div>
           
            <x-backend.skeleton/>
        </div>
    </div>

</x-admin-layout>
