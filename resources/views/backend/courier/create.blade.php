<x-admin-layout title="Customer Registration">
    <div class=" mb-4">
        <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
            {{ __('general.courier.new_courier') }}
        </h2>
    </div>
    <div class="grid w-ful gap-6 lg:grid-cols-3  mb-4">
        <div class=" w-full h-full col-span-2">
            <x-app-partials.card class="p-8">
                <x-backend.courier.form
                    :cities="$cities"
                    :courier="null"
                    button="{{ __('general.courier.create_new_courier') }}"
                    route="{{ route('courier.store') }}"
                    method="POST"
                />
            </x-app-partials.card>
        </div>
        <div>
            <x-backend.skeleton/>
        </div>
    </div>
</x-admin-layout>
