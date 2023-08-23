<x-admin-layout title="  {{ __('general.container.edit_container') }}">
    <div class="grid lg:gap-6 lg:grid-cols-2  sm:grid-cols-2 sm:mb-4 xs:mb-4">
        <div>
            <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
            {{ __('general.container.edit_container') }}
        </div>
        <div class="flex lg:justify-end sm:justify-end items-center">

        </div>
    </div>
    <div class="grid w-ful gap-6 lg:grid-cols-3  mb-4">
        <div class=" w-full h-full col-span-2">
            <x-app-partials.card class="p-8">
                <x-backend.container.form
                    :countries="$countries"
                    :container="$container"
                    :barcodes="$barcodes"
                    button="{{ __('form.save_changes') }}"
                    route="{{ route('container.update', $container) }}"
                    method="PUT"
                />
            </x-app-partials.card>
        </div>
        <div>
            <x-backend.skeleton/>
        </div>
    </div>
</x-admin-layout>
