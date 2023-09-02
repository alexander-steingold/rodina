<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} @isset($title)
            - {{ $title }}
        @endisset
    </title>
    <link rel="stylesheet"
          href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- CSS & JS Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;600&family=Pacifico&family=Ruslan+Display&family=Roboto:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script>
        /**
         * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
         */
        localStorage.getItem("_x_darkMode_on") === "true" &&
        document.documentElement.classList.add("dark");
    </script>

    @isset($head)
        {{ $head }}
    @endisset

</head>

<body x-data x-bind="$store.global.documentBody"
      class="" style="background-color: white!important;">
<div class="">
    <div id="root" class="" x-cloak>
        {{ $slot }}
    </div>
</div>
<!--
This is a place for Alpine.js Teleport feature
@see https://alpinejs.dev/directives/teleport
-->
<div id="x-teleport-target"></div>

<script>
    window.addEventListener("DOMContentLoaded", () => Alpine.start());
</script>

@isset($script)
    {{ $script }}
@endisset

</body>
</html>
