<div>
    <div class="px-4 py-4 sm:px-5 bg-white">
        <div class="grid grid-cols-2 gap-x-6 gap-y-4">
            <div>
                <h3 class="font-medium  text-lg text-slate-700 line-clamp-1 dark:text-navy-100">
                    {{ $order->price  ? $order->price : '0' }} NIS
                </h3>
                <p class="text-sm font-medium line-clamp-1 text-success">
                    {{ __('general.order.price') }}
                </p>
            </div>
            <div>
                <h3 class="font-medium  text-lg text-slate-700 line-clamp-1 dark:text-navy-100">
                    {{ $order->box_price  ? $order->box_price : '0' }} NIS
                </h3>
                <p class="text-sm font-medium line-clamp-1 text-success">
                    {{ __('general.order.box') }}
                </p>
            </div>
            <x-app-partials.divider class="col-span-2"/>

            <div>
                <h3 class="font-medium  text-lg text-slate-700 line-clamp-1 dark:text-navy-100">
                    {{ $order->payment  ? $order->payment : '0' }} NIS
                </h3>
                <p class="text-sm font-medium line-clamp-1 text-success">
                    {{ __('general.order.payment') }}
                </p>
            </div>
            <div>
                <h3 class="font-medium line-through text-lg text-red-500 line-clamp-1 dark:text-navy-100">
                    {{ $order->discount  ? $order->discount : '0' }} NIS
                </h3>
                <p class="text-sm font-medium line-clamp-1 text-success">
                    {{ __('general.order.discount') }}
                </p>
            </div>
            <x-app-partials.divider class="col-span-2"/>
            <div>
                <h3 class="font-medium text-lg text-slate-700 line-clamp-1 dark:text-navy-100">
                    {{ $order->total_payment  ? $order->total_payment : '0' }} NIS
                </h3>
                <p class="text-sm font-medium line-clamp-1 text-success">
                    {{ __('general.order.total_payment') }}
                </p>
            </div>

        </div>
    </div>
</div>
