<form action="{{ $route  }}" method="post">
    @method($method)
    @csrf
    <input type="hidden" name="country_id" value="109"/>
    <input type="hidden" name="cid" value="{{ isset($courier) ? $courier->cid : (random_int(100000, 999999) ) }}"/>
    <input type="hidden" name="id" value="{{ isset($courier) ? $courier->id : null }}"/>
    <main class="grid w-ful gap-x-6 gap-y-2 grid-cols-2  place-items-center">
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="first_name" required="1"
                                 value="{{ __('general.user.first_name') }}"/>
            <x-forms.text-input name="first_name" placeholder=""
                                value="{!! old('first_name', optional($courier)->first_name) !!}"/>
            <x-forms.input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="last_name" value="{{ __('general.user.last_name') }}"/>
            <x-forms.text-input name="last_name" placeholder=""
                                value="{{ old('last_name', optional($courier)->last_name) }}"/>
            <x-forms.input-error :messages="$errors->get('last_name')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="pid" value="{{ __('general.user.id_number') }}"/>
            <x-forms.text-input name="pid" type="number"
                                value="{{ old('pid', optional($courier)->pid) }}"/>
            <x-forms.input-error :messages="$errors->get('pid')" class="mt-2"/>
        </div>
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="car_number" value="{{ __('general.user.car_number') }}"/>
            <x-forms.text-input name="car_number" value="{{ old('car_number', optional($courier)->car_number) }}"
                                type="number"/>
            <x-forms.input-error :messages="$errors->get('car_number')" class="mt-2"/>
        </div>
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="city_id" value="{{ __('general.user.city') }}"/>
            <x-forms.select name="city_id">
                <option value=""></option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" @selected(old(
                'city_id', optional($courier)->city_id) == $city->id)>
                        {{ $city->name }}
                    </option>
                @endforeach
            </x-forms.select>
            <x-forms.input-error :messages="$errors->get('city_id')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="address" value="{{ __('general.user.address') }}"/>
            <x-forms.text-input name="address" value="{{ old('address', optional($courier)->address) }}"/>
            <x-forms.input-error :messages="$errors->get('address')" class="mt-2"/>
        </div>


        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="email" value="{{ __('general.user.email') }}"/>
            <x-forms.text-input name="email" value="{{ old('email', optional($courier)->email) }}"/>
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="phone" value="{{ __('general.user.phone') }}"/>
            <x-forms.text-input name="phone" type="number" value="{{ old('phone', optional($courier)->phone) }}"/>
            <x-forms.input-error :messages="$errors->get('phone')" class="mt-2"/>
        </div>

        <div class="mb-1 w-full h-full">
            <x-forms.input-label for="mobile" required="1" value="{{ __('general.user.mobile') }}"/>
            <x-forms.text-input name="mobile" type="number" value="{{ old('mobile', optional($courier)->mobile) }}"/>
            <x-forms.input-error :messages="$errors->get('mobile')" class="mt-2"/>
        </div>
        <div class="lg:col-span-2 w-full h-full">
            <x-forms.input-label for="remarks" value="{{ __('general.user.remarks') }}"/>
            <x-forms.textarea rows="3" placeholder="" name="remarks">
                {{ old('remarks', optional($courier)->remarks)  }}
            </x-forms.textarea>
            <x-forms.input-error :messages="$errors->get('remarks')" class="mt-2"/>
        </div>

        <div class="lg:col-span-2  w-full h-full">
            @isset($courier)
                <label class="inline-flex items-center space-x-2">
                    <span class="text-sm font-medium text-slate-700">{{ __('general.user.status') }}</span>
                    <input
                        name="status"
                        class="form-switch h-5 w-10 rounded-full bg-slate-300 before:rounded-full before:bg-slate-50 checked:!bg-success checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:before:bg-white"
                        type="checkbox"
                        {{ optional($courier)->status->value == 'active' ? 'checked' : '' }}
                    />
                </label>
            @else
                <input type="hidden" name="status" value="active"/>
            @endisset
        </div>
    </main>
    <x-forms.required-field/>
    <x-forms.button-success class="mt-2">
        {{ $button }}
    </x-forms.button-success>
</form>
