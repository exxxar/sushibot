<!-- Start header_area -->
<header class="header_area header_demo_1">
    <!-- End site_menu -->
    <div class="container">
        <div class="site_menu">
            <div class="row align-items-center">
                <div class="col-lg-1">
                    <div class="brand_logo">
                        <a href="index.html" class="main_logo"><img src="assets/images/logo.jpg" class="img-fluid" alt=""></a>
                        <a href="index.html" class="sticky_logo"><img src="assets/images/logo_dark.png" class="img-fluid" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-11">
                    <div class="chopcafe_menu">
                        <nav class="main_menu">
                            <ul>
                                <li class="menu-item"><a href="#">Галерея</a></li>
                                <li class="menu-item"><a href="#menu_grid">Наши товары</a></li>
                                <li class="menu-item"><a href="{{url("/contacts")}}">Наши контакты</a></li>
                                <li class="search_icon"><a href="#" class="search_btn"><i class="fas fa-search"></i></a></li>
                                <li class="cart_icon"><a href="#" class="open_cart"><span class="count">2</span><i class="fas fa-shopping-cart"></i></a>
                                    <ul id="site-header-cart" class="site-header-cart">
                                        <li>
                                            <div class="widget_shopping_cart">
                                                <div class="widget_shopping_cart_content">
                                                    <ul class="woocomerce-mini-cart">
                                                        <li class="woocommerce-mini-cart-item mini-cart-item">
                                                            <div class="product_thumb">
                                                                <img src="assets/images/mini_1.jpg" alt="">
                                                            </div>
                                                            <div class="product_name">
                                                                <a href="#" class="product_title">Chicken Breast</a>
                                                                <p><span class="woocommerce-price-currencySymbol">$</span> <span class="woocommerce-price-amount">30.00</span> <span class="quantity"> X 1</span></p>
                                                            </div>
                                                            <div class="product_remove">
                                                                <a href="#" class="remove_btn"><i class="fas fa-times"></i></a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <p class="woocommerce-mini-cart__total text-center">
                                                        <span class="woocommerce-price-currencySymbol">$</span> <span class="woocommerce-price-amount">60.00</span>
                                                    </p>
                                                    <p class="woocommerce-mini-cart__buttons text-center">
                                                        <a href="#" class="chopcafe_btn" data-toggle="modal" data-target="#cartModal">Открыть корзину</a>
                                                        <a href="#" class="chopcafe_btn">Оформить заказ</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile menu -->
        <div class="mobile_wrapper">
            <div class="row align-items-center mobile_header">
                <div class="col-lg-3 col-md-4 col-5">
                    <div class="brand_logo">
                        <a href="{{url('/')}}"><img src="{{asset("assets/images/logo_dark.png")}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-7">
                    <div class="mobile_menu">
                        <ul>
                            <li class="cart_icon"><a href="#"><span class="count">2</span><i class="fas fa-shopping-cart"></i></a>
                                <ul id="site-header-cart-2" class="site-header-cart">
                                    <li>
                                        <div class="widget_shopping_cart">
                                            <div class="widget_shopping_cart_content">
                                                <ul class="woocomerce-mini-cart">
                                                    <li class="woocommerce-mini-cart-item mini-cart-item">
                                                        <div class="product_thumb">
                                                            <img src="assets/images/mini_1.jpg" alt="">
                                                        </div>
                                                        <div class="product_name">
                                                            <a href="#" class="product_title">Chicken Breast</a>
                                                            <p><span class="woocommerce-price-currencySymbol">$</span> <span class="woocommerce-price-amount">30.00</span> <span class="quantity"> X 1</span></p>
                                                        </div>
                                                        <div class="product_remove">
                                                            <a href="#" class="remove_btn"><i class="fas fa-times"></i></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <p class="woocommerce-mini-cart__total text-center">
                                                    <span class="woocommerce-price-currencySymbol">$</span> <span class="woocommerce-price-amount">60.00</span>
                                                </p>
                                                <p class="woocommerce-mini-cart__buttons text-center">
                                                    <a href="#" class="chopcafe_btn" >Открыть корзину</a>
                                                    <a href="#" class="chopcafe_btn">Оплатить</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#" class="menu_icon"><i class="fas fa-bars"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="sidenav_menu">
                <div class="times_icon">
                    <a href="#" class="menu_icon"><i class="fas fa-times"></i></a>
                </div>
                <div class="brand_logo text-center">
                    <a href="index.html"><img src="assets/images/logo_3.png" alt=""></a>
                </div>
                <div class="sidebar_search">
                    <input type="text" placeholder="search here">
                </div>
                <ul class="sidebar-menu">
                    <li><a href="#">home<i class="fas fa-angle-down float-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="index.html">home 01</a></li>
                            <li><a href="home_v2.html">home 02</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Menu<i class="fas fa-angle-down float-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="menu_v1.html">Menu 01</a></li>
                            <li><a href="menu_v2.html">Menu 02</a></li>
                            <li><a href="shop_details.html">Menu details</a></li>
                        </ul>
                    </li>
                    <li><a href="#">pages<i class="fas fa-angle-down float-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="about.html">About us</a></li>
                            <li><a href="team.html">Our Team</a></li>
                            <li><a href="single_team.html">Team Details</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="reservation.html">Reservation</a></li>
                            <li><a href="festival.html">Festival</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="sign_up.html">Sign Up</a></li>
                            <li><a href="404.html">404</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Gallery<i class="fas fa-angle-down float-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="gallery_v1.html">Gallery 01</a></li>
                            <li><a href="gallery_v2.html">Gallery 02</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Shop<i class="fas fa-angle-down float-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="shop_grid.html">shop grid</a></li>
                            <li><a href="shop_grid_sidebar.html">shop grid</a></li>
                            <li><a href="shop_list.html">shop list</a></li>
                            <li><a href="shop_list_sidebar.html">shop list sidebar</a></li>
                            <li><a href="shop_details.html">shop details</a></li>
                        </ul>
                    </li>
                    <li><a href="#">blog<i class="fas fa-angle-down float-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="blog_standard.html">blog_standard</a></li>
                            <li><a href="blog_2_column.html">blog 2 column</a></li>
                            <li><a href="blog_3_column.html">blog 3 column</a></li>
                            <li><a href="single_blog.html">Single Blog</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">contact</a></li>
                </ul>
            </div>
        </div>
        <!-- mobile menu -->
    </div>
    <!-- End site_menu -->

    <div class="sidenav_cart">
        <div class="times_icon">
            <a href="#" class="menu_icon"><i class="fas fa-times"></i></a>
        </div>
        <div class="brand_logo text-center">
            <a href="index.html"><img src="assets/images/logo_3.png" alt=""></a>
        </div>
        <div class="sidebar_search">
            <input type="text" placeholder="search here">
        </div>
        <ul class="sidebar-menu">
            <li><a href="#">home<i class="fas fa-angle-down float-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="index.html">home 01</a></li>
                    <li><a href="home_v2.html">home 02</a></li>
                </ul>
            </li>
            <li><a href="#">Menu<i class="fas fa-angle-down float-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="menu_v1.html">Menu 01</a></li>
                    <li><a href="menu_v2.html">Menu 02</a></li>
                    <li><a href="shop_details.html">Menu details</a></li>
                </ul>
            </li>
            <li><a href="#">pages<i class="fas fa-angle-down float-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="about.html">About us</a></li>
                    <li><a href="team.html">Our Team</a></li>
                    <li><a href="single_team.html">Team Details</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="reservation.html">Reservation</a></li>
                    <li><a href="festival.html">Festival</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="sign_up.html">Sign Up</a></li>
                    <li><a href="404.html">404</a></li>
                </ul>
            </li>
            <li><a href="#">Gallery<i class="fas fa-angle-down float-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="gallery_v1.html">Gallery 01</a></li>
                    <li><a href="gallery_v2.html">Gallery 02</a></li>
                </ul>
            </li>
            <li><a href="#">Shop<i class="fas fa-angle-down float-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="shop_grid.html">shop grid</a></li>
                    <li><a href="shop_grid_sidebar.html">shop grid</a></li>
                    <li><a href="shop_list.html">shop list</a></li>
                    <li><a href="shop_list_sidebar.html">shop list sidebar</a></li>
                    <li><a href="shop_details.html">shop details</a></li>
                </ul>
            </li>
            <li><a href="#">blog<i class="fas fa-angle-down float-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="blog_standard.html">blog_standard</a></li>
                    <li><a href="blog_2_column.html">blog 2 column</a></li>
                    <li><a href="blog_3_column.html">blog 3 column</a></li>
                    <li><a href="single_blog.html">Single Blog</a></li>
                </ul>
            </li>
            <li><a href="contact.html">contact</a></li>
        </ul>
    </div>
</header>
<!-- End header_area -->
