<form action="{{ route('event.index') }}" method="get">
    <div class="grid grid-cols-4">
        <div class="col-span-3">
            sfs
        </div>
        <div class="flex items-center space-x-1">
            <x-forms.select name="year">
                <option value="">{{ __('general.the_year') }}</option>
                @for($i=2023; $i<2033; $i++)
                    <option value="{{ $i }}" @selected(request('year') == $i)>
                        {{ $i }}
                    </option>
                @endfor
            </x-forms.select>
            <x-forms.select name="month">
                <option value="">{{ __('general.the_month') }}</option>
                @for($i=1; $i<=12; $i++)
                    <option value="{{ $i }}" @selected(request('month') == $i)>
                        {{ $i }}
                    </option>
                @endfor
            </x-forms.select>
            <button
                class="btn h-9 w-9 bg-success mt-2 px-2 font-medium text-white hover:bg-success-focus hover:shadow-lg hover:shadow-success/50 focus:bg-success-focus focus:shadow-lg focus:shadow-success/50 active:bg-success-focus/90"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                </svg>
            </button>
            <a href="{{ route('event.index') }}" class="mt-2 px-2  btn h-9 w-9 bg-slate-150 p-0 font-medium text-slate-800
               hover:bg-slate-200 hover:shadow-lg hover:shadow-slate-200/50 focus:bg-slate-200 focus:shadow-lg
            focus:shadow-slate-200/50 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450
            dark:hover:shadow-navy-450/50 dark:focus:bg-navy-450 dark:focus:shadow-navy-450/50
            dark:active:bg-navy-450/90">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-6 6m0 0l-6-6m6 6V9a6 6 0 0112 0v3"/>
                </svg>

            </a>
        </div>
    </div>

</form>

<div class="flex justify-between items-center">
    <div class="flex text-slate-700 space-x-2 mt-4">
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
