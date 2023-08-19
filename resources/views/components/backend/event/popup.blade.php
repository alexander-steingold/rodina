<div
    x-data="usePopper({
       offset: 12,
       placement: 'right-start',
       modifiers: [
          {name: 'flip', options: {fallbackPlacements: ['bottom','top']}},
          {name: 'preventOverflow', options: {padding: 10}}
       ]
    })"
    @click.outside="if(isShowPopper) isShowPopper = false"
    class="flex"
>
    <button
        x-ref="popperRef"
        @click="isShowPopper = !isShowPopper"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success" fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor" stroke-width="2">
            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
        </svg>
    </button>
    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
        @php
            $e = $event->toArray()
        @endphp
        <div class="popper-box" style="width:250px">
            <div
                class=" rounded-md border border-slate-150 bg-white py-3 px-4 dark:border-navy-600 dark:bg-navy-700"
            >

                <h3
                    class=" text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
                >
                    <a href="{{ route('courier.show',  $e['order_associations'][0]['route']['id']) }}" target="_blank">
                        <div class="flex items-center space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                            </svg>
                            <div>
                                {{ $e['order_associations'][0]['route']['title'] }}
                            </div>

                        </div>
                    </a>
                </h3>

                <div class="mt-2">
                    <a href="{{ route('courier.show',  $e['order_associations'][0]['courier']['id']) }}"
                       target="_blank">
                        <div class="flex items-center space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"/>
                            </svg>
                            <div>
                                {{ $e['order_associations'][0]['courier']['first_name'] }}
                                {{ $e['order_associations'][0]['courier']['last_name'] }}
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mt-2">
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
                            {{ date("d/m/Y", strtotime($event->date)) }}
                        </span>
                    </div>
                    <a href="{{ route('event.edit', $event) }}"
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
                </div>

            </div>

        </div>
    </div>
</div>
