<!doctype html>
<html lang="en">
<!-- Mirrored from coderthemes.com/highdmin/layouts/vertical/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jun 2019 13:48:04 GMT -->

<head>
    <meta charset="utf-8">
    <title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>
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
</head>

<body class="account-pages">




<!-- Begin page -->
<div class="accountbg" style="background: url('{{ asset('backend/assets/images/bg-2.jpg') }}');background-size: cover;background-position: center;"></div>
<div class="wrapper-page account-page-full">
    <div class="card">
        <div class="card-block">
            <div class="account-box">
                <div class="card-box p-5">
                    <h2 class="text-uppercase text-center pb-4"><a href="index.html" class="text-success"><span><img src="{{ asset('backend/assets/images/logo.png') }}" alt="" height="26"></span></a></h2>

                    @if(session()->get('success'))

                        @if(session()->get('success'))

                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>

                        @endif

                        @endif

                    @if(session()->get('error'))

                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>


                        @endif

                    @yield('content')

                </div>
            </div>
        </div>
    </div>

</div>
<!-- jQuery  -->
<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/waves.js') }}"></script>
<script src="{{ asset('backend/assets/js/jquery.slimscroll.js') }}"></script>
<!-- App js -->
<script src="{{ asset('backend/assets/js/jquery.core.js') }}"></script>
<script src="{{ asset('backend/assets/js/jquery.app.js') }}"></script>
</body>
<!-- Mirrored from coderthemes.com/highdmin/layouts/vertical/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jun 2019 13:48:05 GMT -->

</html>