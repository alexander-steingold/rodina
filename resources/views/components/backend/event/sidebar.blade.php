<div x-show="showDrawer" x-data="{ showDrawer: false }"

     x-on:show-drawer.window="($event.detail.drawerId === 'left-drawer') && (showDrawer = true)"
     @keydown.window.escape="showDrawer = false">

    <div class="fixed inset-0 z-[100] bg-slate-900/60 transition-opacity duration-200" @click="showDrawer = false"
         x-show="showDrawer" x-transition:enter="ease-out" x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"></div>
    <div class="fixed left-0 top-0 z-[101] h-full w-72">

        <div
            class="py-5 flex h-full w-full transform-gpu flex-col bg-white transition-transform duration-200 dark:bg-navy-700"
            x-show="showDrawer" x-transition:enter="ease-out" x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0" x-transition:leave="ease-in"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
            <div
                x-data="{expandedItem:null}"
                class="flex flex-col "
            >
                <h2 class=" ml-4 mb-4 text-slate-600 dark:text-navy-100">
                    {{ __('general.event.planned_events') }}
                </h2>
                @foreach ($events as $index => $event)
                    <div
                        x-data="accordionItem('item-{{ $index }}')"
                        class="overflow-hidden rounded-0 border mb-2 border-slate-150 dark:border-navy-500"
                    >
                        <div
                            class="flex items-center justify-between bg-slate-150 p-2  dark:bg-navy-500 sm:px-5"
                        >
                            <div
                                class="flex items-center space-x-2 tracking-wide outline-none transition-all"
                            >

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5 text-success  transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-300 dark:group-hover:text-accent dark:group-focus:text-accent"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                                </svg>

                                <span>
                                {{ date('d/m/Y', strtotime($event->date)) }}
                            </span>
                            </div>
                            <button
                                @click="expanded = !expanded"
                                class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                            >
                                <i
                                    :class="expanded && '-rotate-180'"
                                    class="fas fa-chevron-down text-sm transition-transform"
                                ></i>
                            </button>
                        </div>
                        <div x-collapse x-show="expanded">
                            <div class="">
                                @php
                                    $e = $event->toArray()
                                @endphp
                                <div class="flex justify-between">
                                    <div class="flex w-full flex-wrap -space-x-2">
                                        <x-backend.event.event_box
                                            :e="$e"
                                            :event="$event"
                                            full="true"
                                            class="rounded-0 border-0"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
