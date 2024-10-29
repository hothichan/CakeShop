@extends('master.main')

@section('main')

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb" data-bg-image="assets/images/bg/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="breadcrumb_title">Cửa hàng</h1>
                        <ul class="breadcrumb_list">
                            <li><a href="index.html">Trang chủ</a></li>
                            <li>Cửa hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Start -->
    <div class="shop-product-section sidebar-left overflow-hidden">
        <div class="container">
            <div class="row flex-md-row-reverse">
                <div class="col-md-8 section-padding-04">
                    <!-- Shop Top Bar Start -->
                    <div class="shop-topbar">

                        <div class="shop-topbar-item shop-topbar-left">
                        </div>

                        <div class="shop-topbar-right">
                            <div class="shop-topbar-item">
                                <select name="SortBy" id="SortBy" data-sort = "{{route('shop.item_sort')}}">
                                    {{-- <option value="manual">Sort by Rated</option>
                                    <option value="best-selling">Sort by Latest</option> --}}
                                    <option value="default">Theo giá</option>
                                    <option value="price-ascending">Tăng dần</option>
                                    <option value="price-descending">Giảm dần</option>
                                </select>
                            </div>

                        </div>

                    </div>
                    <!-- Shop Top Bar End -->
                    <!-- Product Section Start -->
                    <div id="listItem" class="row row-cols-xl-3 row-cols-lg-2 row-cols-sm-2 row-cols-1 mb-n50">
                        @foreach ($products as $prod)
                            <div class="col mb-50">
                                <!-- Product Item Start -->
                                <div class="product-item text-center">
                                    <div class="product-item__badge">Hot</div>
                                    <div class="product-item__image border w-100">
                                        <a href="{{ route('shop.details', $prod->id) }}"><img width="350" height="350" src="uploads/product/{{$prod->image}}" alt="Product"></a>
                                        <ul class="product-item__meta">
                                            <li class="product-item__meta-action">
                                                <button class="addToCart shadow-1 labtn-icon-cart"
                                                    data-product_id= "{{$prod->id}}" 
                                                    data-url= "{{ route('home.add_to_cart') }}" 
                                                ></button>
                                            </li>
                                            <li class="product-item__meta-action">
                                                <button class="favorited shadow-1 labtn-icon-wishlist" 
                                                    data-product_id= "{{$prod->id}}"
                                                    data-url="{{route('home.favorited')}}"
                                                    @if ($prod->favorited)
                                                        style="background-color: #bc8157"
                                                    @endif
                                                ></button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-item__content pt-5">
                                        <h5 class="product-item__title"><a href="{{ route('shop.details', $prod->id) }}">{{$prod->name}}</a></h5>
                                        <span class="product-item__price">{{$prod->price}}</span>
                                    </div>
                                </div>
                                <!-- Product Item End -->
                            </div>
                        @endforeach
                    </div>
                    <!-- Product Section End -->
                    <!-- Shop bottom Bar Start -->
                    <div class="shop-bottombar">
                        {{$products->appends(request()->all())->links()}}
                        {{-- <ul class="pagination">
                            <li class="disabled"><a href="#prev">←</a></li>
                            <li><a class="active" href="#page=1">1</a></li>
                            <li><a href="#page=2">2</a></li>
                            <li><a href="#page=3">3</a></li>
                            <li><a href="#page=4">4</a></li>
                            <li><a href="#page=5">5</a></li>
                            <li><a href="#next">→</a></li>
                        </ul> --}}
                    </div>
                    <!-- Shop bottom Bar End -->
                </div>
                <div class="col-md-4">
                    <div class="sidebars">
                        <div class="sidebars_inner">
                            <!-- Search Widget Start -->
                            <form action="#" class="sidebars_search">
                                <input type="text" placeholder="Search Here" class="name_item sidebars_search__input">
                                <button class="search_btn sidebars_search__btn" data-search_name="{{route('shop.search_name')}}"><i class="lastudioicon-zoom-1"></i></button>
                            </form>
                            <!-- Search Widget End -->

                            <!-- Category Widget Start -->
                            <div class="sidebars_widget">
                                <h3 class="sidebars_widget__title">Loại bánh</h3>
                                <ul class="sidebars_widget__category">
                                    <li><a href="{{route('shop.index')}}">Tất cả</a></li>

                                    @foreach ($globalVariableCategory as $cat )
                                        <li><a href="{{route('shop.product', $cat->id)}}">{{ $cat->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Category Widget End -->

                            <!-- Price Filter Widget Start -->
                            <div class="sidebars_widget">
                                <h3 class="sidebars_widget__title">Lọc giá</h3>
                                <div class="range-slider">
                                    <input type="text" class="js-range-slider" value="" />
                                </div>
                                <div class="extra-controls">
                                    <button class="price_filter extra-controls_btn"
                                        data-price_filter="{{route('shop.price_filter')}}"
                                    >Lọc</button>
                                    <div class="extra-controls_filter">
                                        <label>Price: </label>
                                        <input type="text" class="js-input-from" value="0" /> - <input type="text" class="js-input-to" value="0" />
                                    </div>
                                </div>
                            </div>
                            <!-- Price Filter Widget End -->

                            <!-- Popular Product Widget Start -->
                            <div class="sidebars_widget">
                                <h3 class="sidebars_widget__title">Popular products</h3>
                                <ul class="sidebars_widget__product">
                                    <!-- Single Product Start -->
                                    <li class="single-product">
                                        <a href="single-product.html" class="single-product_thumb">
                                            <img src="assets/images/product/sidebar-1.png" alt="Sidebar-Image">
                                        </a>
                                        <div class="single-product_content">
                                            <a href="single-product.html" class="single-product_content__title">Brownie</a>
                                            <span class="single-product_content__price">$4.99</span>
                                        </div>
                                    </li>
                                    <!-- Single Product End -->
                                    <!-- Single Product Start -->
                                    <li class="single-product">
                                        <a href="single-product.html" class="single-product_thumb">
                                            <img src="assets/images/product/sidebar-2.png" alt="Sidebar-Image">
                                        </a>
                                        <div class="single-product_content">
                                            <a href="single-product.html" class="single-product_content__title">Red Velvet</a>
                                            <span class="single-product_content__price">$4.99</span>
                                        </div>
                                    </li>
                                    <!-- Single Product End -->
                                    <!-- Single Product Start -->
                                    <li class="single-product">
                                        <a href="single-product.html" class="single-product_thumb">
                                            <img src="assets/images/product/sidebar-3.png" alt="Sidebar-Image">
                                        </a>
                                        <div class="single-product_content">
                                            <a href="single-product.html" class="single-product_content__title">Cream Muffin</a>
                                            <span class="single-product_content__price">$4.99</span>
                                        </div>
                                    </li>
                                    <!-- Single Product End -->
                                </ul>
                            </div>
                            <!-- Popular Product Widget End -->

                            <!-- Instagram Widget Start -->
                            <div class="sidebars_widget">
                                <h3 class="sidebars_widget__title">Instagram</h3>
                                <ul class="sidebars_widget__instagram">
                                    <li>
                                        <a class="instagram-thumb" href="#">
                                            <img src="assets/images/instagram/widget-insta-1.jpg" alt="Image">
                                            <i class="lastudioicon lastudioicon-b-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="instagram-thumb" href="#">
                                            <img src="assets/images/instagram/widget-insta-2.jpg" alt="Image">
                                            <i class="lastudioicon lastudioicon-b-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="instagram-thumb" href="#">
                                            <img src="assets/images/instagram/widget-insta-3.jpg" alt="Image">
                                            <i class="lastudioicon lastudioicon-b-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="instagram-thumb" href="#">
                                            <img src="assets/images/instagram/widget-insta-4.jpg" alt="Image">
                                            <i class="lastudioicon lastudioicon-b-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Section End -->

@stop()