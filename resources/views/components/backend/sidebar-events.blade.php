@if(count($events) > 0)
    <ol class="timeline line-space max-w-sm ml-1">
        @foreach($events as $event)
            <li class="timeline-item">
                <div
                    class="timeline-item-point rounded-full border-2 border-success dark:border-navy-400"></div>

                <div class="timeline-item-content flex-1 pl-4 sm:pl-8">
                    <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                        <div>
                            <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                                {{ $event->route->title }}
                            </p>
                            <div class="text-sm m-1 flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-success" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                                </svg>
                                <div>
                                    {{ $event->courier->first_name }}
                                    {{ $event->courier->last_name }}
                                </div>

                            </div>
                        </div>

                        <span class="text-sm text-slate-400 dark:text-navy-300">
                                   {{ date('d/m/Y', strtotime($event->date)) }}
                                </span>
                    </div>


                </div>

            </li>
        @endforeach
    </ol>
@else
    {{ __('general.event.no_events') }}
@endif
