<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    @yield('title')

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{url('templateResources/vendor/frontOffice/aos/aos.css')}}" rel="stylesheet">
    <link href="{{url('templateResources/vendor/frontOffice/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('templateResources/vendor/frontOffice/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{url('templateResources/vendor/frontOffice/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{url('templateResources/vendor/frontOffice/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{url('templateResources/vendor/frontOffice/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{url('templateResources/vendor/frontOffice/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{url('templateResources/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: OnePage - v4.7.0
    * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="{{url('/')}}">CentPro</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto {{(request()->path() == '/' ? 'active' : '')}}" href="{{url('/')}}">Beranda</a></li>
                <li><a class="nav-link scrollto {{(request()->path() == 'promoUser/index' ? 'active' : '')}}" href="{{url('/promoUser/index')}}">Promo</a></li>
                <li><a class="nav-link scrollto {{(request()->path() == 'saved' ? 'active' : '')}}" href="{{url('/saved')}}">Promo yang Disimpan</a></li>
                <li><a class="getstarted scrollto" href="{{(\Illuminate\Support\Facades\Session::get('role') == 2 ? '/logout' : '/login')}}">{{(\Illuminate\Support\Facades\Session::get('role') == 2 ? 'Logout' : 'Login')}}</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

@yield('main-content')

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>CentPro || Kelompok 18 TA2 - D4 TRPL 2018</span></strong>. All Rights Reserved
            </div>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{url('templateResources/vendor/frontOffice/purecounter/purecounter.js')}}"></script>
<script src="{{url('templateResources/vendor/frontOffice/aos/aos.js')}}"></script>
<script src="{{url('templateResources/vendor/frontOffice/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('templateResources/vendor/frontOffice/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{url('templateResources/vendor/frontOffice/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{url('templateResources/vendor/frontOffice/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{url('templateResources/vendor/frontOffice/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{url('templateResources/js/main.js')}}"></script>

</body>

</html>
