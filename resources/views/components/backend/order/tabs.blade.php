<div x-data="{activeTab:'tabHome'}" class="tabs flex flex-col ">
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
                    @click="activeTab = 'tabPayment'"
                    :class="activeTab === 'tabPayment' ? 'border-success dark:border-accent text-success dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                    class="btn shrink-0 rounded-none border-b-2 px-3 py-2 font-medium">
                    {{ __('general.order.payment_details') }}
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
            x-show="activeTab === 'tabPayment'"
            x-transition:enter="transition-all duration-500 easy-in-out"
            x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
            <x-backend.order.payment
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
