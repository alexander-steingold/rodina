<h3 class="text-lg text-slate-500 leading-normal">
    {{ __('form.search') }}
</h3>
<x-app-partials.divider class="border-b-slate-300"/>
<form method="GET" action="{{ route('order.index') }}">
    <!-- Search Term -->
    <div class="mt-3">
        <x-forms.input-label for="search" value="{{ __('form.search_term') }}"/>
        <x-forms.text-input name="search" value="{{ request('search') }}"/>
    </div>

    <!--Status -->
    <div class="mt-4">
        <x-forms.input-label for="status" value="{{ __('general.user.status') }}"/>
        <x-forms.select name="status">
            <option value=""></option>
            @foreach($statuses as $status)
                <option value="{{ $status }}" @selected(request('status') === $status)>
                    {{ __('general.order.statuses.'.$status)  }}
                </option>
            @endforeach
        </x-forms.select>
    </div>
    <div class="mt-4">
        <x-forms.input-label for="total_payment" value="{{ __('general.order.price') }}"/>
        <x-forms.select name="total_payment">
            <option value=""></option>
            @for($i = 100; $i <= 1000; $i+=100)
                <option
                    value="{{ $i }}" @selected(request('total_payment') == $i)>{{ __('general.more_than') }} {{ $i }}
                    NIS
                </option>
            @endfor
        </x-forms.select>
    </div>
    {{--    <div class="mt-4">--}}
    {{--        <x-forms.input-label for="courier_id" value="{{ __('general.order.courier') }}"/>--}}
    {{--        <x-forms.select name="courier_id">--}}
    {{--            <option value=""></option>--}}
    {{--            @foreach($couriers as $courier)--}}
    {{--                <option value="{{ $courier->id }}" @selected(request('courier_id') == $courier->id)>--}}
    {{--                    {{ $courier->first_name }} {{ $courier->last_name }}--}}
    {{--                </option>--}}
    {{--            @endforeach--}}
    {{--        </x-forms.select>--}}
    {{--    </div>--}}
    <div class="mt-4">
        <x-forms.input-label for="date_range" value="{{ __('general.date') }}"/>
        <x-forms.text-input
            x-init="$el._x_flatpickr = flatpickr($el,{
            mode: 'range',
            dateFormat: 'Y-m-d',
            altFormat: 'd/m/Y',
            altInput: true,
            locale: { rangeSeparator:  ' {{ __('general.to') }} ' }
            })"
            name="date_range" value="{{ request('date_range') }}"/>
    </div>
    <!--City -->
    {{--    <div class="mt-4">--}}
    {{--        <x-forms.input-label for="city_id" value="{{ __('general.user.city') }}"/>--}}
    {{--        <x-forms.select name="city_id">--}}
    {{--            <option value=""></option>--}}
    {{--            @foreach($cities as $city)--}}
    {{--                <option value="{{ $city->id }}" @selected(request('city_id') == $city->id)>--}}
    {{--                    {{ $city->name  }}--}}
    {{--                </option>--}}
    {{--            @endforeach--}}
    {{--        </x-forms.select>--}}
    {{--    </div>--}}


    <div>
        <x-forms.button-success class="w-full mt-4 ">
            {{ __('form.apply_filter') }}
        </x-forms.button-success>
    </div>

    <div class="flex justify-center items-center mt-2">
        <a href="{{ route('order.index') }}" class="text-indigo-500 hover:underline">
            {{ __('form.reset_filter') }}
        </a>
    </div>
</form>

