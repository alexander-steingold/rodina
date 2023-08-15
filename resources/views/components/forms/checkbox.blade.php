<label class="inline-flex items-center space-x-2" x-data="{ isChecked: {{ $value ? 'true' : 'false'}} }">
    <input
        value="{{ old($name, $value) }}"
        name="{{ $name }}"
        id="{{ $name }}"
        x-model="isChecked"
        x-bind:value="isChecked ? '1' : '0'"

        {{ $attributes->class(['form-checkbox is-basic h-4 w-4 rounded border-slate-400/70 checked:bg-success checked:!border-success hover:!border-success focus:!border-success dark:border-navy-400']) }}
        type="checkbox"
    />
    <p>
        {{ $slot }}
    </p>
</label>
