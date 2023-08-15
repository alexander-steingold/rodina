<x-admin-layout title="Customers">
    <div class="grid lg:gap-6 lg:grid-cols-2  sm:grid-cols-2 sm:mb-4 xs:mb-4">
        <div>
            <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
                {{ __('general.customer.customers') }}
            </h2>
        </div>
        <div class="flex lg:justify-end sm:justify-end">
            <x-app-partials.link-button class="text-xs font-medium uppercase py-1.5"
                                        href="{{ route('customer.create') }}" type="success">
                {{--                <svg xmlns="http://www.w3.org/2000/svg" class=" h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"--}}
                {{--                     stroke="currentColor" stroke-width="4">--}}
                {{--                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>--}}
                {{--                </svg>--}}
                {{ __('general.customer.add_customer') }}
            </x-app-partials.link-button>
        </div>
    </div>
    <div class="flex flex-wrap w-full">
        <div class="w-full md:w-1/4">
            <x-backend.customer.sidebar-search
                :statuses="$statuses"
                :cities="$cities"
            />
        </div>
        <div class="w-full md:w-3/4 lg:pl-8 sm:pl-5 ">
            <x-app-partials.card class="p-6">
                @if($customers)
                    <x-backend.customer.table-list
                        :customers="$customers"
                    />
                @endif
            </x-app-partials.card>
        </div>

    </div>


</x-admin-layout>

