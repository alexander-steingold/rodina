<x-admin-layout title="  {{ __('general.order.order_details') }}">
    <div class="grid lg:gap-6 lg:grid-cols-2  sm:grid-cols-2 lg:mb-2 xs:mb-2">
        <div>
            <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
                {{ __('general.order.order_details') }}
            </h2>
        </div>
        <div class="flex lg:justify-end sm:justify-end">
            <x-app-partials.link-button class="text-xs font-medium uppercase py-1.5"
                                        href="{{ route('order.edit', $order) }}"
                                        type="success">
                {{ __('general.order.edit_order') }}
            </x-app-partials.link-button>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="col-span-2">
            <div x-data="{activeTab:'tabHome'}" class="tabs flex flex-col mt-2">
                <div class="is-scrollbar-hidden overflow-x-auto">
                    <div class="border-b-2 border-slate-150 dark:border-navy-500">
                        <div class="tabs-list flex">
                            <button
                                @click="activeTab = 'tabHome'"
                                :class="activeTab === 'tabHome' ? 'border-success dark:border-accent text-success dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                class="btn shrink-0 rounded-none border-b-2 px-3 py-2 font-medium">
                                {{ __('general.order.general_details') }}
                            </button>
                            <button
                                @click="activeTab = 'tabProfile'"
                                :class="activeTab === 'tabProfile' ? 'border-success dark:border-accent text-success dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                class="btn shrink-0 rounded-none border-b-2 px-3 py-2 font-medium">
                                {{ __('general.order.recipient_details') }}
                            </button>
                            <button
                                @click="activeTab = 'tabMessages'"
                                :class="activeTab === 'tabMessages' ? 'border-success dark:border-accent text-success dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                class="btn shrink-0 rounded-none border-b-2 px-3 py-2 font-medium">
                                {{ __('general.order.customer_details') }}
                            </button>
                            <button
                                @click="activeTab = 'tabFiles'"
                                :class="activeTab === 'tabFiles' ? 'border-success dark:border-accent text-success dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                class="btn shrink-0 rounded-none border-b-2 px-3 py-2 font-medium">
                                {{ __('general.order.documents') }}
                            </button>
                            <button
                                @click="activeTab = 'tabEvents'"
                                :class="activeTab === 'tabEvents' ? 'border-success dark:border-accent text-success dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                class="btn shrink-0 rounded-none border-b-2 px-3 py-2 font-medium">
                                {{ __('general.event.events') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-content pt-4">
                    <div
                        x-show="activeTab === 'tabHome'"
                        x-transition:enter="transition-all duration-500 easy-in-out"
                        x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                        <x-backend.order.general
                            :order="$order"
                        />
                    </div>
                    <div
                        x-show="activeTab === 'tabProfile'"
                        x-transition:enter="transition-all duration-500 easy-in-out"
                        x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                        <x-backend.order.recipient
                            :order="$order"
                        />
                    </div>
                    <div
                        x-show="activeTab === 'tabMessages'"
                        x-transition:enter="transition-all duration-500 easy-in-out"
                        x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                        <x-backend.order.customer
                            :order="$order"
                        />
                    </div>
                    <div
                        x-show="activeTab === 'tabFiles'"
                        x-transition:enter="transition-all duration-500 easy-in-out"
                        x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                        <x-backend.order.files
                            :files="$order->files"
                        />
                    </div>
                    <div
                        x-show="activeTab === 'tabEvents'"
                        x-transition:enter="transition-all duration-500 easy-in-out"
                        x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                        <x-backend.order.events
                            :associations="$order->associations"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h3 class="text-normal font-medium text-slate-500 mt-4 mb-6 flex items-center space-x-1">
                <span>
                      {{ __('general.order.order_status') }}
                </span>
            </h3>
            <ol class="timeline line-space max-w-sm ml-1">
                @foreach($order->statuses as $status)
                    <li class="timeline-item">
                        <div
                            class="timeline-item-point rounded-full border-2 border-success dark:border-navy-400"
                        ></div>
                        <div class="timeline-item-content flex-1 pl-4 sm:pl-8">
                            <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                                    {{ __('general.order.statuses.'.$status->status) }}
                                </p>
                                <span class="text-sm text-slate-400 dark:text-navy-300">
                                   {{ $status->created_at->format('d/m/Y') }}
                                </span>
                            </div>
                            <p class="py-1 text-sm flex items-center space-x-1">
                                <i class="fa-regular text-xs font-medium fa-user text-success"></i>
                                <span>{{ $status->user->name }}</span>
                            </p>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</x-admin-layout>
