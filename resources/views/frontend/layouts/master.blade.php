<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title') - {{ config('app.name') }} </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.ico') }}">

    <!-- CSS
    ========================= -->
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

    @yield('css')

</head>

<body>


@include('frontend.partials._header')
@include('frontend.partials._offcanvas')


@yield('content')


@include('frontend.partials._newsletter')

@include('frontend.partials._footer')

@include('frontend.partials._modal')

<!-- JS
============================================ -->

<!-- Plugins JS -->
<script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>

@yield('scripts')

</body>
</html>