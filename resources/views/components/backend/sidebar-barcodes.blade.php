@if(count($barcodes) > 0)
    <ol class="timeline line-space max-w-sm ml-1">
        @foreach($barcodes as $barcode)
            <li class="timeline-item">
                <div
                    class="timeline-item-point rounded-full border-2 border-success dark:border-navy-400"></div>
                <div class="timeline-item-content flex-1 pl-4 sm:pl-8">
                    <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                        <div>
                            <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                                {{ $barcode->barcode->barcode }}
                            </p>
                            <div class="text-sm m-1 flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-success" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                <div>
                                    <a href="{{ route('order.show', $barcode->barcode->order->id) }}"
                                       target="_blank" class="hover:underline">
                                        {{ $barcode->barcode->order->oid }}
                                    </a>
                                </div>

                            </div>
                        </div>

                        <span class="text-sm text-slate-400 dark:text-navy-300">

                                </span>
                    </div>
                </div>
            </li>
        @endforeach
    </ol>
@else
    {{ __('general.container.no_barcodes') }}
@endif
