<a href="{{ $href }}"
    {{ $attributes->merge(['class' => "btn bg-$type font-normal text-white hover:bg-$type-focus
    focus:bg-$type-focus active:bg-$type-focus/90"])}}
>
    {{ $slot }}
</a>
