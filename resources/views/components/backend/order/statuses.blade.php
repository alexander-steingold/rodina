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
