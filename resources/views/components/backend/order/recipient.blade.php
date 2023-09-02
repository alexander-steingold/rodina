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
