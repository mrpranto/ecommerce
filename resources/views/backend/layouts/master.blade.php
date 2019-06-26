<!doctype html>
<html lang="en">
<!-- Mirrored from coderthemes.com/highdmin/layouts/vertical/page-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jun 2019 13:48:04 GMT -->

<head>
    <meta charset="utf-8">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
    <!-- App css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('backend/assets/js/modernizr.min.js') }}"></script>

    @yield('css')

</head>

<body>
<!-- Begin page -->
<div id="wrapper">
    <!-- ========== Left Sidebar Start ========== -->


    @include('backend.partials._sidebar')


    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Top Bar Start -->

        @include('backend.partials._topbar')

        <!-- Top Bar End -->
        <!-- Start Page content -->
        <div class="content">

            @yield('content')

            <!-- container -->
        </div>
        <!-- content -->
        <footer class="footer text-center"> {{ date('Y') }} <span class="d-none d-sm-inline-block">- {{ config('app.name') }}</span></footer>
    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->
<!-- jQuery  -->
<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/waves.js') }}"></script>
<script src="{{ asset('backend/assets/js/jquery.slimscroll.js') }}"></script>
<!-- App js -->
<script src="{{ asset('backend/assets/js/jquery.core.js') }}"></script>
<script src="{{ asset('backend/assets/js/jquery.app.js') }}"></script>

@yield('scripts')

</body>
<!-- Mirrored from coderthemes.com/highdmin/layouts/vertical/page-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jun 2019 13:48:04 GMT -->

</html>