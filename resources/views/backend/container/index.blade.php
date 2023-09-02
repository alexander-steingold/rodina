<x-admin-layout title="{{ __('general.container.containers') }}">
    <div class="grid lg:gap-6 lg:grid-cols-2  sm:grid-cols-2 sm:mb-4 xs:mb-4">
        <div>
            <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
                {{ __('general.container.containers') }}
            </h2>
        </div>
        <div class="flex lg:justify-end sm:justify-end">
            <x-app-partials.link-button class="text-xs uppercase font-medium py-1.5"
                                        href="{{ route('container.create') }}" type="success">
                {{--                <svg xmlns="http://www.w3.org/2000/svg" class=" h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"--}}
                {{--                     stroke="currentColor" stroke-width="4">--}}
                {{--                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>--}}
                {{--                </svg>--}}
                {{ __('general.container.add_container') }}
            </x-app-partials.link-button>
        </div>
    </div>
    <div class="flex flex-wrap w-full">
        <div class="w-full md:w-1/4">
            <x-backend.container.sidebar-search
                :countries="$countries"
                :barcodes="$barcodes"
            />
        </div>
        <div class="w-full md:w-3/4 lg:pl-8 sm:pl-5 ">
            <x-app-partials.card class="p-6">
                @if($containers)
                    <x-backend.container.table-list
                        :containers="$containers"
                    />
                @endif
            </x-app-partials.card>
        </div>
    </div>
</x-admin-layout>

