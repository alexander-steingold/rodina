@if(count($orders) > 0)
    <ol class="timeline line-space max-w-sm ml-1">
        @foreach($orders as $order)
            <li class="timeline-item">
                <div
                    class="timeline-item-point rounded-full border-2 border-success dark:border-navy-400"></div>
                <a href="{{ route('order.show', $order) }}" class="inline-flex w-full">
                    <div class="timeline-item-content flex-1 pl-4 sm:pl-8">
                        <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                            <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                                #{{ $order->oid }}
                            </p>
                            <span class="text-sm text-slate-400 dark:text-navy-300">
                                   {{ $order->created_at->format('d/m/Y') }}
                                </span>
                        </div>
                        <p class="py-1 mt-1 text-sm flex items-center space-x-1">
                            <i class="fa-regular text-xs font-medium fa-user text-success"></i>
                            <span>
                                {{ $order->first_name }}  {{ $order->last_name }}
                            </span>
                        </p>
                        <div class="text-sm flex items-center space-x-1 -ml-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-success" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <span>
                                {{ $order->boxes }}
                            </span>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ol>
@else
    {{ __('general.order.no_orders') }}
@endif
