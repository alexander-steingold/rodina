<x-admin-layout title="{{ __('general.route.route_details') }}">
    <div class="grid lg:gap-6 lg:grid-cols-2  sm:grid-cols-2 sm:mb-4 xs:mb-4">
        <div>
            <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
                {{ __('general.route.route_details') }}
            </h2>
        </div>
        <div class="flex lg:justify-end sm:justify-end">
            <x-app-partials.link-button class="text-xs uppercase font-medium py-1.5"
                                        href="{{ route('route.edit', $route) }}"
                                        type="success">
                {{--                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"--}}
                {{--                     stroke="currentColor" stroke-width="2">--}}
                {{--                    <path stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>--}}
                {{--                </svg>--}}
                {{ __('general.route.edit_route') }}
            </x-app-partials.link-button>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-3 ">
        <div class="col-span-2">
            <x-app-partials.card class="p-6">

                <div class="grid gap-x-6 gap-y-4 ">
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            #{{ $route->number }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.number') }}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $route->title }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.title') }}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{$route->description }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.description') }}
                        </p>
                    </div>


                </div>
            </x-app-partials.card>
        </div>
        <div>
            <div>
                <h3 class="text-xl text-slate-700 mb-6">{{ __('general.event.events') }}</h3>
                <x-backend.sidebar-events :events="$route->events"/>
            </div>
        </div>
    </div>
</x-admin-layout>
