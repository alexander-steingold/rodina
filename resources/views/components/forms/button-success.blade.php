<button
    {{ $attributes->class(['btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90']) }}
    type="submit">
    {{ $slot }}
</button>
