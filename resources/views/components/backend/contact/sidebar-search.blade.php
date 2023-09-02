<h3 class="text-lg text-slate-500 leading-normal">
    {{ __('form.search') }}
</h3>
<x-app-partials.divider class="border-b-slate-300"/>
<form method="GET" action="{{ route('contact.index') }}">
    <!-- Search Term -->
    <div class="mt-3">
        <x-forms.input-label for="search" value="{{ __('form.search_term') }}"/>
        <x-forms.text-input name="search" value="{{ request('search') }}"/>
    </div>
    <div>
        <x-forms.button-success class="w-full mt-4 ">
            {{ __('form.apply_filter') }}
        </x-forms.button-success>
    </div>

    <div class="flex justify-center items-center mt-2">
        <a href="{{ route('contact.index') }}" class="text-indigo-500 hover:underline">
            {{ __('form.reset_filter') }}
        </a>
    </div>
</form>

