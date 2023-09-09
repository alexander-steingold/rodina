<x-admin-layout title="{{ __('general.container.container_details') }}">
    <div
        class="grid lg:gap-6 lg:grid  cols-2  sm:grid-cols-2 sm:mb-4 xs:mb-4">
        <div>
            <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
                {{ __('general.container.container_details') }}
            </h2>
        </div>
        <div class="flex lg:justify-end sm:justify-end">
            <x-app-partials.link-button class="text-xs uppercase font-medium py-1.5"
                                        href="{{ route('container.edit', $container) }}"
                                        type="success">
                {{ __('general.container.edit_container') }}
            </x-app-partials.link-button>
        </div>
    </div>
    <div class="grid gap-6 lg:grid-cols-3 ">
        <div class="col-span-2">
            <x-app-partials.card class="p-6">
                <div class="grid gap-x-6 gap-y-4 lg:grid-cols-2">
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            #{{ $container->cid }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.container.number') }}

                        </p>
                    </div>

                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{$container->company }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.container.company') }}
                        </p>
                    </div>

                    <x-app-partials.divider class="col-span-2"/>

                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $container->country->name }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.country') }}
                        </p>
                    </div>

                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $container->weight }} kg
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.order.weight') }}
                        </p>
                    </div>

                    <x-app-partials.divider class="col-span-2"/>

                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ isset($container->order_date) ? date("m/d/Y", strtotime($container->order_date)) : '' }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.container.order_date') }}
                        </p>
                    </div>

                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ isset($container->departure_date) ? date("m/d/Y", strtotime($container->departure_date)) : '' }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.container.departure_date') }}
                        </p>
                    </div>

                    <x-app-partials.divider class="col-span-2"/>

                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ isset($container->arrival_date) ? date("m/d/Y", strtotime($container->arrival_date)) : '' }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.container.arrival_date') }}
                        </p>
                    </div>

                    <x-app-partials.divider class="col-span-2"/>
                    
                    <div class="lg:col-span-2">
                        <h3 class="font-medium text-slate-700  dark:text-navy-100">
                            {{ $container->remarks }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.remarks') }}
                        </p>
                    </div>
                </div>
            </x-app-partials.card>
            <x-backend.tracker-table
                :module="$container"
            />
        </div>
        <div>
            <h3 class="text-xl text-slate-700 mb-6">{{ __('general.container.barcodes') }}</h3>
            <x-backend.sidebar-barcodes :orders="$container->orders"/>
        </div>
    </div>
</x-admin-layout>
