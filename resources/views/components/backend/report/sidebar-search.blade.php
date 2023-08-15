<h3 class="text-lg text-slate-500 leading-normal">
    {{ __('form.search') }}
</h3>
<x-app-partials.divider class="border-b-slate-300"/>
<form method="GET" action="{{ route('report.index') }}">
    <div class="mt-4">
        <x-forms.input-label for="by_month" value="{{ __('general.months') }}"/>
        <select
            x-init="tomselect = $el._tom = new Tom($el)"
            class="mt-1.5 w-full bg-white"
            multiple
            placeholder=""
            autocomplete="off"
            name="months[]"
            onchange="
             if (this.value) {
                document.querySelector('#date_range')._flatpickr.clear();
              }
            ">
            <option value=""></option>
            @for($i = 1; $i <= 12; $i++)
                <option
                    value="{{ $i }}" {{ in_array($i, request('months', [])) ? 'selected' : '' }}>
                    {{ ($i < 10 ? '0' : '') . $i . '/' . date('Y') }}
                </option>
            @endfor
        </select>
    </div>
    <div class="mt-4">
        <x-forms.input-label for="date_range" value="{{ __('general.date') }}"/>
        <x-forms.text-input
            x-data="{ dateRangePicker: null }"
            x-init="$el._x_flatpickr = flatpickr($el,{
                                        mode: 'range',
                                        dateFormat: 'Y-m-d',
                                        altFormat: 'd/m/Y',
                                        altInput: true,
                                        locale: { rangeSeparator:  ' {{ __('general.to') }} ' },
                                        onClose: function(selectedDates) {
                                        if (selectedDates.length === 2) {
                                          tomselect.clear();
                                        }
                                      }
                                        })"
            name="date_range"
            value="{{ request('date_range') }}"

        />
    </div>
    <div class="mt-4">
        <x-forms.input-label for="courier_id" value="{{ __('general.order.courier') }}"/>
        <x-forms.select name="courier_id"
                        x-on:change="console.log('changed')"
        >
            <option value=""></option>
            @foreach($couriers as $courier)
                <option value="{{ $courier->id }}" @selected(request('courier_id') == $courier->id)>
                    {{ $courier->first_name }} {{ $courier->last_name }}
                </option>
            @endforeach
        </x-forms.select>
    </div>

    <div>
        <x-forms.button-success class="w-full mt-4 ">
            {{ __('form.apply_filter') }}
        </x-forms.button-success>
    </div>

    <div class="flex justify-center items-center mt-2">
        <a href="{{ route('report.index') }}" class="text-indigo-500 hover:underline">
            {{ __('form.reset_filter') }}
        </a>
    </div>

</form>

