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


<!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- callbackModal -->
<div class="modal fade" id="callbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span>Мы тебе перезвоним</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="reservation_form">
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="text" class="form_control" placeholder="Ваше имя" name="name" required="">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="text" class="form_control phone" placeholder="Ваш телефон" name="phone" required="">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form_group">
                                            <input type="text" class="form_control hasDatepicker" placeholder="Date" id="datepicker" name="Date" required="">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form_group">
                                            <input type="text" class="form_control" placeholder="Time" name="time" required="">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form_group">
                                            <input type="text" class="form_control" placeholder="People" name="text" required="">
                                            <i class="fas fa-user-friends"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <textarea class="form_control" placeholder="Say Somthing About Special" name="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_button text-center">
                                            <button class="chopcafe_btn chopcafe_btn_2 form_btn">Reserve</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- scroll_top -->
<a id="scroll_top"><i class="fas fa-angle-up"></i></a>
<!-- jquery  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<!-- main js -->
<script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
