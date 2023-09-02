<textarea
    rows="{{ $rows }}"
    placeholder="{{  $placeholder }}"
    {{ $attributes->merge(['class' => 'mt-1.5 form-textarea w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent'])}}>{{ $value ?? $slot }}</textarea>
