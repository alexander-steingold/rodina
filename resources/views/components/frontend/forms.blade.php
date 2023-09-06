<!--request-quote-area start-->
<div class="request-quote-area " style="margin-top: 88px">
    <div class="container">
        <div class="request-quote-inner">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true"><img
                            src="{{ asset('landing/assets/img/request-quote/1.png') }}"
                            alt="img">ОСТАВИТЬ ЗАЯВКУ
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab"
                            aria-controls="pills-profile"
                            aria-selected="false"><img
                            src="{{ asset('landing/assets/img/request-quote/2.png') }}"
                            alt=""> ОТСЛЕЖИВАНИЕ
                    </button>
                </li>
            </ul>
            <div class="row">
                <div class="col-lg-6 ">
                    <form action="{{ route('quote.store')}}#contact" method="POST">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <div class="single-input-inner style-border">
                                    <input type="text" name="name" placeholder="Ваше Имя"
                                           value="{{ old('name') }}">
                                </div>
                                <x-forms.input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-inner style-border">
                                    <input type="number" name="phone" placeholder="Ваш Телефон"
                                           value="{{ old('phone') }}">
                                </div>
                                <x-forms.input-error :messages="$errors->get('phone')" class="mt-2"/>
                            </div>
                        </div>
                        <div class="p-4 text-white "
                             style="background: url({{ asset('landing/assets/img/fact/bg.png') }}">
                            <div>
                                Для бесплатной консультации, пожалуйста оставьте Вашу
                                контактную информацию, и один из наших операторов свяжетсься с Вами в течение
                                ближайшего рабочего дня. Центр обслуживания: +972 0501234567.
                            </div>
                        </div>
                        <button type="submit" style="background:#212529" class="btn btn-base w-100" href="#">ОТПРАВИТЬ
                            ЗАЯВКУ
                        </button>
                    </form>
                </div>
                <div class="col-lg-6 ">
                    <form action="{{ route('tracking')}}#contact" method="POST">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <div class="single-input-inner style-border">
                                    <input type="text" name="oid"
                                           placeholder="Номер Заказа. Например: 583463" maxlength="6">
                                </div>
                                <x-forms.input-error :messages="$errors->get('oid')" class="mt-2"/>
                            </div>
                        </div>
                        <div class="p-4 text-white "
                             style="background: url({{ asset('landing/assets/img/fact/bg.png') }}">
                            <div>
                                Для того чтобы проверить статус вашей посылки, введите номер вашего заказа,
                                полученного от оператора при оформлении, и нажмите кнопку "проверить". Номер
                                заказа
                                состоит из 6-ти цифр.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-base w-100" href="#">ПРОВЕРИТЬ ПОСЫЛКУ</button>
                    </form>
                </div>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success text-center">
                {!!   session('success') !!}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger text-center">
                <div class="fw-bold">{{ __('general.alert_titles.error') }}</div>
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>
<!--request-quote-area end-->
