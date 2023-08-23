<form action="{{ $route  }}" method="post" id="edit-contact-frm">
    @method($method)
    @csrf
    <input type="hidden" name="id" value="{{ isset($contact) ? $contact->id : null }}"/>
    <main class="grid w-ful gap-x-6 gap-y-2 grid-cols-2  place-items-center">
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="name" required="1"
                                 value="{{ __('general.user.first_name') }} {{ __('general.user.last_name') }}"/>
            <x-forms.text-input name="name" placeholder=""
                                value="{!! old('name', optional($contact)->name) !!}"/>
            <x-forms.input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="title" value="{{ __('general.user.title') }}"/>
            <x-forms.text-input name="title" value="{{ old('title', optional($contact)->title) }}"
            />
            <x-forms.input-error :messages="$errors->get('title')" class="mt-2"/>
        </div>


        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="email" value="{{ __('general.user.email') }}"/>
            <x-forms.text-input name="email" value="{{ old('email', optional($contact)->email) }}"/>
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>


        <div class="mb-1 w-full h-full">
            <x-forms.input-label for="mobile" required="1" value="{{ __('general.user.mobile') }}"/>
            <x-forms.text-input name="mobile" type="number" value="{{ old('mobile', optional($contact)->mobile) }}"/>
            <x-forms.input-error :messages="$errors->get('mobile')" class="mt-2"/>
        </div>
        <div class="lg:col-span-2 w-full h-full">
            <x-forms.input-label for="remarks" value="{{ __('general.user.remarks') }}"/>
            <x-forms.textarea rows="3" placeholder="" name="remarks">
                {{ old('remarks', optional($contact)->remarks)  }}
            </x-forms.textarea>
            <x-forms.input-error :messages="$errors->get('remarks')" class="mt-2"/>
        </div>
    </main>
    <x-forms.required-field/>
</form>
<div class="flex items-center space-x-2">
    <x-forms.button-success class="mt-2" submit="edit-contact-frm">
        {{ $button }}
    </x-forms.button-success>

    @isset( $contact)
        <form action="{{ route('contact.destroy', $contact) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </button>
        </form>
    @endisset
</div>



