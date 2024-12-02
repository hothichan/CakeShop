@extends('master.main')

@section('main')

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb" data-bg-image="assets/images/bg/breadcrumb-bg-5.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="breadcrumb_title">Thông tin</h1>
                        <ul class="breadcrumb_list">
                            <li><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li>Thông tin</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Start -->
    <div class="blog-sidebar blog-sidebar-right">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-12 section-padding-04">
                    <div class="blog-sidebar_mr">
                        <div class="blog-post">
                            <a href="blog-details.html" class="blog-post_thumb"><img src="assets/images/blog/blog-01.jpg" alt="Blog-Image"></a>
                            <div class="blog-post__content">
                                <ul class="blog-post__meta">
                                    <li><span>August 14, 2022</span></li>
                                </ul>
                                <h3 class="blog-post__title"><a href="blog-details.html">điều gì đó mới mẻ về bánh ngọt sẽ được phát triển vào năm 2022</a></h3>
                                <p class="blog-post__text">Những điều bạn nên biết về bánh ngọt. Đó là một ngày cuối tuần. Bệnh trong thực hành lâm sàng. Cho đến khi giá của chiếc nhẫn được tâng bốc. Thậm chí như một lớp thời gian. Một số trong đó là tôi.</p>
                                
                            </div>
                        </div>
                        <div class="blog-post">
                            <a href="blog-details.html" class="blog-post_thumb"><img src="assets/images/blog/blog-02.jpg" alt="Blog-Image"></a>
                            <div class="blog-post__content">
                                <ul class="blog-post__meta">
                                    <li><span>September 26, 2022</span></li>
                                </ul>
                                <h3 class="blog-post__title"><a href="blog-details.html">Một năm thay đổi của ngành ẩm thực</a></h3>
                                <p class="blog-post__text">Những điều bạn nên biết về bánh ngọt. Đó là một ngày cuối tuần. Bệnh trong thực hành lâm sàng. Cho đến khi giá của chiếc nhẫn được tâng bốc. Thậm chí như một lớp thời gian. Một số trong đó là tôi.</p>
                                
                            </div>
                        </div>
                        <div class="blog-post">
                            <a href="blog-details.html" class="blog-post_thumb"><img src="assets/images/blog/blog-03.jpg" alt="Blog-Image"></a>
                            <div class="blog-post__content">
                                <ul class="blog-post__meta">
                                    <li><span>June 02, 2022</span></li>
                                </ul>
                                <h3 class="blog-post__title"><a href="blog-details.html">Những điều bạn nên biết về bánh ngọt</a></h3>
                                <p class="blog-post__text">Những điều bạn nên biết về bánh ngọt. Đó là một ngày cuối tuần. Bệnh trong thực hành lâm sàng. Cho đến khi giá của chiếc nhẫn được tâng bốc. Thậm chí như một lớp thời gian. Một số trong đó là tôi.</p>
                                
                            </div>
                        </div>
                        

                        {{-- <div class="shop-bottombar mt-0">
                            <ul class="pagination">
                                <li class="disabled"><a href="#prev">←</a></li>
                                <li><a class="active" href="#page=1">1</a></li>
                                <li><a href="#page=2">2</a></li>
                                <li><a href="#page=3">3</a></li>
                                <li><a href="#page=4">4</a></li>
                                <li><a href="#page=5">5</a></li>
                                <li><a href="#next">→</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-12">
                    <div class="sidebars">
                        <div class="sidebars_inner">

                            <!-- Search Widget Start -->
                            {{-- <form action="#" class="sidebars_search">
                                <input type="text" placeholder="Search Here" class="sidebars_search__input">
                                <button class="sidebars_search__btn"><i class="lastudioicon-zoom-1"></i></button>
                            </form> --}}
                            <!-- Search Widget End -->

                            <!-- Category Widget Start -->
                            <div class="sidebars_widget">
                                <h3 class="sidebars_widget__title">Sản phẩm</h3>
                                <ul class="sidebars_widget__category">
                                    @foreach ($globalVariableCategory as $category)
                                        <li><a href="{{ route('shop.product', $category->id) }}">{{ $category->name }}</a></li>
                                        
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Category Widget End -->

                            <!-- Popular Post Widget Start -->
                            {{-- <div class="sidebars_widget">
                                <h3 class="sidebars_widget__title">Popular posts</h3>
                                <ul class="sidebars_widget__post">
                                    <!-- Single Post Start -->
                                    <li class="single-post">
                                        <a href="blog-details.html" class="single-post_thumb">
                                            <img src="assets/images/blog/blog-sidebar-01.jpg" alt="Sidebar-Image">
                                        </a>
                                        <div class="single-post_content">
                                            <span class="single-post_content__meta">October 24, 2022</span>
                                            <a href="blog-details.html" class="single-post_content__title">something new about pastry will be developed in 2022</a>
                                        </div>
                                    </li>
                                    <!-- Single Post End -->
                                    <!-- Single Post Start -->
                                    <li class="single-post">
                                        <a href="blog-details.html" class="single-post_thumb">
                                            <img src="assets/images/blog/blog-sidebar-02.jpg" alt="Sidebar-Image">
                                        </a>
                                        <div class="single-post_content">
                                            <span class="single-post_content__meta">October 19, 2022</span>
                                            <a href="blog-details.html" class="single-post_content__title">A year of change in the culinary industry</a>
                                        </div>
                                    </li>
                                    <!-- Single Post End -->
                                    <!-- Single Post Start -->
                                    <li class="single-post">
                                        <a href="blog-details.html" class="single-post_thumb">
                                            <img src="assets/images/blog/blog-sidebar-03.jpg" alt="Sidebar-Image">
                                        </a>
                                        <div class="single-post_content">
                                            <span class="single-post_content__meta">November 14, 2022</span>
                                            <a href="blog-details.html" class="single-post_content__title">Things you should know about cakes</a>
                                        </div>
                                    </li>
                                    <!-- Single Post End -->
                                </ul>
                            </div> --}}
                            <!-- Popular Post Widget End -->

                            <!-- Popular Post Widget Start -->
                            {{-- <div class="sidebars_widget">
                                <h3 class="sidebars_widget__title">Archives</h3>
                                <div class="select-wrapper">
                                    <select class="form-field">
                                        <option>January 2022</option>
                                        <option>February 2022</option>
                                        <option>March 2022</option>
                                        <option>April 2022</option>
                                        <option>May 2022</option>
                                    </select>
                                </div>
                            </div> --}}
                            <!-- Popular Post Widget End -->

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
                            <!-- Instagram Widget End -->

                            <!-- Tags Widget Start -->
                            {{-- <div class="sidebars_widget">
                                <h3 class="sidebars_widget__title">Tags</h3>
                                <ul class="sidebars_widget__tags">
                                    <li><a href="blog-details.html">Cake, </a></li>
                                    <li><a href="blog-details.html">Cupcake, </a></li>
                                    <li><a href="blog-details.html">Donut, </a></li>
                                    <li><a href="blog-details.html">Muffin, </a></li>
                                    <li><a href="blog-details.html">New, </a></li>
                                    <li><a href="blog-details.html">Waffle</a></li>
                                </ul>
                            </div> --}}
                            <!-- Tags Widget End -->

                            <!-- Banner Widget Start -->
                            {{-- <div class="sidebars_widget">
                                <a href="shop.html" class="sidebars_widget__banner">
                                    <img src="assets/images/banner/sidebarbanner.jpg" alt="banner-Image">

                                    <div class="banner-content">
                                        <span class="banner-content_title">Check it now</span>
                                    </div>
                                </a>
                            </div> --}}
                            <!-- Banner Widget End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Section End -->

@stop()