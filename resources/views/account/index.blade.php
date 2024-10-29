@extends('master.main')

@section('main')

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb" data-bg-image="assets/images/bg/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="breadcrumb_title">Tài khoản</h1>
                        <ul class="breadcrumb_list">
                            <li><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li>@yield('route')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- My Account Section Start -->
    <div class="section section-padding-03">
        <div class="container custom-container">
            <div class="row g-lg-10 g-6">

                <!-- My Account Tab List Start -->
                @yield('menu')
                
                <!-- My Account Tab List End -->

                <!-- My Account Tab Content Start -->
                <div class="col-lg-8 col-12">
                    <div class="tab-content">
                        <!-- Single Tab Content Start -->
                        @yield('content')

                    </div>
                </div> <!-- My Account Tab Content End -->

            </div>
        </div>
    </div>
    <!-- My Account Section End -->

@stop()