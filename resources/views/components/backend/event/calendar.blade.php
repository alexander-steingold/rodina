<x-backend.event.filter
    :couriers="$couriers"
    :routes="$routes"
/>

<div class="flex justify-between items-center">
    <div class="flex text-slate-700 space-x-2 mt-2">
        <div class="text-2xl font-medium ">
            {{ $year }}
        </div>
        <div class="text-2xl text-success">
            {{ __('general.month.'.\Carbon\Carbon::createFromDate($year, $month)->format('F'))  }}
        </div>
    </div>

    <div class="flex justify-between items-center mt-4 ">
        <div class="flex items-center space-x-2 uppercase font-medium text-success">

            <a href="{{ route('event.index', ['year' => $prevDate->year, 'month' => $prevDate->month]) }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="2"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.75 19.5L8.25 12l7.5-7.5"/>
                </svg>
                {{--                                {{ __('general.month.'.$prevMonthName) }}--}}
            </a>
        </div>
        <div class="flex items-center space-x-2 font-medium text-success uppercase">
            <a href="{{ route('event.index', ['year' => $nextDate->year, 'month' => $nextDate->month]) }}">
                {{--                                {{ __('general.month.'.$nextMonthName) }}--}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="2"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                </svg>
            </a>
        </div>
    </div>
</div>

<div class="grid grid-cols-7 gap-4 mt-6">
    @foreach ($days as $day)
        <div class=" card w-full h-full p-4
                         {{ $day['isSaturday'] ? 'text-red-500' : 'text-slate-700' }}
                         {{ $day['isCurrentDate'] ? 'text-success' : '' }}
                         ">
            <div class="flex justify-between items-start">
                <div class="font-medium text-2xl ">
                    {{ $day['date']->day }}
                </div>
                <div class="text-sm">
                    {{ __('general.weekday.'.$day['date']->englishDayOfWeek ) }}
                </div>
            </div>
            <div class="py-8">
                @foreach ($day['events'] as $event)
                    <x-backend.event.popup
                        :event="$event"
                    />
                @endforeach
            </div>
        </div>
    @endforeach
</div>

<x-backend.event.sidebar
    :events="$events"
/>
