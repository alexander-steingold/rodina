<div x-effect="if($store.global.isSearchbarActive) isShowPopper = false"
     x-data="usePopper({ placement: 'bottom-end', offset: 12 })" @click.outside="if(isShowPopper) isShowPopper = false"
     class="flex">
    <button @click="isShowPopper = !isShowPopper" x-ref="popperRef"
            class="btn relative h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500 dark:text-navy-100" stroke="currentColor"
             fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M15.375 17.556h-6.75m6.75 0H21l-1.58-1.562a2.254 2.254 0 01-.67-1.596v-3.51a6.612 6.612 0 00-1.238-3.85 6.744 6.744 0 00-3.262-2.437v-.379c0-.59-.237-1.154-.659-1.571A2.265 2.265 0 0012 2c-.597 0-1.169.234-1.591.65a2.208 2.208 0 00-.659 1.572v.38c-2.621.915-4.5 3.385-4.5 6.287v3.51c0 .598-.24 1.172-.67 1.595L3 17.556h12.375zm0 0v1.11c0 .885-.356 1.733-.989 2.358A3.397 3.397 0 0112 22a3.397 3.397 0 01-2.386-.976 3.313 3.313 0 01-.989-2.357v-1.111h6.75z"></path>
        </svg>

        @if($quoteCount)
            <span class="absolute -top-px -right-px flex h-3 w-3 items-center justify-center">
            <span
                class="absolute inline-flex h-full w-full animate-ping rounded-full bg-secondary opacity-80"></span>
            <span class="inline-flex h-2 w-2 rounded-full bg-secondary"></span>
        </span>
        @endif
    </button>
    <div :class="isShowPopper &amp;&amp; 'show'" class="popper-root" x-ref="popperRoot"
         style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-97.6px, 58.4px, 0px);"
         data-popper-placement="bottom-end">
        <div x-data="{ activeTab: 'tabAll' }"
             class="popper-box mx-4 mt-1 flex max-h-[calc(100vh-6rem)] w-[calc(100vw-2rem)] flex-col rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-800 dark:bg-navy-700 dark:shadow-soft-dark sm:m-0 sm:w-80">
            <div class="rounded-t-lg bg-slate-100 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                <div class="flex items-center justify-between px-4 pt-2 pb-2
                ">
                    <div class="flex items-center space-x-2">
                        <h3 class="font-medium text-slate-700 dark:text-navy-100">
                            {{ __('general.quote.new_quotes') }}
                        </h3>
                        <div
                            class="badge h-5 rounded-full bg-primary/10 px-1.5 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                            {{ $quoteCount }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4">
                @foreach($latestQuotes as $quote)
                    <div class="grid grid-cols-3 gap-2 text-sm text-slate-500">
                        <div class="mb-2">
                            {{ $quote->name }}
                        </div>
                        <div class="mb-2">
                            {{ $quote->phone }}
                        </div>
                        <div class="mb-2">
                            {{  date('d/m/Y', strtotime($quote->created_at ))}}
                        </div>
                    </div>
                @endforeach
                <x-app-partials.divider/>
                <a href="{{route('quote.index')}}" class="text-success">{{ __('general.quote.all_quotes') }}</a>
            </div>
        </div>
    </div>
</div>
