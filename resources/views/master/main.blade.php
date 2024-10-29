<!DOCTYPE html>

<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/bakerfresh/bakerfresh/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jul 2024 09:33:27 GMT -->
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bakerfresh</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allura&amp;family=Handlee&amp;family=Inter:wght@300;400;500;600;700&amp;family=Comfortaa:wght@300;400;500;600;700&amp;family=Montaga&amp;family=Pacifico&amp;family=Fredericka+the+Great&amp;family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Yellowtail&amp;display=swap" rel="stylesheet">

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/lastudioicons.css">
    <link rel="stylesheet" href="assets/css/vendor/dliconoutline.css">

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="assets/css/lightgallery-bundle.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/starRating.css">
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>


</head>

<body>

    <!-- Header Start -->
    <div class="header-section header-transparent header-sticky">
        <div class="container position-relative">

            <div class="row align-items-center">
                <div class="col-lg-3 col-xl-3 col-7">
                    <!-- Header Logo Start -->
                    <div class="header-logo">
                        <a href="{{route('home')}}">
                            <img class="white-logo" src="assets/images/logo-white.svg" width="229" height="62" alt="Logo">
                        </a>
                    </div>
                    <!-- Header Logo End -->
                </div>
                <div class="col-lg-7 col-xl-6 d-none d-lg-block">
                    <!-- Header Menu Start -->
                    <div class="header-menu">
                        <ul class="header-primary-menu d-flex justify-content-center">
                            <li>
                                <a href="{{route('home')}}" class="menu-item-link {{ app('request')->route()->getName() === 'home' ? 'active' : ''}}"><span>Trang chủ</span></a>
                                
                            </li>
                            <li class="position-static">
                                <a class="menu-item-link {{ app('request')->route()->getName() === 'home.shop' ? 'active' : ''}}" href="#" ><span>Cửa hàng</span></a>
                                <ul class="sub-menu sub-menu-mega">
                                    <li class="mega-menu-item">
                                        <ul>
                                            <li class="mega-menu-item-title">Danh sách</li>
                                            <li><a class="sub-item-link" href="{{ route('shop.index') }}"><span>Mua sắm</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-item">
                                        <ul>
                                            @foreach ($globalVariableCategory as $category)
                                                <li><a class="sub-item-link" href="{{ route('shop.product', $category->id) }}"><span>{{ $category->name }}</span></a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    
                                    <li class="mega-menu-item banner-menu-content-wrap">
                                        <ul>
                                            <li>
                                                <a href="shop.html">
                                                    <img src="assets/images/product/featured-product-01.png" alt="Shop">
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="menu-item-link {{ app('request')->route()->getName() === 'home.blog' ? 'active' : ''}}" href="{{ route('home.blog') }}"><span>Thông tin</span></a>
                            </li>
                            <li><a class="menu-item-link {{ app('request')->route()->getName() === 'home.contact' ? 'active' : ''}}" href="{{ route('home.contact') }}"><span>Liên hệ</span></a></li>
                        </ul>
                    </div>
                    <!-- Header Menu End -->
                </div>
                <div class="col-lg-2 col-xl-3 col-5">
                    <!-- Header Meta Start --> 
                    <div class="header-meta">
                        <ul class="header-meta__action d-flex justify-content-end">
                            <li><button class="action search-open"><i class="lastudioicon-zoom-1"></i></button></li>
                            <li>
                                <button class="action" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart">
                                    <i class="lastudioicon-shopping-cart-2"></i>
                                    @if (auth()->check())
                                        <span id="countItemCart" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                                            {{$user_cart->items->count()}}
                                        </span>
                                    @endif
                                </button>
                            </li>
                            <li class="action account_action_li" style="position: relative">
                                
                                @if (auth()->check())
                                    <button class="action">
                                        <i class="lastudioicon-single-01-2"></i>
                                    </button>
                                    <ul class="account_action" >
                                        <li><a href="{{ route('account.profile') }}">Thông tin cá nhân</a></li>
                                        <li><a href="{{ route('account.order') }}">Thông tin mua hàng</a></li>
                                        <li><a href="{{ route('account.favorited') }}">Sản phẩm yêu thích</a></li>
                                        <li><a href="{{ route('account.logout') }}">Đăng xuất</a></li>
                                    </ul>
                                @else
                                    <a class="action" href="{{ route('account.index') }}">
                                        <i class="lastudioicon-single-01-2"></i>
                                    </a>
                                @endif
                            </li>
                            <li class="d-lg-none">
                                <button class="action" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu"><i class="lastudioicon-menu-8-1"></i></button>
                            </li>
                        </ul>
                    </div>
                    <!-- Header Meta End -->
                </div>
            </div>

        </div>
    </div>
    <!-- Header End -->

    <!-- Search Start  -->
    <div class="search-popup position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center p-6 bg-black bg-opacity-75">
        <div class="search-popup__form position-relative">
            <form action="#">
                <input class="search-popup__field border-0 border-bottom bg-transparent text-white w-100 tra py-3" type="text" placeholder="Search…">
                <button class="search-popup__icon text-white border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y"><i class="lastudioicon-zoom-1"></i></button>
            </form>
        </div>
        <button class="search-popup__close position-absolute top-0 end-0 m-8 p-3 lh-1 border-0 text-white fs-4"><i class="lastudioicon-e-remove"></i></button>
    </div>
    <!-- Search End -->

    @if (auth()->check())
        <!-- Offcanvas Cart Start  -->
        <div class="offcanvas offcanvas-end offcanvas-cart" id="offcanvasCart">

            <div class="offcanvas-header">
                <h4 class="offcanvas-title">Giỏ hàng</h4>
                <button type="button" class="btn-close text-secondary" data-bs-dismiss="offcanvas"><i class="lastudioicon lastudioicon-e-remove"></i></button>
            </div>

            <div id="cartList" class="offcanvas-body">
                <!-- Offcanvas Cart Items Start  -->
                <ul class="offcanvas-cart-items">
                    @foreach ($user_cart->items as $item)
                        <li>
                            <!-- Mini Cart Item Start  -->
                            <div class="mini-cart-item">
                                <button 
                                class="btn_cart_remove mini-cart-item__remove"
                                data-url="{{route('home.delete_cart')}}" 
                                data-item_cart_id = "{{$item->id}}"

                                ><i class="lastudioicon lastudioicon-e-remove"></i></button>
                                <div class="mini-cart-item__thumbnail">
                                    <a href="{{route('shop.details', $item->product_id)}}"><img width="50" height="50" src="uploads/product/{{$item->product->image}}" alt="Cart"></a>
                                </div>
                                <div class="mini-cart-item__content">
                                    <h6 class="mini-cart-item__title"><a href="{{route('shop.details', $item->product_id)}}">{{$item->product->name}}</a></h6>
                                    <span class="mini-cart-item__quantity">{{$item->quantity}} × {{$item->product->price}}</span>
                                </div>
                            </div>
                            <!-- Mini Cart Item End  -->
                        </li>
                    @endforeach
                </ul>
                <!-- Offcanvas Cart Items End  -->
            </div>

            <div class="offcanvas-footer d-flex flex-column gap-4">

                <!-- Mini Cart Total End  -->
                <div class="mini-cart-totla">
                    <span class="label">Tổng:</span>
                    <span class="value">
                        @php
                            $price = 0;
                            foreach ($user_cart->items as $item) {
                                $price += $item->quantity * $item->product->price;
                            }
                        @endphp
                        {{$price}}
                    </span>
                </div>
                <!-- Mini Cart Total End  -->

                <!-- Mini Cart Button End  -->
                <div class="mini-cart-btn d-flex flex-column gap-2">
                    <a class="d-block btn btn-secondary btn-hover-primary" href="{{ route('home.cart') }}">Xem giỏ hàng</a>
                    <a class="d-block btn btn-secondary btn-hover-primary" href="{{ route('home.checkout') }}">Thanh toán</a>
                </div>
                <!-- Mini Cart Button End  -->

            </div>

        </div>
        <!-- Offcanvas Cart End -->
    @endif

    @yield('main')

    <!-- Scroll Top Start -->
    <a href="#" class="scroll-top" id="scroll-top">
        <i class="lastudioicon-up-arrow"></i>
    </a>
    <!-- Scroll Top End -->

    <!-- Footer Strat -->
    <div class="footer-section">
        <!-- Footer Widget Section Strat -->
        <div class="footer-widget-section">
            <div class="container custom-container">
                <div class="row gy-6">
                    <div class="col-md-4">
                        <!-- Footer Widget Section Strat -->
                        <div class="footer-widget">
                            <div class="footer-widget__logo">
                                <a class="logo-dark" href="index.html"><img src="assets/images/logo.svg" alt="Logo"></a>
                                <a class="logo-white d-none" href="index.html"><img src="assets/images/logo-white.svg" alt="Logo"></a>
                            </div>
                            <div class="footer-widget__social">
                                <a href="#/"><i class="lastudioicon-b-facebook"></i></a>
                                <a href="#/"><i class="lastudioicon-b-twitter"></i></a>
                                <a href="#/"><i class="lastudioicon-b-pinterest"></i></a>
                                <a href="#/"><i class="lastudioicon-b-instagram"></i></a>
                            </div>
                        </div>
                        <!-- Footer Widget Section End -->
                    </div>
                    <div class="col-md-8">
                        <!-- Footer Widget Wrapper Strat -->
                        <div class="footer-widget-wrapper d-flex flex-wrap gap-4">

                            <!-- Footer Widget Strat -->
                            <div class="footer-widget flex-grow-1">
                                <h4 class="footer-widget__title">Loại bánh</h4>

                                <ul class="footer-widget__link">
                                    @foreach ($globalVariableCategory as $cat)
                                        <li><a href="{{ route('shop.product', $cat->id) }}">{{ $cat->name }}</a></li>
                                        
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Footer Widget End -->

                            <!-- Footer Widget Strat -->
                            <div class="footer-widget flex-grow-1">
                                <h4 class="footer-widget__title">Dịch vụ</h4>

                                <ul class="footer-widget__link">
                                    <li><a href="contact.html">Vận chuyển</a></li>
                                    <li><a href="contact.html">Thanh toán</a></li>
                                    <li><a href="contact.html">Hoàn trả</a></li>
                                    <li><a href="contact.html">Sự riêng tư</a></li>
                                </ul>
                            </div>
                            <!-- Footer Widget End -->

                            <!-- Footer Widget Strat -->
                            <div class="footer-widget flex-grow-1">
                                <h4 class="footer-widget__title">Thông tin</h4>

                                <ul class="footer-widget__link">
                                    <li><a href="about.html">Về chúng tôi</a></li>
                                    <li><a href="conact.html">Liên hệ</a></li>
                                    <li><a href="blog-details.html">Bài đăng Mới nhất</a></li>
                                    <li><a href="about.html">Mẹo bán hàng</a></li>
                                </ul>
                            </div>
                            <!-- Footer Widget End -->

                        </div>
                        <!-- Footer Widget Wrapper End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Widget Section End -->

        <!-- Footer Copyright Strat -->
        <div class="footer-copyright footer-copyright-two">
            <div class="container">
                <!-- Footer Copyright Text Strat -->
                <div class="footer-copyright-text text-center">
                    <p>&copy; 2022 <strong> Bakerfresh </strong> Made with <i class="lastudioicon-heart-1"></i> by <a href="https://themeforest.net/user/bootxperts/portfolio">BootXperts</a></p>
                </div>
                <!-- Footer Copyright Text End -->
            </div>
        </div>
        <!-- Footer Copyright End -->

    </div>
    <!-- Footer End -->

    <div class="quickview-product-modal modal fade" id="exampleProductModal">
        <div class="modal-dialog modal-dialog-centered mw-100">
            <div class="container">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="lastudioicon lastudioicon-e-remove"></i>
                    </button>
                    <div class="modal-body">
                        <!-- Single Product Top Area Start -->
                        <div class="row">
                            <div class="col-lg-6 offset-lg-0 col-md-10 offset-md-1">

                                <!-- Product Details Image Start -->
                                <div class="product-details-img d-flex overflow-hidden flex-row">

                                    <!-- Single Product Image Start -->
                                    <div class="single-product-vertical-tab swiper-container order-2">

                                        <div class="swiper-wrapper">
                                            <a class="swiper-slide h-auto" href="#/">
                                                <img class="w-100" src="assets/images/product/product-7-1.png" alt="Product">
                                            </a>
                                            <a class="swiper-slide h-auto" href="#/">
                                                <img class="w-100" src="assets/images/product/product-7-2.png" alt="Product">
                                            </a>
                                            <a class="swiper-slide h-auto" href="#/">
                                                <img class="w-100" src="assets/images/product/product-7-3.png" alt="Product">
                                            </a>
                                            <a class="swiper-slide h-auto" href="#/">
                                                <img class="w-100" src="assets/images/product/product-7-4.png" alt="Product">
                                            </a>
                                            <a class="swiper-slide h-auto" href="#/">
                                                <img class="w-100" src="assets/images/product/product-7-5.png" alt="Product">
                                            </a>
                                            <a class="swiper-slide h-auto" href="#/">
                                                <img class="w-100" src="assets/images/product/product-7-6.png" alt="Product">
                                            </a>
                                        </div>

                                        <!-- Next Previous Button Start -->
                                        <div class="swiper-button-vertical-next swiper-button-next"><i class="lastudioicon-arrow-right"></i></div>
                                        <div class="swiper-button-vertical-prev swiper-button-prev"><i class="lastudioicon-arrow-left"></i></div>
                                        <!-- Next Previous Button End -->

                                    </div>
                                    <!-- Single Product Image End -->

                                    <!-- Single Product Thumb Start -->
                                    <div class="product-thumb-vertical overflow-hidden swiper-container order-1">

                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img src="assets/images/product/product-tab-1.png" alt="Product">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="assets/images/product/product-tab-2.png" alt="Product">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="assets/images/product/product-tab-3.png" alt="Product">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="assets/images/product/product-tab-4.png" alt="Product">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="assets/images/product/product-tab-5.png" alt="Product">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="assets/images/product/product-tab-6.png" alt="Product">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product Thumb End -->

                                </div>
                                <!-- Product Details Image End -->

                            </div>
                            <div class="col-lg-6">

                                <!-- Product Summery Start -->
                                <div class="product-summery position-relative">

                                    <!-- Product Head Start -->
                                    <div class="product-head mb-3">

                                        <!-- Price Start -->
                                        <span class="product-head-price">$4.99</span>
                                        <!-- Price End -->

                                    </div>
                                    <!-- Product Head End -->

                                    <!-- Description Start -->
                                    <p class="desc-content">Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse pariatur duis deserunt mollit dolore cillum minim tempor enim. Elit aute irure tempor cupidatat incididunt sint deserunt ut voluptate aute id deserunt nisi.</p>
                                    <!-- Description End -->

                                    <!-- Product Coler Variation Start -->
                                    <div class="product-color mb-2">
                                        <label for="colorBy">Color</label>
                                        <div class="select-wrapper">
                                            <select name="color" id="colorBy">
                                                <option value="manual">Chose an option</option>
                                                <option value="blue">Blue</option>
                                                <option value="red">Red</option>
                                                <option value="green">Green</option>
                                                <option value="black">Black</option>
                                                <option value="yellow">Yellow</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Product Coler Variation End -->

                                    <!-- Product Size Start -->
                                    <div class="product-size mb-5">
                                        <label for="sizeBy">Size</label>
                                        <div class="select-wrapper">
                                            <select name="size" id="sizeBy">
                                                <option value="manual">Chose an option</option>
                                                <option value="large">Large</option>
                                                <option value="medium">Medium</option>
                                                <option value="small">Small</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Product Size End -->

                                    <!-- Product Quantity, Cart Button, Wishlist and Compare Start -->
                                    <ul class="product-cta">
                                        <li>
                                            <!-- Quantity Start -->
                                            <div class="quantity">
                                                <div class="cart-plus-minus"></div>
                                            </div>
                                            <!-- Quantity End -->
                                        </li>
                                        <li>
                                            <!-- Cart Button Start -->
                                            <div class="cart-btn">
                                                <div class="add-to_cart">
                                                    <a class="btn btn-dark btn-hover-primary" href="cart.html">Add to cart</a>
                                                </div>
                                            </div>
                                            <!-- Cart Button End -->
                                        </li>
                                        <li>
                                            <!-- Action Button Start -->
                                            <div class="actions">
                                                <a href="compare.html" title="Compare" class="action compare"><i class="lastudioicon-heart-2"></i></a>
                                                <a href="wishlist.html" title="Wishlist" class="action wishlist"><i class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                            </div>
                                            <!-- Action Button End -->
                                        </li>
                                    </ul>
                                    <!-- Product Quantity, Cart Button, Wishlist and Compare End -->

                                    <!-- Product Meta Start -->
                                    <ul class="product-meta">
                                        <li class="product-meta-wrapper">
                                            <span class="product-meta-name">SKU:</span>
                                            <span class="product-meta-detail">REF. LA-199</span>
                                        </li>
                                        <li class="product-meta-wrapper">
                                            <span class="product-meta-name">category:</span>
                                            <span class="product-meta-detail">
                                            <a href="#">Cake, </a>
                                            <a href="#">New</a>
                                        </span>
                                        </li>
                                        <li class="product-meta-wrapper">
                                            <span class="product-meta-name">Tags:</span>
                                            <span class="product-meta-detail">
                                            <a href="#">Cake 1</a>
                                        </span>
                                        </li>
                                    </ul>
                                    <!-- Product Meta End -->

                                    <!-- Product Shear Start -->
                                    <div class="product-share">
                                        <a href="#"><i class="lastudioicon-b-facebook"></i></a>
                                        <a href="#"><i class="lastudioicon-b-twitter"></i></a>
                                        <a href="#"><i class="lastudioicon-b-pinterest"></i></a>
                                        <a href="#"><i class="lastudioicon-b-instagram"></i></a>
                                    </div>
                                    <!-- Product Shear End -->

                                </div>
                                <!-- Product Summery End -->

                            </div>
                        </div>
                        <!-- Single Product Top Area End -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="quickview-product-modal modal fade" id="modalCart">
        <div class="modal-dialog modal-dialog-centered mw-100">
            <div class="custom-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="lastudioicon lastudioicon-e-remove"></i>
                </button>
                <div class="modal-body">
                    <i class="dlicon files_check"></i> Added To Cart Successfully!
                </div>
            </div>
        </div>
    </div>

    <div class="quickview-product-modal modal fade" id="modalWishlist">
        <div class="modal-dialog modal-dialog-centered mw-100">
            <div class="custom-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="lastudioicon lastudioicon-e-remove"></i>
                </button>
                <div class="modal-body">
                    <i class="dlicon files_check"></i> Added To Wishlist Successfully!
                </div>
            </div>
        </div>
    </div>

    <div class="quickview-product-modal modal fade" id="modalCompare">
        <div class="modal-dialog modal-dialog-centered mw-100">
            <div class="custom-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="lastudioicon lastudioicon-e-remove"></i>
                </button>
                <div class="modal-body">
                    <i class="dlicon files_check"></i> Added To Compare Successfully!
                </div>
            </div>
        </div>
    </div>

    <!-- JS Vendor, Plugins & Activation Script Files -->

    <!-- Vendors JS -->
    <script src="assets/js/vendor/modernizr-3.11.7.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Plugins JS -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/countdown.min.js"></script>
    <script src="assets/js/ion.rangeSlider.min.js"></script>
    <script src="assets/js/lightgallery.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/ajax.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>

    <!-- Activation JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/starRating.js"></script>

    <!-- Toast js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield('script')
    
    @if (Session::has('ok'))
        <script>
            $.toast({
                heading: 'Thành công',
                text: "{{ Session::get('ok') }}",
                showHideTransition: 'fade',
                position: 'top-center',
                icon: 'success'
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            $.toast({
                heading: 'Thành công',
                text: "{{ Session::get('error') }}",
                showHideTransition: 'fade',
                position: 'top-center',
                icon: 'error'
            })
        </script>
    @endif

    {{-- success_login --}}
    @if (Session::has('success_login'))
        <script>
            $.toast({
                heading: 'Thành công',
                text: "{{ Session::get('success_login') }}",
                showHideTransition: 'fade',
                position: 'top-center',
                icon: 'success'
            })
        </script>
    @endif

    {{-- Update profile --}}
    @if (Session::has('no_update'))
        <script>
            $.toast({
                heading: 'Không thành công',
                text: "{{ Session::get('no_update') }}",
                showHideTransition: 'fade',
                position: 'top-center',
                icon: 'warning'
            })
        </script>
        
    @endif
    @if (Session::has('update'))
        <script>
            $.toast({
                heading: 'Thành công',
                text: "{{ Session::get('update') }}",
                showHideTransition: 'fade',
                position: 'top-center',
                icon: 'success'
            })
        </script>
        
    @endif

    {{-- change_password --}}
    @if (Session::has('change_password'))
        <script>
            $.toast({
                heading: 'Thành công',
                text: "{{ Session::get('change_password') }}",
                showHideTransition: 'fade',
                position: 'top-center',
                icon: 'success'
            })
        </script>
        
    @endif
    @if (Session::has('no_change_password'))
        <script>
            $.toast({
                heading: 'không thành công',
                text: "{{ Session::get('no_change_password') }}",
                showHideTransition: 'fade',
                position: 'top-center',
                icon: 'warning'
            })
        </script>
        
    @endif
</body>


<!-- Mirrored from htmldemo.net/bakerfresh/bakerfresh/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jul 2024 09:34:16 GMT -->
</html>