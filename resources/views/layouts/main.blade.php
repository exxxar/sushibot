<!DOCTYPE html>
<html lang="en">

<head>
    <!-- all meta -->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Page Title -->
    <title>Сервис доставки суши ISUSHI</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo_dark.png')}}" type="image/png">
    <!-- All css here -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('assets/plugin/bootstrap/css/bootstrap.min.css')}}">
    <!-- fontaweosme css -->
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome/css/all.css')}}">
    <!-- flaticon css -->
    <link rel="stylesheet" href="{{asset('assets/fonts/flaticon/flaticon.css')}}">
    <!-- slick slider css -->
    <link rel="stylesheet" href="{{asset('assets/plugin/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugin/slick/slick-theme.css')}}">
    <!-- sidebarmenu css -->
    <link rel="stylesheet" href="{{asset('assets/plugin/sidebar-menu/sidebar-menu.css')}}">
    <!-- jquery_ui css -->
    <link rel="stylesheet" href="{{asset('assets/plugin/jquery_ui/jquery-ui.min.css')}}">
    <!-- magnific css -->
    <link rel="stylesheet" href="{{asset('assets/plugin/magnific/magnific-popup.css')}}">
    <!-- magnific css -->
    <link rel="stylesheet" href="{{asset('assets/plugin/nicenumber/jquery.nice-number.css')}}">
    <!-- magnific css -->
    <link rel="stylesheet" href="{{asset('assets/plugin/niceselect/nice-select.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <!-- Style css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
</head>

<body>

<!-- Start preloader area -->
<div class="preloader_area">
    <div class="spinner">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
        <div class="line4"></div>
        <div class="line5"></div>
        <div class="line6"></div>
        <div class="line7"></div>
    </div>
</div>
<!-- End preloader area -->
@yield('content')
<!-- scroll_top -->
<a id="scroll_top"><i class="fas fa-angle-up"></i></a>
<!-- jquery  -->
<script src="{{asset("assets/js/jquery-1.12.4.min.js")}}"></script>
<!-- bootstrap js -->
<script src="{{asset('assets/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Poper js -->
<script src="{{asset('assets/plugin/bootstrap/js/popper.min.js')}}"></script>
<!-- slick slider js -->
<script src="{{asset('assets/plugin/slick/slick.min.js')}}"></script>
<!-- magnific popup js -->
<script src="{{asset('assets/plugin/magnific/jquery.magnific-popup.min.js')}}"></script>
<!-- isotope js -->
<script src="{{asset('assets/plugin/isotope/isotope.min.js')}}"></script>
<!-- imagesloaded js -->
<script src="{{asset('assets/plugin/imagesloaded/imagesloaded.min.js')}}"></script>
<!-- couterup js -->
<script src="{{asset('assets/plugin/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/plugin/counterup/jquery.waypoints.min.js')}}"></script>
<!-- countdown js -->
<script src="{{asset('assets/plugin/countdown/jquery.countdown.min.js')}}"></script>
<!-- jquery_ui js -->
<script src="{{asset('assets/plugin/jquery_ui/jquery-ui.min.js')}}"></script>
<!-- nice number js -->
<script src="{{asset('assets/plugin/niceselect/jquery.nice-select.min.js')}}"></script>
<!-- nice number js -->
<script src="{{asset('assets/plugin/nicenumber/jquery.nice-number.min.js')}}"></script>
<!-- sidebarmenu js -->
<script src="{{asset('assets/plugin/sidebar-menu/sidebar-menu.js')}}"></script>
<!-- jquery_ui js -->
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<!-- main js -->
<script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
