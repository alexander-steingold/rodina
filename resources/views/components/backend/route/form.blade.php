<form action="{{ $route  }}" method="post">
    @method($method)
    @csrf
    <input type="hidden" name="id" value="{{ isset($iroute) ? $iroute->id : null }}"/>
    <main class="grid w-ful gap-x-6 gap-y-2 grid-cols-2  place-items-center">
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="number" required="1"
                                 value="{{ __('general.number') }}"/>
            <x-forms.text-input type="number" name="number" placeholder=""
                                value="{!! old('number', optional($iroute)->number) !!}"/>
            <x-forms.input-error :messages="$errors->get('number')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="title" required="1"
                                 value="{{ __('general.title') }}"/>
            <x-forms.text-input name="title" placeholder=""
                                value="{!! old('title', optional($iroute)->title) !!}"/>
            <x-forms.input-error :messages="$errors->get('title')" class="mt-2"/>
        </div>


        <div class=" w-full h-full col-span-2">
            <x-forms.input-label for="description" value="{{ __('general.description') }}"/>
            <x-forms.textarea rows="3" placeholder="" name="description">
                {{ old('remarks', optional($iroute)->description)  }}
            </x-forms.textarea>
            <x-forms.input-error :messages="$errors->get('description')" class="mt-2"/>
        </div>

    </main>
    <x-forms.required-field/>
    <x-forms.button-success class="mt-2">
        {{ $button }}
    </x-forms.button-success>
</form>
