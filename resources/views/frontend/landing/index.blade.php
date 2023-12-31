<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>РОДИНА EXPRESS - ДОСТАВКА ПОСЫЛОК ИЗ ИЗРАИЛЯ</title>
    <link rel=icon href="{{ asset('landing/assets/img/favicon.png') }}" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('landing/assets/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/assets/css/responsive.css') }}">

</head>
<body>

<!-- preloader area start -->
<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->

<!-- search popup start-->
<div class="body-overlay" id="body-overlay"></div>
<div class="td-search-popup" id="td-search-popup">
    <form action="home.html" class="search-form">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search.....">
        </div>
        <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
    </form>
</div>
<!-- search popup end-->

<x-frontend.navbar/>

<x-frontend.main-banner/>

<x-frontend.about/>

<x-frontend.facts/>

<x-frontend.services/>

<x-frontend.how/>

{{--<x-frontend.forms/>--}}

<x-frontend.testimonials/>

{{--<x-frontend.call/>--}}

<x-frontend.rules/>

<x-frontend.footer/>

<x-frontend.bottom/>
<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->


<!-- all plugins here -->
<script src="{{ asset('landing/assets/js/vendor.js') }}"></script>
<!-- main js  -->
<script src="{{ asset('landing/assets/js/main.js') }}"></script>
</body>
</html>
