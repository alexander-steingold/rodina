<form action="{{ $route }}" method="post" id="edit-event-frm">
    @method($method)
    @csrf
    <main class="grid w-ful gap-y-2 gap-x-6 lg:grid-cols-2 place-items-center">
        <div class="mb-4 w-full h-full">
            <x-forms.input-label for="date" value="{{ __('general.date') }}"/>
            <x-forms.text-input
                x-init="$el._x_flatpickr = flatpickr($el,{
            dateFormat: 'Y-m-d',
            altFormat: 'd/m/Y',
            altInput: true,
            minDate: 'today',
             defaultDate: '{{ old('date', (isset($event->date) ? $event->date : 'today')) }}',

            allowInput: false,
            })"
                name="date" value="{{ request('date') }}"/>
            <x-forms.input-error :messages="$errors->get('date')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="route_id" value="{{ __('general.route.route') }}"/>
            <x-forms.select name="route_id">
                @foreach ($routes as $route)
                    <option value="{{ $route->id }}"@selected(old(
                             'route_id', optional($event)->route_id) == $route->id)>
                        {{ $route->title }}
                    </option>
                @endforeach
            </x-forms.select>
            <x-forms.input-error :messages="$errors->get('route_id')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="courier_id" value="{{ __('general.courier.courier') }}"/>
            <x-forms.select name="courier_id">
                @foreach ($couriers as $courier)
                    <option value="{{ $courier->id }}" @selected(old(
                'courier_id', optional($event)->courier_id) == $courier->id)>
                        {{ $courier->first_name }}  {{ $courier->last_name }}
                    </option>
                @endforeach
            </x-forms.select>

            <x-forms.input-error :messages="$errors->get('courier_id')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="order_ids" value="{{ __('general.order.orders') }}"/>
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
                        value="{{ $order->id }}">
                        {{ $order->oid }}
                    </option>
                @endforeach
            </select>
            <x-forms.input-error :messages="$errors->get('order_ids')" class="mt-2"/>
        </div>

        <div class="lg:col-span-2 w-full h-full">
            <x-forms.input-label for="remarks" value="{{ __('general.user.remarks') }}"/>
            <x-forms.textarea rows="3" placeholder="" name="remarks">
                {{ old('remarks', optional($event)->remarks)  }}
            </x-forms.textarea>
            <x-forms.input-error :messages="$errors->get('remarks')" class="mt-2"/>
        </div>
    </main>
    <x-forms.required-field/>
</form>
<div class="flex items-center space-x-2">
    <x-forms.button-success class="mt-2" submit="edit-event-frm">
        {{ $button }}
    </x-forms.button-success>

    @isset($event)
        <div class="mt-3">
            <form action="{{ route('event.destroy', $event) }}" method="POST">
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
        </div>
    @endisset


</div>

@if(isset($event->orderAssociations) && count($event->orderAssociations)>0)

    <div class="flex justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             class="w-20 h-20 text-slate-100">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"></path>
        </svg>
    </div>

    <table class="w-full text-left">
        <tbody>
        @foreach($event->orderAssociations as $association)

            <tr class="border border-transparent border-b-slate-200 dark:border-b-navy-500">
                <td class="whitespace-nowrap py-3 w-9/10">
                    <div class=" flex space-x-2 items-center">
                        <a href="{{ route('order.show', $association->order->id) }}"
                           class="text-success hover:underline" target="_blank">
                            #{{ $association->order->oid }}
                        </a>
                    </div>
                </td>
                <td class="whitespace-nowrap py-3 w-1/10 flex justify-end items-center">
                    <form action="{{ route('order.destroy', $association->id) }}" method="POST">
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
