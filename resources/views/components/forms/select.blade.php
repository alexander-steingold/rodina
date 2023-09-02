@props(['name', 'disabled' => false])

<select
    name="{{ $name }}"
    id="{{ $name }}"
    {!! $attributes->merge(['class' => 'form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent']) !!}
    {{ $disabled ? 'disabled' : '' }}
>
    {{ $slot }}
</select>

