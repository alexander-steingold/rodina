<form action="{{ $route }}" method="post">
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
            defaultDate: 'today',
            allowInput: false,
            })"
                name="date" value="{{ request('date') }}"/>
            <x-forms.input-error :messages="$errors->get('date')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="route_id" value="{{ __('general.route.route') }}"/>
            <x-forms.select name="route_id">
                @foreach ($routes as $route)
                    <option value="{{ $route->id }}" @selected(old(
                        'weight', optional($route)->id) == $route->id)>
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
                        'weight', optional($courier)->id) == $courier->id)>
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
                        value="{{ $order->id }}" {{ in_array($order->id, request('order_ids', [])) ? 'selected' : '' }}>
                        {{ $order->oid }}
                    </option>
                @endforeach
            </select>
            <x-forms.input-error :messages="$errors->get('order_ids')" class="mt-2"/>
        </div>
    </main>
    <x-forms.required-field/>
    <x-forms.button-success class="mt-2">
        {{ $button }}
    </x-forms.button-success>
</form>
