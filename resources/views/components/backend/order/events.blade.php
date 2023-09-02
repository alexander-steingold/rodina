<div>
    <div class="px-4 py-4 sm:px-5 bg-white">
        @if(count($associations))
            @foreach($associations as $association)
                <div class="grid grid-cols-3 gap-4 text-slate-700">
                    <div class="font-medium">
                        {{ date("d/m/Y", strtotime($association->event->date)) }}
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{__('general.date')}}
                        </p>
                    </div>
                    <div class="font-medium">
                        {{ $association->route->title }}
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{__('general.route.route')}}
                        </p>
                    </div>
                    <div class="font-medium">
                        {{ $association->courier->first_name }}
                        {{ $association->courier->last_name }}
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{__('general.courier.courier')}}
                        </p>
                    </div>
                </div>
                <x-app-partials.divider/>
            @endforeach
        @else
            {{ __('general.event.no_events') }}
        @endif
    </div>
</div>
