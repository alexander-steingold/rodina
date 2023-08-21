<form action="{{ $route  }}" method="POST" enctype="multipart/form-data">
    @method($method)
    @csrf
    <input type="hidden" name="country_id" value="109"/>
    <input type="hidden" name="oid" value="{{ isset($order) ? $order->oid : (random_int(100000, 999999) ) }}"/>
    <input type="hidden" name="box_price" value="{{ isset($order) ? $order->box_price : config('app.box_price')  }}">
    <h3 class="text-success text-lg font-normal mb-4">
        {{ __('general.order.general_details') }}
        {{--        <x-app-partials.divider/>--}}
    </h3>
    <main class="grid w-ful gap-x-6 gap-y-2 lg:grid-cols-2 place-items-center mb-2">
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="customer_id" required="1" value="{{ __('general.order.customer') }}"/>
            @isset($order)
                <x-forms.text-input type="hidden" name="customer_id" value="{{ $order->customer_id }}"/>
                <div class="mt-2">
                    {{ $order->customer->first_name }}  {{ $order->customer->last_name }}
                </div>

            @else
                <x-forms.select name="customer_id">
                    <option value=""></option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}"
                            @selected(old(
                            'customer_id', optional($order)->customer_id) == $customer->id)>
                            {{ $customer->first_name }} {{ $customer->last_name }}
                        </option>
                    @endforeach
                </x-forms.select>
            @endisset
            <x-forms.input-error :messages="$errors->get('customer_id')" class="mt-2"/>
        </div>
        {{--        <div class="mb-2 w-full h-full">--}}
        {{--            <x-forms.input-label for="courier_id" value="{{ __('general.order.courier') }}"/>--}}
        {{--            <x-forms.select name="courier_id">--}}
        {{--                <option value=""></option>--}}
        {{--                @foreach($couriers as $courier)--}}
        {{--                    <option value="{{ $courier->id }}" @selected(old(--}}
        {{--                        'courier_id', optional($order)->courier_id) == $courier->id)>--}}
        {{--                        {{ $courier->first_name }} {{ $courier->last_name }}--}}
        {{--                    </option>--}}
        {{--                @endforeach--}}
        {{--            </x-forms.select>--}}
        {{--            <x-forms.input-error :messages="$errors->get('courier_id')" class="mt-2"/>--}}
        {{--        </div>--}}
        @isset($order)
            <div class="mb-2 w-full h-full">
                <x-forms.input-label for="status" required="1"
                                     value="{{ __('general.user.status') }}"/>
                <x-forms.select name="status">
                    <option value=""></option>
                    @foreach($statuses as $status)

                        <option value="{{ $status }}" @selected(old(
        'status', optional($order)->currentStatus ? optional($order)->currentStatus->status : null) == $status)>
                            {{ __('general.order.statuses.'.$status)  }}
                        </option>
                    @endforeach
                </x-forms.select>
                <x-forms.input-error :messages="$errors->get('status')" class="mt-2"/>
            </div>

        @else
            <input type="hidden" name="status" value="call">
        @endisset
        {{--        <div class="mb-2 w-full h-full">--}}
        {{--            <x-forms.input-label for="barcode" value="{{ __('general.order.barcode') }}"/>--}}
        {{--            <x-forms.text-input name="barcode"--}}
        {{--                                value="{{ old('barcode', optional($order)->barcode) }}"/>--}}
        {{--            <x-forms.input-error :messages="$errors->get('barcode')" class="mt-2"/>--}}
        {{--        </div>--}}
        <div class="mb-2 w-full h-full {{ isset($order) ? ' col-span-2' : '' }}">
            <x-forms.input-label for="weight" value="{{ __('general.order.weight') }}"/>
            <x-forms.select name="weight">
                <option value=""></option>
                @for($i=1; $i<100; $i++)
                    <option value="{{ $i }}" @selected(old(
                        'weight', optional($order)->weight) == $i)>
                        {{ $i }} kg
                    </option>
                @endfor
            </x-forms.select>
            <x-forms.input-error :messages="$errors->get('weight')" class="mt-2"/>
        </div>
        {{--        <div class="mb-2 w-full h-full">--}}
        {{--            <x-forms.input-label for="boxes" value="{{ __('general.order.boxes') }}"/>--}}
        {{--            <x-forms.select name="boxes">--}}
        {{--                <option value=""></option>--}}
        {{--                @for($i=1; $i<10; $i++)--}}
        {{--                    <option value="{{ $i }}" @selected(old(--}}
        {{--                        'boxes', optional($order)->boxes) == $i)>--}}
        {{--                        {{ $i }}--}}
        {{--                    </option>--}}
        {{--                @endfor--}}
        {{--             --}}
        {{--            </x-forms.select>--}}
        {{--            <x-forms.input-error :messages="$errors->get('prepayment')" class="mt-2"/>--}}
        {{--        </div>--}}
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="payment" value="{{ __('general.order.payment') }}"/>
            <x-forms.text-input name="payment" type="number" value="{{ old('payment', optional($order)->payment) }}"/>
            <x-forms.input-error :messages="$errors->get('payment')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="payment" value="{{ __('general.order.discount') }}"/>
            <x-forms.text-input name="discount" type="number"
                                value="{{ old('discount', optional($order)->discount) }}"/>
            <x-forms.input-error :messages="$errors->get('discount')" class="mt-2"/>
        </div>
        <div class="lg:col-span-2  w-full h-full">
            <x-forms.input-label for="payment" value="{{ __('general.order.boxes') }}"/>
            <div class="grid grid-cols-4 gap-4">
                @isset($order)
                    @foreach($order->barcodes as $barcode)
                        <div class="rounded-lg border border-slate-300 shadow-m p-2 mt-2 ">
                            <div class="flex flex-col justify-center items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-success">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                                </svg>
                                <x-forms.input-label for="barcode" value="{{ __('general.order.barcode') }}"/>
                                <x-forms.text-input name="barcode[]" type="number" class="mt-1"
                                                    value="{{ $barcode->barcode }}"/>
                            </div>
                        </div>
                    @endforeach
                @endisset
                @php
                    $start = isset($order) ? count($order->barcodes) : 0;
                @endphp
                @for($i = $start; $i < 12; $i++)
                    <div class="rounded-lg border border-slate-300 shadow-m p-2 mt-2 ">
                        <div class="flex flex-col justify-center items-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-success">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                            </svg>
                            <x-forms.input-label for="barcode" value="{{ __('general.order.barcode') }}"/>
                            <x-forms.text-input name="barcode[]" type="number" class="mt-1"
                                                value="{{ old('barcode.' . $i) }}"/>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <div class="lg:col-span-2 mt-2 w-full h-full">
            <x-forms.input-label for="remarks" value="{{ __('general.user.remarks') }}"/>
            <x-forms.textarea rows="3" placeholder="" name="remarks">
                {{ old('remarks', optional($order)->remarks)  }}
            </x-forms.textarea>
            <x-forms.input-error :messages="$errors->get('remarks')" class="mt-2"/>
        </div>
    </main>

    <h3 class="text-success text-lg mb-4 mt-2 font-normal">
        {{ __('general.order.recipient_details') }}
        {{--        <x-app-partials.divider/>--}}
    </h3>
    <main class="grid w-ful mt-3 gap-x-6 gap-y-2 lg:grid-cols-2 place-items-center mb-2">
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="first_name" required="1"
                                 value="{{ __('general.user.first_name') }}"/>
            <x-forms.text-input name="first_name" placeholder=""
                                value="{!! old('first_name', optional($order)->first_name) !!}"/>
            <x-forms.input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="last_name" required="1"
                                 value="{{ __('general.user.last_name') }}"/>
            <x-forms.text-input name="last_name" placeholder=""
                                value="{{ old('last_name', optional($order)->last_name) }}"/>
            <x-forms.input-error :messages="$errors->get('last_name')" class="mt-2"/>
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
            <x-forms.input-label for="city" required="1"
                                 value="{{ __('general.user.city') }}"/>
            <x-forms.text-input name="city" placeholder=""
                                value="{{ old('city', optional($order)->city) }}"/>
            <x-forms.input-error :messages="$errors->get('city')" class="mt-2"/>
        </div>


        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="address" required="1"
                                 value="{{ __('general.user.address') }}"/>
            <x-forms.text-input name="address" value="{{ old('address', optional($order)->address) }}"/>
            <x-forms.input-error :messages="$errors->get('address')" class="mt-2"/>
        </div>
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="email" value="{{ __('general.user.email') }}"/>
            <x-forms.text-input name="email" value="{{ old('email', optional($order)->email) }}"/>
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="phone" value="{{ __('general.user.phone') }}"/>
            <x-forms.text-input name="phone" type="number" value="{{ old('phone', optional($order)->phone) }}"/>
            <x-forms.input-error :messages="$errors->get('phone')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="mobile" required="1"
                                 value="{{ __('general.user.mobile') }}"/>
            <x-forms.text-input name="mobile" type="number" value="{{ old('mobile', optional($order)->mobile) }}"/>
            <x-forms.input-error :messages="$errors->get('mobile')" class="mt-2"/>
        </div>

    </main>


    @isset($order)
        <h3 class="text-success text-lg  mb-2 font-normal">
            {{ __('general.order.documents') }}
            {{--        <x-app-partials.divider/>--}}
        </h3>
        <main class="grid w-ful  gap-6 lg:grid-cols-2 place-items-center mb-2">
            <div class="lg:col-span-2  w-full h-full">
                <x-forms.input-label for="files" value="{{ __('general.order.upload') }}"/>

                <div class="filepond fp-grid fp-bordered [--fp-grid:4] mt-2">
                    <input type="file"
                           name="file"
                           class="filepond"
                           x-init="$el._x_filepond = FilePond.create($el);
                                                 FilePond.setOptions({
                                                    server: {
                                                        process: '/admin/tmp-upload',
                                                        revert: '/admin/tmp-delete',
                                                        headers: {
                                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                        }
                                                    },
                                                    labelIdle: '',
                                                    locale: ['ru'],
                                                    acceptedFileTypes: ['application/pdf'],
                    labelIdle: '<span class=&quot;filepond--label-action&quot; tabindex=&quot;0&quot;>выберите pdf файл/ы</span>',
                    labelInvalidField: 'Поле содержит недопустимые файлы',
                    labelFileWaitingForSize: 'Укажите размер',
                    labelFileSizeNotAvailable: 'Размер не поддерживается',
                    labelFileLoading: 'Ожидание',
                    labelFileLoadError: 'Ошибка при ожидании',
                    labelFileProcessing: 'Загрузка',
                    labelFileProcessingComplete: 'Загрузка завершена',
                    labelFileProcessingAborted: 'Загрузка отменена',
                    labelFileProcessingError: 'Ошибка при загрузке',
                    labelFileProcessingRevertError: 'Ошибка при возврате',
                    labelFileRemoveError: 'Ошибка при удалении',
                    labelTapToCancel: 'нажмите для отмены',
                    labelTapToRetry: 'нажмите, чтобы повторить попытку',
                    labelTapToUndo: 'нажмите для отмены последнего действия',
                    labelButtonRemoveItem: 'Удалить',
                    labelButtonAbortItemLoad: 'Прекращено',
                    labelButtonRetryItemLoad: 'Повторите попытку',
                    labelButtonAbortItemProcessing: 'Отмена',
                    labelButtonUndoItemProcessing: 'Отмена последнего действия',
                    labelButtonRetryItemProcessing: 'Повторите попытку',
                    labelButtonProcessItem: 'Загрузка',
                    labelMaxFileSizeExceeded: 'Файл слишком большой',
                    labelMaxFileSize: 'Максимальный размер файла: {filesize}',
                    labelMaxTotalFileSizeExceeded: 'Превышен максимальный размер',
                    labelMaxTotalFileSize: 'Максимальный размер файла: {filesize}',
                    labelFileTypeNotAllowed: 'Файл неверного типа',
                    fileValidateTypeLabelExpectedTypes: 'Ожидается {allButLastType} или {lastType}',
                    imageValidateSizeLabelFormatError: 'Тип изображения не поддерживается',
                    imageValidateSizeLabelImageSizeTooSmall: 'Изображение слишком маленькое',
                    imageValidateSizeLabelImageSizeTooBig: 'Изображение слишком большое',
                    imageValidateSizeLabelExpectedMinSize: 'Минимальный размер: {minWidth} × {minHeight}',
                    imageValidateSizeLabelExpectedMaxSize: 'Максимальный размер: {maxWidth} × {maxHeight}',
                    imageValidateSizeLabelImageResolutionTooLow: 'Разрешение слишком низкое',
                    imageValidateSizeLabelImageResolutionTooHigh: 'Разрешение слишком высокое',
                    imageValidateSizeLabelExpectedMinResolution: 'Минимальное разрешение: {minResolution}',
                    imageValidateSizeLabelExpectedMaxResolution: 'Максимальное разрешение: {maxResolution}'
                    });"
                           multiple
                    />
                    <x-forms.input-error :messages="$errors->get('file')" class="mt-2"/>
                </div>
            </div>
        </main>
    @endisset

    <x-forms.required-field/>
    <x-forms.button-success class="mt-2">
        {{ $button }}
    </x-forms.button-success>
</form>


@if(isset($order->files) && count($order->files) > 0)
    <div class="flex justify-center">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="h-20 w-20 text-slate-100 transition-colors group-hover:text-slate-100 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
             fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
    </div>
    <table class="w-full text-left">
        <tbody>
        @foreach($order->files as $file)
            <tr class="border border-transparent border-b-slate-200 dark:border-b-navy-500">
                <td class="whitespace-nowrap py-3 w-9/10">
                    <div class=" flex space-x-2 items-center">
                        {{ $file->name }}
                    </div>
                </td>
                <td class="whitespace-nowrap py-3 w-1/10 flex justify-end items-center">
                    <form action="{{ route('file.destroy', $file) }}" method="POST">
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
