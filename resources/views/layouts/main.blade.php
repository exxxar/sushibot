<!DOCTYPE html>
<html lang="en">

<head>
    <!-- all meta -->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
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

<div id="app">
    @yield('content')
</div>
<!-- End preloader area -->


<!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="chopcafe_cart wow slideInUp section_padding" style="visibility: visible;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="chopcafe_product_table">
                                    <table class="chopcafe_table table">
                                        <thead>
                                        <tr>
                                            <th>Thumbnail</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="thumbnail">
                                                <img src="assets/images/thumb_4.png" class="img-fluid" alt="">
                                            </td>
                                            <td class="product_title"><a href="shop_details.html">Egg Curry &amp; Butter
                                                    Chicken</a></td>
                                            <td class="product_price"><span>$ 28.99</span></td>
                                            <td class="product_quantity">
                                                <div class="item_quantity">
                                                    <div class="nice-number">
                                                        <button type="button">-</button>
                                                        <input type="number" value="1" style="width: 2ch;">
                                                        <button type="button">+</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total">
                                                <span>$ 28.99</span>
                                            </td>
                                            <td class="product_delete">
                                                <a href="#"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="thumbnail">
                                                <img src="assets/images/thumb_4.png" class="img-fluid" alt="">
                                            </td>
                                            <td class="product_title"><a href="shop_details.html">Egg Curry &amp; Butter
                                                    Chicken</a></td>
                                            <td class="product_price"><span>$ 28.99</span></td>
                                            <td class="product_quantity">
                                                <div class="item_quantity">
                                                    <div class="nice-number">
                                                        <button type="button">-</button>
                                                        <input type="number" value="1" style="width: 2ch;">
                                                        <button type="button">+</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total">
                                                <span>$ 28.99</span>
                                            </td>
                                            <td class="product_delete">
                                                <a href="#"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="thumbnail">
                                                <img src="assets/images/thumb_4.png" class="img-fluid" alt="">
                                            </td>
                                            <td class="product_title"><a href="shop_details.html">Egg Curry &amp; Butter
                                                    Chicken</a></td>
                                            <td class="product_price"><span>$ 28.99</span></td>
                                            <td class="product_quantity">
                                                <div class="item_quantity">
                                                    <div class="nice-number">
                                                        <button type="button">-</button>
                                                        <input type="number" value="1" style="width: 2ch;">
                                                        <button type="button">+</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total">
                                                <span>$ 28.99</span>
                                            </td>
                                            <td class="product_delete">
                                                <a href="#"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="thumbnail">
                                                <img src="assets/images/thumb_4.png" class="img-fluid" alt="">
                                            </td>
                                            <td class="product_title"><a href="shop_details.html">Egg Curry &amp; Butter
                                                    Chicken</a></td>
                                            <td class="product_price"><span>$ 28.99</span></td>
                                            <td class="product_quantity">
                                                <div class="item_quantity">
                                                    <div class="nice-number">
                                                        <button type="button">-</button>
                                                        <input type="number" value="1" style="width: 2ch;">
                                                        <button type="button">+</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total">
                                                <span>$ 28.99</span>
                                            </td>
                                            <td class="product_delete">
                                                <a href="#"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="chopcafe_update_cart wow slideInUp" style="visibility: visible;">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="continue_shopping">
                                        <a href="#" class="chopcafe_btn continue_btn"><i
                                                    class="fas fa-shopping-cart"></i>Continue Shopping</a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="update_cart">
                                        <a href="#" class="chopcafe_btn clear_cart_btn"><i
                                                    class="fas fa-times-circle"></i>Clear Cart</a>
                                        <a href="#" class="chopcafe_btn update_cart_btn"><i class="fas fa-sync-alt"></i>Update
                                            Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="chopcafe_shoping_coupon">
                                    <h4>Enter Your Coupon Code:</h4>
                                    <div class="coupon_box">
                                        <input type="text" class="form_control"
                                               placeholder="Enter your coupon code if you have one">
                                        <button class="chopcafe_btn coupon_btn"><i class="fas fa-tags"></i>Apply Coupon
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chopcafe_cart_total_shipping">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="shipping_content_box">
                                        <h4>Estimate Shipping</h4>
                                        <p>Enter your destination to get a shipping.</p>
                                        <div class="shipping_form">
                                            <form>
                                                <div class="form_group">
                                                    <select class="selectoption" style="display: none;">
                                                        <option>Bangladesh</option>
                                                        <option>Singapure</option>
                                                        <option>Chaina</option>
                                                        <option>Japan</option>
                                                        <option>America</option>
                                                    </select>
                                                    <div class="nice-select selectoption" tabindex="0"><span
                                                                class="current">Bangladesh</span>
                                                        <ul class="list">
                                                            <li data-value="Bangladesh" class="option selected">
                                                                Bangladesh
                                                            </li>
                                                            <li data-value="Singapure" class="option">Singapure</li>
                                                            <li data-value="Chaina" class="option">Chaina</li>
                                                            <li data-value="Japan" class="option">Japan</li>
                                                            <li data-value="America" class="option">America</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="form_group">
                                                    <select class="selectoption" style="display: none;">
                                                        <option>Dhaka</option>
                                                        <option>Singapure</option>
                                                        <option>Chaina</option>
                                                        <option>Japan</option>
                                                        <option>New York</option>
                                                    </select>
                                                    <div class="nice-select selectoption" tabindex="0"><span
                                                                class="current">Dhaka</span>
                                                        <ul class="list">
                                                            <li data-value="Dhaka" class="option selected">Dhaka</li>
                                                            <li data-value="Singapure" class="option">Singapure</li>
                                                            <li data-value="Chaina" class="option">Chaina</li>
                                                            <li data-value="Japan" class="option">Japan</li>
                                                            <li data-value="New York" class="option">New York</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="form_group">
                                                    <input type="text" class="form_control"
                                                           placeholder="Enter Zip Code">
                                                </div>
                                                <div class="form_button">
                                                    <button class="shipping_btn">Check</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="chopcafe_cart_note">
                                        <h4>Note</h4>
                                        <p>Add special instructions for your order...</p>
                                        <form>
                                            <textarea class="form_control" name="message"></textarea>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="chopcafe_cart_total">
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td><span class="subtotal">Subtotal</span></td>
                                                <td><span class="price">$ 210</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="gtotal">Grand Total</span></td>
                                                <td><span class="gprice price">$ 210</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="checkout_button">
                                            <a href="#" class="checkout_btn">Proceed To Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- callbackModal -->
<div class="modal fade" id="callbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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
                                            <input type="text" class="form_control" placeholder="Ваше имя" name="name"
                                                   required="">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="text" class="form_control phone" placeholder="Ваш телефон"
                                                   name="phone" required="">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form_group">
                                            <input type="text" class="form_control hasDatepicker" placeholder="Date"
                                                   id="datepicker" name="Date" required="">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form_group">
                                            <input type="text" class="form_control" placeholder="Time" name="time"
                                                   required="">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form_group">
                                            <input type="text" class="form_control" placeholder="People" name="text"
                                                   required="">
                                            <i class="fas fa-user-friends"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <textarea class="form_control" placeholder="Say Somthing About Special"
                                                      name="Message"></textarea>
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
<script src="{{asset('js/app.js')}}"></script>
<!-- main js -->
<script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
