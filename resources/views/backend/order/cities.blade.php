@if($cities && count($cities))
    <x-forms.select name="cities" x-data="{ selectedCity: '{{ old('city', optional($order)->city) }}' }"
                    @change="selectedCity = $event.target.value">
        @foreach($cities as $city)
            <option value="{{ $city->name }}">{{ $city->name }}</option>
        @endforeach
    </x-forms.select>
@endif

