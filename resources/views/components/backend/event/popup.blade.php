<div
    x-data="usePopper({
       offset: 12,
       placement: 'right-start',
       modifiers: [
          {name: 'flip', options: {fallbackPlacements: ['bottom','top']}},
          {name: 'preventOverflow', options: {padding: 10}}
       ]
    })"
    @click.outside="if(isShowPopper) isShowPopper = false"
    class="flex"
>
    <button
        x-ref="popperRef"
        @click="isShowPopper = !isShowPopper"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success" fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor" stroke-width="2">
            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
        </svg>
    </button>
    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
        @php
            $e = $event->toArray();
        @endphp
        <div class="popper-box" style="width:250px">
            <x-backend.event.event_box
                :e="$e"
                :event="$event"
            />
        </div>
    </div>
</div>
