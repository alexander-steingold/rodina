<x-admin-layout title="{{ __('general.quote.quotes') }}">
    <div class="grid lg:gap-6 lg:grid-cols-2  sm:grid-cols-2 sm:mb-4 xs:mb-4">
        <div>
            <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
                {{ __('general.quote.quotes') }}
            </h2>
        </div>
        <div class="flex lg:justify-end sm:justify-end">

        </div>
    </div>
    <div class="flex flex-wrap w-full">
        <div class="w-full md:w-1/4">
            <x-backend.quote.sidebar-search/>
        </div>
        <div class="w-full md:w-3/4 lg:pl-8 sm:pl-5 ">
            <x-app-partials.card class="p-6">
                @if($quotes)
                    <x-backend.quote.table-list
                        :quotes="$quotes"
                    />
                @endif
            </x-app-partials.card>
        </div>
    </div>
</x-admin-layout>

