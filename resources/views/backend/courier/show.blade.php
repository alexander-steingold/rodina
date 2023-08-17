<x-admin-layout title="Customer Profile">
    <div class="grid lg:gap-6 lg:grid-cols-2  sm:grid-cols-2 sm:mb-4 xs:mb-4">
        <div>
            <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
                {{ __('general.courier.courier_profile') }}
            </h2>
        </div>
        <div class="flex lg:justify-end sm:justify-end">
            <x-app-partials.link-button class="text-xs uppercase font-medium py-1.5"
                                        href="{{ route('courier.edit', $courier) }}"
                                        type="success">
                {{--                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"--}}
                {{--                     stroke="currentColor" stroke-width="2">--}}
                {{--                    <path stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>--}}
                {{--                </svg>--}}
                {{ __('general.courier.edit_courier') }}
            </x-app-partials.link-button>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-3 ">
        <div class="col-span-2">
            <x-app-partials.card class="p-6">

                <div class="grid gap-x-6 gap-y-4 lg:grid-cols-2">
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $courier->first_name }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.first_name') }}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $courier->last_name }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.last_name') }}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{$courier->cid }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.courier.courier_number') }}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $courier->pid }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.id_number') }}
                        </p>
                    </div>

                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $courier->car_number}}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.car_number') }}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $courier->city->name }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.city') }}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $courier->address }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.address') }}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $courier->email }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.email') }}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $courier->phone }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.phone') }}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $courier->mobile }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.mobile') }}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            @if($courier->status->value == 'active')
                                <div class="h-3.5 w-3.5 inline-block rounded-full border-2 border-success"></div>
                            @else
                                <div class="h-3.5 w-3.5 inline-block rounded-full border-2 border-error"></div>
                            @endif
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.status') }}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $courier->created_at->format('d/m/Y') }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.created_at') }}
                        </p>
                    </div>
                    <div class="lg:col-span-2">
                        <h3 class="font-medium text-slate-700  dark:text-navy-100">
                            {{ $courier->remarks }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.remarks') }}
                        </p>
                    </div>
                </div>
            </x-app-partials.card>
        </div>
        <div>
            {{--            <h3 class="text-xl text-slate-700 mb-6">{{ __('general.courier.courier_orders') }}</h3>--}}
            {{--            <x-backend.sidebar-orders :orders="$courier->orders"/>--}}
        </div>
    </div>
</x-admin-layout>
