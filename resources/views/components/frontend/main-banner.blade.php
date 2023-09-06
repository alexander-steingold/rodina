<!-- banner start -->
<div class="banner-area banner-area-2">
    <div class="banner-slider owl-carousel">
        @for($i=1; $i<=2; $i++)
            <div class="item" style="background: url({{ asset("landing/assets/img/banner/$i.png") }})">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="banner-inner style-white">
                                <h1 class="b-animate-2 title">ДОСТАВКА ПОСЫЛОК<br> ИЗ ИЗРАИЛЯ</h1>
                                <h6 class="b-animate-3 content">
                                    Добро пожаловать на сайт компании РОДИНА EXPRESS LTD, профессионального и надежного
                                    поставщика, на рынке услуг логистики и экспресс-доставки международных посылок.
                                </h6>
                                <div class="btn-wrap">
                                    <a class="btn btn-base b-animate-4" href="{{ url('#contact') }}">Отследить
                                        Посылку</a>
                                    <a class="btn btn-white b-animate-4" href="{{ url('#contact') }}">Связаться С
                                        Нами</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
<!-- banner end -->
