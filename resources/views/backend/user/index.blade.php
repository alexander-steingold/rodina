<x-admin-layout title="Customers">
    <div class="grid lg:gap-6 lg:grid-cols-2  sm:grid-cols-2 sm:mb-4 xs:mb-4">
        <div>
            <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
                {{ __('general.user.users') }}
            </h2>
        </div>
        <div class="flex lg:justify-end sm:justify-end">
            <x-app-partials.link-button class="text-xs font-medium uppercase py-1.5"
                                        href="{{ route('user.create') }}" type="success">
                {{--                <svg xmlns="http://www.w3.org/2000/svg" class=" h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"--}}
                {{--                     stroke="currentColor" stroke-width="4">--}}
                {{--                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>--}}
                {{--                </svg>--}}
                {{ __('general.user.add_user') }}
            </x-app-partials.link-button>
        </div>
    </div>
    <div class="flex flex-wrap w-full">

        <div class="w-full ">
            <x-app-partials.card class="p-6">
                @if($users)
                    <x-backend.user.table-list
                        :users="$users"
                    />
                @endif
            </x-app-partials.card>
        </div>

    </div>
</x-admin-layout>

