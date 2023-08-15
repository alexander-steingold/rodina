<form action="{{ $route  }}" method="post">
    @method($method)
    @csrf
    <input type="hidden" name="country_id" value="109"/>
    <input type="hidden" name="cid" value="{{ isset($customer) ? $customer->cid : (random_int(100000, 999999) ) }}"/>
    <input type="hidden" name="id" value="{{ isset($customer) ? $customer->id : null }}"/>


    <main class="grid w-ful gap-y-2 gap-x-6 lg:grid-cols-2 place-items-center">
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="first_name" required="1"
                                 value="{{ __('general.user.first_name') }}"/>
            <x-forms.text-input name="first_name" placeholder=""
                                value="{!! old('first_name', optional($customer)->first_name) !!}"/>
            <x-forms.input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="last_name" value="{{ __('general.user.last_name') }}"/>
            <x-forms.text-input name="last_name" placeholder=""
                                value="{{ old('last_name', optional($customer)->last_name) }}"/>
            <x-forms.input-error :messages="$errors->get('last_name')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="pid" value="{{ __('general.user.id_number') }}"/>
            <x-forms.text-input name="pid" type="number"
                                value="{{ old('pid', optional($customer)->pid) }}"/>
            <x-forms.input-error :messages="$errors->get('pid')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="city_id" value="{{ __('general.user.city') }}"/>
            <x-forms.select name="city_id">
                <option value=""></option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" @selected(old(
                'city_id', optional($customer)->city_id) == $city->id)>
                        {{ $city->name }}
                    </option>
                @endforeach
            </x-forms.select>
            <x-forms.input-error :messages="$errors->get('city_id')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="address" value="{{ __('general.user.address') }}"/>
            <x-forms.text-input name="address" value="{{ old('address', optional($customer)->address) }}"/>
            <x-forms.input-error :messages="$errors->get('address')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="zip" value="{{ __('general.user.zip') }}"/>
            <x-forms.text-input name="zip" value="{{ old('zip', optional($customer)->zip) }}" type="number"/>
            <x-forms.input-error :messages="$errors->get('zip')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="email" required="1" value="{{ __('general.user.email') }}"/>
            <x-forms.text-input name="email" value="{{ old('email', optional($customer)->email) }}"/>
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="phone" value="{{ __('general.user.phone') }}"/>
            <x-forms.text-input name="phone" type="number" value="{{ old('phone', optional($customer)->phone) }}"/>
            <x-forms.input-error :messages="$errors->get('phone')" class="mt-2"/>
        </div>

        <div class="mb-1 w-full h-full">
            <x-forms.input-label for="mobile" required="1" value="{{ __('general.user.mobile') }}"/>
            <x-forms.text-input name="mobile" type="number" value="{{ old('mobile', optional($customer)->mobile) }}"/>
            <x-forms.input-error :messages="$errors->get('mobile')" class="mt-2"/>
        </div>
        <div class="lg:col-span-2  w-full h-full">
            <x-forms.input-label for="remarks" value="{{ __('general.user.remarks') }}"/>
            <x-forms.textarea rows="3" placeholder="" name="remarks">
                {{ old('remarks', optional($customer)->remarks)  }}
            </x-forms.textarea>
            <x-forms.input-error :messages="$errors->get('remarks')" class="mt-2"/>
        </div>
        <div class="lg:col-span-2 w-full h-full">
            @isset($customer)
                <label class="inline-flex items-center space-x-2">
                    <span class="text-sm font-medium text-slate-700">{{ __('general.user.status') }}</span>
                    <input
                        name="status"
                        class="form-switch h-5 w-10 rounded-full bg-slate-300 before:rounded-full before:bg-slate-50 checked:!bg-success checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:before:bg-white"
                        type="checkbox"
                        {{ optional($customer)->status->value == 'active' ? 'checked' : '' }}
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
