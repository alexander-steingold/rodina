<x-admin-layout title="Order Details">
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
                {{--                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"--}}
                {{--                     stroke="currentColor" stroke-width="2">--}}
                {{--                    <path stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>--}}
                {{--                </svg>--}}
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
                                @click="activeTab = 'tabSettings'"
                                :class="activeTab === 'tabSettings' ? 'border-success dark:border-accent text-success dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                class="btn shrink-0 rounded-none border-b-2 px-3 py-2 font-medium">
                                {{ __('general.order.courier_details') }}
                            </button>
                            <button
                                @click="activeTab = 'tabFiles'"
                                :class="activeTab === 'tabFiles' ? 'border-success dark:border-accent text-success dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                class="btn shrink-0 rounded-none border-b-2 px-3 py-2 font-medium">
                                {{ __('general.order.documents') }}
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
                        <div>
                            <div class="px-4 py-4 sm:px-5 bg-white">
                                <div class="grid gap-x-6 gap-y-4 lg:grid-cols-2">
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->oid }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.order.order_number') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->barcode }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.order.barcode') }}
                                        </p>
                                    </div>
                                    <x-app-partials.divider class="col-span-2"/>

                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->boxes }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.order.boxes') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->weight }} kg
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.order.weight') }}
                                        </p>
                                    </div>

                                    <x-app-partials.divider class="col-span-2"/>

                                    <div>
                                        <h3 class="font-medium text-lg text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->prepayment  ? $order->prepayment : '0' }} NIS
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.order.prepayment') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-lg text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->payment  ? $order->payment : '0' }} NIS
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.order.payment') }}
                                        </p>
                                    </div>
                                    <x-app-partials.divider class="col-span-2"/>
                                    <div class="lg:col-span-2">
                                        <h3 class="font-medium  text-slate-700  dark:text-navy-100">
                                            {{ $order->remarks }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.remarks') }}
                                        </p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div
                        x-show="activeTab === 'tabProfile'"
                        x-transition:enter="transition-all duration-500 easy-in-out"
                        x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                        <div>
                            <div class="px-4 py-4 sm:px-5 bg-white">
                                <div class="grid gap-x-6 gap-y-4 lg:grid-cols-2">
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->first_name }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.first_name') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->last_name }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.last_name') }}
                                        </p>
                                    </div>

                                    <x-app-partials.divider class="col-span-2"/>

                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->country->name }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.country') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->city }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.city') }}
                                        </p>
                                    </div>

                                    <x-app-partials.divider class="col-span-2"/>

                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->address }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.address') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->email }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.email') }}
                                        </p>
                                    </div>

                                    <x-app-partials.divider class="col-span-2"/>

                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->phone }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.phone') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->mobile }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.mobile') }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div
                        x-show="activeTab === 'tabMessages'"
                        x-transition:enter="transition-all duration-500 easy-in-out"
                        x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                        <div>
                            <div class="px-4 py-4 sm:px-5 bg-white">
                                <div class="grid gap-x-6 gap-y-4 lg:grid-cols-2">
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->customer->first_name }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.first_name') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->customer->last_name }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.last_name') }}
                                        </p>
                                    </div>

                                    <x-app-partials.divider class="col-span-2"/>

                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->customer->country->name }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.country') }}
                                        </p>
                                    </div>

                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->customer->city->name }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.city') }}
                                        </p>
                                    </div>

                                    <x-app-partials.divider class="col-span-2"/>

                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->customer->address }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.address') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->customer->email }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.email') }}
                                        </p>
                                    </div>

                                    <x-app-partials.divider class="col-span-2"/>

                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->customer->phone }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.phone') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->customer->mobile }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.mobile') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        x-show="activeTab === 'tabSettings'"
                        x-transition:enter="transition-all duration-500 easy-in-out"
                        x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                        <div>
                            <div class="px-4 py-4 sm:px-5 bg-white">
                                <div class="grid gap-x-6 gap-y-4 lg:grid-cols-2">
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->courier->first_name }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.first_name') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->courier->last_name }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.last_name') }}
                                        </p>
                                    </div>

                                    <x-app-partials.divider class="col-span-2"/>

                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->courier->car_number }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.car_number') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->courier->city->name }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.city') }}
                                        </p>
                                    </div>

                                    <x-app-partials.divider class="col-span-2"/>

                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->courier->address }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.address') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->courier->email }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.email') }}
                                        </p>
                                    </div>

                                    <x-app-partials.divider class="col-span-2"/>

                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->courier->phone }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.phone') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $order->courier->mobile }}
                                        </h3>
                                        <p class="text-sm font-medium line-clamp-1 text-success">
                                            {{ __('general.user.mobile') }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div
                        x-show="activeTab === 'tabFiles'"
                        x-transition:enter="transition-all duration-500 easy-in-out"
                        x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                        <div>
                            <div class="px-4 py-4 sm:px-5 bg-white">
                                <div x-data="{ showModal: false, modalContent: '' }">
                                    @if(count($order->files) > 0)
                                        <table class="w-full text-left">
                                            <tbody>
                                            @foreach($order->files as $file)
                                                <tr class="border border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                    <td class="whitespace-nowrap py-3 ">
                                                        <button
                                                            @click="showModal = true; modalContent = `<object data='{{ url("storage/{$file->url}") }}' type='application/pdf' width='100%' height='640px'></object>`"
                                                            class="font-medium text-slate-800 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                            {{ $file->name }}
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        {{ __('general.no_files')}}
                                    @endif
                                    <template x-if="showModal">
                                        <div
                                            class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5">
                                            <div
                                                class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                                                x-on:click="showModal = false"></div>
                                            <div
                                                class="relative max-w-4xl w-full rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5">
                                                <div class="mt-4">
                                                    <span x-html="modalContent">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--            <div x-data="{expanded:true}"--}}
            {{--                 class="overflow-hidden rounded-lg border border-slate-150 dark:border-navy-500">--}}
            {{--                <div--}}
            {{--                    class="flex items-center justify-between bg-slate-150 px-4 py-4 dark:bg-navy-500 sm:px-5">--}}
            {{--                    <div--}}
            {{--                        class="flex items-center space-x-1 tracking-wide outline-none transition-all">--}}
            {{--                        <div class="">--}}
            {{--                            --}}{{--                            <svg xmlns="http://www.w3.org/2000/svg"--}}
            {{--                            --}}{{--                                 class="h-5 w-5 text-success transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"--}}
            {{--                            --}}{{--                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">--}}
            {{--                            --}}{{--                                <path stroke-linecap="round" stroke-linejoin="round"--}}
            {{--                            --}}{{--                                      d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>--}}
            {{--                            --}}{{--                            </svg>--}}
            {{--                        </div>--}}
            {{--                        <div>--}}
            {{--                            <p class="text-slate-700 text-lg  dark:text-navy-100">--}}
            {{--                                {{ __('general.order.general_details') }}--}}
            {{--                            </p>--}}

            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <button--}}
            {{--                        @click="expanded = !expanded"--}}
            {{--                        class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">--}}
            {{--                        <i :class="expanded && '-rotate-180'"--}}
            {{--                           class="fas fa-chevron-down text-sm transition-transform"></i>--}}
            {{--                    </button>--}}
            {{--                </div>--}}
            {{--                <div x-collapse x-show="expanded">--}}
            {{--                    <div class="px-4 py-4 sm:px-5 bg-white">--}}
            {{--                        <div class="grid gap-x-6 gap-y-4 lg:grid-cols-2">--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->oid }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.order.order_number') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->barcode }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.order.barcode') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-lg text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->prepayment  ? $order->prepayment : '0' }} NIS--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.order.prepayment') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-lg text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->payment  ? $order->payment : '0' }} NIS--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.order.payment') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}

            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            <div x-data="{expanded:true}"--}}
            {{--                 class="overflow-hidden mt-4 rounded-lg border border-slate-150 dark:border-navy-500">--}}
            {{--                <div--}}
            {{--                    class="flex items-center justify-between bg-slate-150 px-4 py-4 dark:bg-navy-500 sm:px-5">--}}
            {{--                    <div--}}
            {{--                        class="flex items-center space-x-1 tracking-wide outline-none transition-all">--}}
            {{--                        <div class="">--}}
            {{--                            --}}{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success" fill="none"--}}
            {{--                            --}}{{--                                 viewBox="0 0 24 24"--}}
            {{--                            --}}{{--                                 stroke="currentColor" stroke-width="2">--}}
            {{--                            --}}{{--                                <path stroke-linecap="round" stroke-linejoin="round"--}}
            {{--                            --}}{{--                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>--}}
            {{--                            --}}{{--                            </svg>--}}
            {{--                        </div>--}}
            {{--                        <div>--}}
            {{--                            <p class="text-slate-700 text-lg  dark:text-navy-100">--}}
            {{--                                {{ __('general.order.recipient_details') }}--}}
            {{--                            </p>--}}

            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <button--}}
            {{--                        @click="expanded = !expanded"--}}
            {{--                        class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">--}}
            {{--                        <i :class="expanded && '-rotate-180'"--}}
            {{--                           class="fas fa-chevron-down text-sm transition-transform"></i>--}}
            {{--                    </button>--}}
            {{--                </div>--}}
            {{--                <div x-collapse x-show="expanded">--}}
            {{--                    <div class="px-4 py-4 sm:px-5 bg-white">--}}
            {{--                        <div class="grid gap-x-6 gap-y-4 lg:grid-cols-2">--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->first_name }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.first_name') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->last_name }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.last_name') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->country->name }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.country') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->city }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.city') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->address }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.address') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->email }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.email') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->phone }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.phone') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->mobile }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.mobile') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}

            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            <div x-data="{expanded:true}"--}}
            {{--                 class="overflow-hidden mt-4 rounded-lg border border-slate-150 dark:border-navy-500">--}}
            {{--                <div--}}
            {{--                    class="flex items-center justify-between bg-slate-150 px-4 py-4 dark:bg-navy-500 sm:px-5">--}}
            {{--                    <div--}}
            {{--                        class="flex items-center space-x-1 tracking-wide outline-none transition-all">--}}
            {{--                        <div class="">--}}
            {{--                            --}}{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success" fill="none"--}}
            {{--                            --}}{{--                                 viewBox="0 0 24 24"--}}
            {{--                            --}}{{--                                 stroke="currentColor">--}}
            {{--                            --}}{{--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
            {{--                            --}}{{--                                      d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>--}}
            {{--                            --}}{{--                            </svg>--}}
            {{--                        </div>--}}
            {{--                        <div>--}}
            {{--                            <p class="text-slate-700 text-lg  dark:text-navy-100">--}}
            {{--                                {{ __('general.order.customer_details') }}--}}
            {{--                            </p>--}}

            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <button--}}
            {{--                        @click="expanded = !expanded"--}}
            {{--                        class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">--}}
            {{--                        <i :class="expanded && '-rotate-180'"--}}
            {{--                           class="fas fa-chevron-down text-sm transition-transform"></i>--}}
            {{--                    </button>--}}
            {{--                </div>--}}
            {{--                <div x-collapse x-show="expanded">--}}
            {{--                    <div class="px-4 py-4 sm:px-5 bg-white">--}}
            {{--                        <div class="grid gap-x-6 gap-y-4 lg:grid-cols-2">--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->customer->first_name }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.first_name') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->customer->last_name }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.last_name') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->customer->country->name }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.country') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->customer->city->name }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.city') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->customer->address }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.address') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->customer->email }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.email') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->customer->phone }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.phone') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->customer->mobile }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.mobile') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}

            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            <div x-data="{expanded:true}"--}}
            {{--                 class="overflow-hidden mt-4 rounded-lg border border-slate-150 dark:border-navy-500">--}}
            {{--                <div--}}
            {{--                    class="flex items-center justify-between bg-slate-150 px-4 py-4 dark:bg-navy-500 sm:px-5">--}}
            {{--                    <div--}}
            {{--                        class="flex items-center space-x-1 tracking-wide outline-none transition-all">--}}
            {{--                        --}}{{--                        <div class="">--}}
            {{--                        --}}{{--                            <i class="fa-solid fa-truck-fast text-success"></i>--}}
            {{--                        --}}{{--                        </div>--}}
            {{--                        <div>--}}
            {{--                            <p class="text-slate-700 text-lg  dark:text-navy-100">--}}
            {{--                                {{ __('general.order.courier_details') }}--}}
            {{--                            </p>--}}

            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <button--}}
            {{--                        @click="expanded = !expanded"--}}
            {{--                        class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">--}}
            {{--                        <i :class="expanded && '-rotate-180'"--}}
            {{--                           class="fas fa-chevron-down text-sm transition-transform"></i>--}}
            {{--                    </button>--}}
            {{--                </div>--}}
            {{--                <div x-collapse x-show="expanded">--}}
            {{--                    <div class="px-4 py-4 sm:px-5 bg-white">--}}
            {{--                        <div class="grid gap-x-6 gap-y-4 lg:grid-cols-2">--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->courier->first_name }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.first_name') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->courier->last_name }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.last_name') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->courier->car_number }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.car_number') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->courier->city->name }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.city') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->courier->address }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.address') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->courier->email }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.email') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->courier->phone }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.phone') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div>--}}
            {{--                                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{--                                    {{ $order->courier->mobile }}--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm font-medium line-clamp-1 text-success">--}}
            {{--                                    {{ __('general.user.mobile') }}--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}

            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            <div x-data="{expanded:true}"--}}
            {{--                 class="overflow-hidden mt-4 mb-8 rounded-lg border border-slate-150 dark:border-navy-500">--}}
            {{--                <div--}}
            {{--                    class="flex items-center justify-between bg-slate-150 px-4 py-4 dark:bg-navy-500 sm:px-5">--}}
            {{--                    <div--}}
            {{--                        class="flex items-center space-x-1 tracking-wide outline-none transition-all">--}}
            {{--                        --}}{{--                        <div class="">--}}
            {{--                        --}}{{--                            <i class="fa-solid fa-flag text-success"></i>--}}
            {{--                        --}}{{--                        </div>--}}
            {{--                        <div>--}}
            {{--                            <p class="text-slate-700 text-lg dark:text-navy-100">--}}
            {{--                                {{ __('general.user.remarks') }}--}}
            {{--                            </p>--}}

            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <button--}}
            {{--                        @click="expanded = !expanded"--}}
            {{--                        class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">--}}
            {{--                        <i :class="expanded && '-rotate-180'"--}}
            {{--                           class="fas fa-chevron-down text-sm transition-transform"></i>--}}
            {{--                    </button>--}}
            {{--                </div>--}}
            {{--                <div x-collapse x-show="expanded">--}}
            {{--                    <div class="px-4 py-4 sm:px-5 bg-white">--}}
            {{--                        <p class="font-medium text-slate-700  dark:text-navy-100">--}}
            {{--                            {{ $order->remarks }}--}}
            {{--                        </p>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

        </div>
        <div>
            <h3 class="text-normal font-medium text-slate-500 mt-4 mb-6 flex items-center space-x-1">
                {{--                <svg xmlns="http://www.w3.org/2000/svg"--}}
                {{--                     class="h-5 w-5 text-success transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"--}}
                {{--                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">--}}
                {{--                    <path stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                          d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>--}}
                {{--                </svg>--}}
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
                                <span class="text-xs text-slate-400 dark:text-navy-300">
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
