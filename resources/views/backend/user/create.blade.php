<x-admin-layout title="Customer Registration">
    <div class=" mb-4">
        <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
            {{ __('general.user.new_user') }}
        </h2>
    </div>
    <div class="grid w-ful gap-6 lg:grid-cols-3  mb-4">
        <div class=" w-full h-full col-span-2">
            <x-app-partials.card class="p-8">
                <x-backend.user.form
                    :user="null"
                    button="{{ __('general.user.create_new_user') }}"
                    route="{{ route('user.store') }}"
                    method="POST"
                />
            </x-app-partials.card>
        </div>
        <div>
            <x-backend.skeleton/>
        </div>
    </div>
</x-admin-layout>
