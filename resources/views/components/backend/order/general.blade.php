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
                    {{ $order->weight_kg }} kg
                    @if($order->weight_kg)
                        {{ $order->weight_gr }} gr
                    @endif
                </h3>
                <p class="text-sm font-medium line-clamp-1 text-success">
                    {{ __('general.order.weight') }}
                </p>
            </div>

            <div>
                <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                    @isset($order->container)
                        {{ $order->container->container->cid }}
                    @endisset
                </h3>
                <p class="text-sm font-medium line-clamp-1 text-success">
                    {{ __('general.container.container') }}
                </p>
            </div>


            {{--            <div class="col-span-2">--}}
            {{--                <x-forms.input-label for="payment" value="{{ __('general.order.boxes') }}"/>--}}
            {{--                <div class="grid grid-cols-5 gap-4">--}}
            {{--                    @foreach($order->barcodes as $barcode)--}}
            {{--                        <div class="rounded-lg border border-slate-300 shadow-m p-2 mt-2 ">--}}
            {{--                            <div class="flex flex-col justify-center items-center ">--}}
            {{--                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"--}}
            {{--                                     viewBox="0 0 24 24"--}}
            {{--                                     stroke-width="1.5" stroke="currentColor"--}}
            {{--                                     class="w-6 h-6 text-success">--}}
            {{--                                    <path stroke-linecap="round" stroke-linejoin="round"--}}
            {{--                                          d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>--}}
            {{--                                </svg>--}}
            {{--                                <x-forms.input-label for="barcode"--}}
            {{--                                                     value="{{ __('general.order.barcode') }}"/>--}}
            {{--                                {{  $barcode->barcode }}--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    @endforeach--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <x-app-partials.divider class="col-span-2"/>--}}


            <x-app-partials.divider class="col-span-2"/>
            <div class="lg:col-span-2">
                <h3 class="font-medium  text-slate-700  dark:text-navy-100">
                    <div class="flex-wrap  text-xs">
                        @foreach($order->items as $item)
                            <div class="mb-1">
                                {{ $item->item }}
                                ({{ $item->qty }})
                            </div>
                        @endforeach
                    </div>

                </h3>
                <p class="text-sm font-medium line-clamp-1 text-success">
                    {{ __('general.order.content') }}
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
