<div class="grid grid-cols-3 mt-2 gap-4">
    @foreach($data['currentWeekEvents'] as $event)
        @php
            $e = $event->toArray()
        @endphp
        <x-backend.event.event_box
            :e="$e"
            :event="$event"
            class="rounded-0 border-0"
        />
    @endforeach

</div>
