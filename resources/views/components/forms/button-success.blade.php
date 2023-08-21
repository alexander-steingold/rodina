<button
    @if($attributes->get('submit')) x-on:click.prevent="submitForm('{{ $attributes->get('submit') }}')" @endif
{{ $attributes->class(['btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90']) }}
type="submit">
    {{ $slot }}
</button>

<script>
    function submitForm(formId) {
        document.getElementById(formId).submit();
    }
</script>
