<x-admin-layout title="{{ __('general.customer.new_customer') }}">
    <div class=" mb-4">
        <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
            {{ __('general.customer.new_customer') }}
        </h2>
    </div>
    <div class="grid w-ful gap-6 lg:grid-cols-3  mb-4">
        <div class=" w-full h-full col-span-2">
            <x-app-partials.card class="p-8">
                <x-backend.customer.form
                    :cities="$cities"
                    :customer="null"
                    button="{{ __('general.customer.create_new_customer') }}"
                    route="{{ route('customer.store') }}"
                    method="POST"
                />
            </x-app-partials.card>
        </div>
        <div class="lg:block hidden">
            <x-backend.skeleton/>
        </div>
    </div>
</x-admin-layout>
