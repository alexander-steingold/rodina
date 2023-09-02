<h3 class="text-lg text-slate-500 leading-normal">
    {{ __('form.search') }}
</h3>
<x-app-partials.divider class="border-b-slate-300"/>
<form method="GET" action="{{ route('container.index') }}">
    <!-- Search Term -->
    <div class="mt-3">
        <x-forms.input-label for="search" value="{{ __('form.search_term') }}"/>
        <x-forms.text-input name="search" value="{{ request('search') }}"/>
    </div>


    <div class="mt-3" x-data="{ selectedCountry: '{{ old('country_id') }}' }">
        <x-forms.input-label for="country_id" required="1"
                             value="{{ __('general.user.country') }}"/>
        <select name="country_id" class="mt-1.5 text-slate-20 w-full bg-white"
                x-data="{ selectedCountry: {{ request('country_id') }} }"
                x-bind:value="selectedCountry"
                x-init="
        $el._tom = new Tom($el, {
        create: true,
        sortField: { field: 'text', direction: 'asc' }
        });
        $watch('selectedCountry', value => $el._tom.setValue(value))"
        >
            <option value=""></option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}" @selected(request('country_id') == $country->id)>
                    {{ $country->name }}
                </option>
            @endforeach
        </select>
        <x-forms.input-error :messages=" $errors->get('country_id')" class="mt-2"/>
    </div>

    <div class="mt-3" x-data="{ selectedBarcode: '{{ old('barcode_id') }}' }">
        <x-forms.input-label for="barcode_id" required="1"
                             value="{{ __('general.order.barcode') }}"/>
        <select name="barcode_id" class="mt-1.5 text-slate-20 w-full bg-white"
                x-data="{ selectedBarcode: {{ request('barcode_id') }} }"
                x-bind:value="selectedBarcode"
                x-init="
        $el._tom = new Tom($el, {
        create: true,
        sortField: { field: 'text', direction: 'asc' }
        });
        $watch('selectedCountry', value => $el._tom.setValue(value))"
        >
            <option value=""></option>
            @foreach($barcodes as $barcode)
                <option value="{{ $barcode->id }}" @selected(request('barcode_id') == $barcode->id)>
                    {{$barcode->barcode }}
                </option>
            @endforeach
        </select>
        <x-forms.input-error :messages=" $errors->get('barcode_id')" class="mt-2"/>
    </div>

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
    <div>
        <x-forms.button-success class="w-full mt-4 ">
            {{ __('form.apply_filter') }}
        </x-forms.button-success>
    </div>

    <div class="flex justify-center items-center mt-2">
        <a href="{{ route('container.index') }}" class="text-indigo-500 hover:underline">
            {{ __('form.reset_filter') }}
        </a>
    </div>
</form>

