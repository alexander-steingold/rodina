<form action="{{ $route  }}" method="post">
    @method($method)
    @csrf
    <input type="hidden" name="id" value="{{ isset($user) ? $user->id : null }}"/>
    <main class="grid w-ful gap-y-2 gap-x-6 lg:grid-cols-2 place-items-center">
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="email" required="1" value="{{ __('general.user.email') }}"/>
            <x-forms.text-input name="email" value="{{ old('email', optional($user)->email) }}"/>
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        @if ($method === 'POST')
            <!-- Check if creating new user -->
            <div class="mb-2 w-full h-full">
                <x-forms.input-label for="password" required="1" value="{{ __('general.user.password') }}"/>
                <x-forms.text-input name="password" value="{{ old('password') }}"/>
                <x-forms.input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>
        @endif


        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="name" required="1"
                                 value="{{ __('general.user.first_name') }}"/>
            <x-forms.text-input name="name" placeholder=""
                                value="{!! old('name', optional($user)->name) !!}"/>
            <x-forms.input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>

        <div class="mb-1 w-full h-full">
            <x-forms.input-label for="mobile" required="1" value="{{ __('general.user.mobile') }}"/>
            <x-forms.text-input name="mobile" type="number" value="{{ old('mobile', optional($user)->mobile) }}"/>
            <x-forms.input-error :messages="$errors->get('mobile')" class="mt-2"/>
        </div>
        <div class="lg:col-span-2  w-full h-full">
            <x-forms.input-label for="remarks" value="{{ __('general.user.remarks') }}"/>
            <x-forms.textarea rows="3" placeholder="" name="remarks">
                {{ old('remarks', optional($user)->remarks)  }}
            </x-forms.textarea>
            <x-forms.input-error :messages="$errors->get('remarks')" class="mt-2"/>
        </div>
        <div class="lg:col-span-2 w-full h-full">
            @isset($user)
                <label class="inline-flex items-center space-x-2">
                    <span class="text-sm font-medium text-slate-700">{{ __('general.user.status') }}</span>
                    <input
                        name="status"
                        class="form-switch h-5 w-10 rounded-full bg-slate-300 before:rounded-full before:bg-slate-50 checked:!bg-success checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:before:bg-white"
                        type="checkbox"
                        {{ optional($user)->status == 'active' ? 'checked' : '' }}
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
