<div x-data="usePopper({ placement: 'bottom-end', offset: 4 })"
     @click.outside="if(isShowPopper) isShowPopper = false" class="inline-flex ml-4">
    <button type="button" x-ref="popperRef" @click="isShowPopper = !isShowPopper"
            class="btn h-6 w-6 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
        </svg>
    </button>

    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'"
         style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-9.6px, 392.8px, 0px);"
         data-popper-placement="bottom-end">
        <div
            class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
            <ul>
                <li>
                    @isset($export)
                        <div class="p-2">
                            <button type="submit" x-bind:disabled="isExportDisabled"
                                    class="flex justify-start space-x-1 items-baseline">
                                @csrf
                                {{--                                <div>--}}
                                {{--                                    <i class="fa fa-file-excel text-success" aria-hidden="true"></i>--}}
                                {{--                                </div>--}}
                                <div class="uppercase font-medium text-xs text-slate-700">
                                    {{ __('general.export_to_excel') }}
                                </div>
                            </button>

                        </div>
                    @endisset
                </li>
            </ul>
        </div>
    </div>
</div>
