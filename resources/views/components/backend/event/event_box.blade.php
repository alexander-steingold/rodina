<div class="w-full border border-slate-150 bg-white py-3 px-4 dark:border-navy-600 dark:bg-navy-700"
     style="width: 300px">
    <h3
        class=" text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
    >
        <a href="{{ route('route.show',  $event->route) }}" target="_blank">
            <div class="flex items-center space-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                </svg>
                <div>
                    {{ $event->route->title }}
                </div>
            </div>
        </a>

    </h3>

    <div class="mt-2">
        <a href="{{ route('courier.show',  $event->courier) }}"
           target="_blank">
            <div class="flex items-center space-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"/>
                </svg>
                <div>
                    {{ $event->courier->first_name }}
                    {{ $event->courier->last_name }}
                </div>
            </div>
        </a>
    </div>
    <div class="mt-2" style="height: 150px; overflow-y: auto">
        @foreach($e['order_associations'] as $association)
            <a href="{{ route('order.show', $association['order']['id']) }}" target="_blank">
                <div class="flex space-x-1 mt-1 text-sm items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/>
                        </svg>

                    </div>
                    <div class="text-success">
                        #{{ $association['order']['oid'] }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-2">
        <div class="flex items-start space-x-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
            </svg>
            <div class="text-sm -mt-1">
                {{ $event->remarks }}
            </div>
        </div>
    </div>
    <x-app-partials.divider/>
    <div class="mt-2 flex items-center justify-between">
        <div class="mt-2 flex items-center space-x-1">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 text-slate-400 dark:text-navy-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                ></path>
            </svg>
            <span class="text-xs">
                            {{ date("d/m/Y", strtotime($e['date'])) }}
                        </span>
        </div>

        @can('delete', $event)
            <a href="{{ route('event.edit', $e['id']) }}"
               class="btn h-5 w-5 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200
                hover:shadow-lg hover:shadow-slate-200/50 focus:bg-slate-200 focus:shadow-lg
                focus:shadow-slate-200/50 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50
                dark:hover:bg-navy-450 dark:hover:shadow-navy-450/50 dark:focus:bg-navy-450
                dark:focus:shadow-navy-450/50 dark:active:bg-navy-450/90"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 rotate-45"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M7 11l5-5m0 0l5 5m-5-5v12"
                    ></path>
                </svg>
            </a>
        @endcan

    </div>

    @if(isset($full) &&  isset($event->trackers) && count($event->trackers)  )
        <x-app-partials.divider/>
        <div class="flex items-center space-x-1 text-slate-900">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <div>
                {{ __('general.operator_action') }}
            </div>
        </div>
        <div style="height: 70px; overflow-y: auto">
            @foreach($event->trackers as $tracker)
                <div class="grid grid-cols-2 grap-4 text-xs mt-2 text-slate-700">
                    <div>
                        {{ $tracker->user->name }}
                        <div class="text-xs">
                            {{ $tracker->created_at->format('d/m/Y') }}
                        </div>
                    </div>
                    <div class="text-right">
                        {{ __('general.action.'.$tracker->action) }}
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
