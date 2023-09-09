<form action="{{ $route  }}" method="post" id="form">
    @method($method)
    @csrf
    <input type="hidden" name="id" value="{{ isset($container) ? $container->id : null }}"/>
    <main class="grid w-ful gap-x-6 gap-y-2 grid-cols-2  place-items-center">
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="cid" required="1"
                                 value="{{ __('general.container.number') }}"/>
            <x-forms.text-input name="cid" placeholder=""
                                value="{!! old('cid', optional($container)->cid) !!}"/>
            <x-forms.input-error :messages="$errors->get('cid')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="company" value="{{ __('general.container.company') }}"/>
            <x-forms.text-input name="company" value="{{ old('title', optional($container)->company) }}"
            />
            <x-forms.input-error :messages="$errors->get('company')" class="mt-2"/>
        </div>

        <div class="mb-2  w-full h-full" x-data="{ selectedCountry: '{{ old('country_id') }}' }">
            <x-forms.input-label for="country_id" required="1"
                                 value="{{ __('general.user.country') }}"/>
            <select name="country_id" class="mt-1.5 text-slate-20 w-full"
                    x-data="{ selectedCountry: 147 }"
                    x-bind:value="selectedCountry"
                    x-init="
        $el._tom = new Tom($el, {
        create: true,
        sortField: { field: 'text', direction: 'asc' }
        });
        $watch('selectedCountry', value => $el._tom.setValue(value))"
            >
                <option value=""></option>
                @foreach($countries as $country)
                    <option
                        value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            <x-forms.input-error :messages=" $errors->get('country_id')" class="mt-2"/>
        </div>


        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="order_date" value="{{ __('general.container.order_date') }}"/>
            <x-forms.text-input
                x-init="$el._x_flatpickr = flatpickr($el,{
            dateFormat: 'Y-m-d',
            altFormat: 'd/m/Y',
            altInput: true,
            minDate: 'today',
             defaultDate: '{{ old('order_date',  optional($container)->order_date) }}',
            allowInput: false,
            })"
                name="order_date" value="{{ request('order_date') }}"/>
            <x-forms.input-error :messages="$errors->get('order_date')" class="mt-2"/>
        </div>


        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="departure_date" value="{{ __('general.container.departure_date') }}"/>
            <x-forms.text-input
                x-init="$el._x_flatpickr = flatpickr($el,{
            dateFormat: 'Y-m-d',
            altFormat: 'd/m/Y',
            altInput: true,
            minDate: 'today',
             defaultDate: '{{ old('departure_date',  optional($container)->departure_date) }}',
            allowInput: false,
            })"
                name="departure_date" value="{{ request('departure_date') }}"/>
            <x-forms.input-error :messages="$errors->get('departure_date')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="arrival_date" value="{{ __('general.container.arrival_date') }}"/>
            <x-forms.text-input
                x-init="$el._x_flatpickr = flatpickr($el,{
            dateFormat: 'Y-m-d',
            altFormat: 'd/m/Y',
            altInput: true,
            minDate: 'today',
             defaultDate: '{{ old('arrival_date',  optional($container)->arrival_date) }}',
            allowInput: false,
            })"
                name="arrival_date" value="{{ request('arrival_date') }}"/>
            <x-forms.input-error :messages="$errors->get('arrival_date')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="weight" value="{{ __('general.order.weight') }} (kg)"/>
            <x-forms.text-input name="weight" type="number" value="{{ old('title', optional($container)->weight) }}"
            />
            <x-forms.input-error :messages="$errors->get('company')" class="mt-2"/>
        </div>
        <div class=" mb-2 w-full h-full">
            <x-forms.input-label for="orders_ids" value="{{ __('general.container.barcodes') }}"/>
            <select
                x-init="tomselect = $el._tom = new Tom($el)"
                class="mt-1.5 w-full bg-white"
                multiple
                placeholder=""
                autocomplete="off"
                name="order_ids[]"
            >
                <option value=""></option>
                @foreach ($orders as $order)
                    <option
                        value="{{ $order->id }}"
                        {{ in_array($order->id, old('order_ids', [])) ? 'selected' : '' }}
                    >
                        {{ $order->barcode }}
                    </option>
                @endforeach
            </select>
            <x-forms.input-error :messages="$errors->get('order_ids')" class="mt-2"/>
        </div>

        <div class="lg:col-span-2 w-full h-full">
            <x-forms.input-label for="remarks" value="{{ __('general.user.remarks') }}"/>
            <x-forms.textarea rows="3" placeholder="" name="remarks">
                {{ old('remarks', optional($container)->remarks)  }}
            </x-forms.textarea>
            <x-forms.input-error :messages="$errors->get('remarks')" class="mt-2"/>
        </div>
    </main>
    <x-forms.required-field/>
</form>
<div class="flex items-center space-x-2">
    <x-forms.button-success class="" submit="form">
        {{ $button }}
    </x-forms.button-success>

    @if(isset($container->barcodes) && count($container->barcodes) == 0)
        <form action="{{ route('container.destroy', $container) }}" method="POST">
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
    @endif
</div>

@if(isset($container->orders) && count($container->orders)>0)

    <div class="flex justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             class="w-20 h-20 text-slate-100">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"></path>
        </svg>
    </div>

    <table class="w-full text-left">
        <tbody>
        @foreach($container->orders as $order)
            <tr class="border border-transparent border-b-slate-200 dark:border-b-navy-500">
                <td class="whitespace-nowrap py-3 w-9/10">
                    <div class=" flex space-x-2 items-center">
                        #{{ $order->order->barcode }}
                    </div>
                </td>
                <td class="whitespace-nowrap py-3 w-1/10 flex justify-end items-center">
                    <form action="{{ route('container.order.destroy', $order->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-red-500" fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif



