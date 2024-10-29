@extends('master.main')

@section('main')

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb" data-bg-image="assets/images/bg/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="breadcrumb_title">Thanh toán</h1>
                        <ul class="breadcrumb_list">
                            <li><a href="{{route('home')}}">Trang chủ</a></li>
                            <li>Thanh toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Start -->
    <div class="shop-product-section section section-padding-03">
        <div class="container custom-container">
            <form action="" method="POST" class="checkout-form">
                @csrf
                <div class="row g-8">

                    <div class="col-lg-7">

                        <!-- Billing Address -->
                        <div id="billing-form">
                            <h4 class="mb-4">Thông tin nhận hàng</h4>
                            <div class="row row-cols-sm-2 row-cols-1 g-4">
                                <div class="col-sm-12">
                                    <label>Họ Tên</label>
                                    <input name="name" class="form-field" type="text">
                                    @error('name')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label>Địa chỉ email</label>
                                    <input name="email" class="form-field" type="email">
                                    @error('email')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label>Số điện thoại</label>
                                    <input name="phone" class="form-field" type="text">
                                    @error('phone')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label>Địa chỉ giao hàng</label>
                                    <input name="address" class="form-field" type="text">
                                    @error('address')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                {{-- <div class="col-sm-12 d-flex flex-wrap gap-6">
                                    <div class="form-check m-0">
                                        <input class="form-check-input" type="checkbox" id="create_account">
                                        <label class="form-check-label" for="create_account">Create an Acount?</label>
                                    </div>
                                    <div class="form-check m-0">
                                        <input class="form-check-input" type="checkbox" id="shiping_address" data-toggle-shipping="#shipping-form">
                                        <label class="form-check-label" for="shiping_address">Ship to Different Address</label>
                                    </div>
                                </div> --}}
                            </div>

                        </div>

                        <!-- Shipping Address -->
                        {{-- <div id="shipping-form" class="mt-md-8 mt-6">
                            <h4 class="mb-4">Shipping Address</h4>
                            <div class="row row-cols-sm-2 row-cols-1 g-4">
                                <div class="col">
                                    <label>First Name*</label>
                                    <input class="form-field" type="text">
                                </div>
                                <div class="col">
                                    <label>Last Name*</label>
                                    <input class="form-field" type="text">
                                </div>
                                <div class="col">
                                    <label>Email Address*</label>
                                    <input class="form-field" type="email">
                                </div>
                                <div class="col">
                                    <label>Phone no*</label>
                                    <input class="form-field" type="text">
                                </div>
                                <div class="col-sm-12">
                                    <label>Company Name</label>
                                    <input class="form-field" type="text">
                                </div>
                                <div class="col-sm-12">
                                    <label>Address*</label>
                                    <input class="form-field" type="text" placeholder="Address line 1">
                                </div>
                                <div class="col-sm-12">
                                    <input class="form-field" type="text" placeholder="Address line 2">
                                </div>
                                <div class="col">
                                    <label>Country*</label>
                                    <div class="select-wrapper">
                                        <select class="form-field">
                                            <option>Bangladesh</option>
                                            <option>China</option>
                                            <option>country</option>
                                            <option>India</option>
                                            <option>Japan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Town/City*</label>
                                    <input class="form-field" type="text">
                                </div>
                                <div class="col">
                                    <label>State*</label>
                                    <input class="form-field" type="text">
                                </div>
                                <div class="col">
                                    <label>Zip Code*</label>
                                    <input class="form-field" type="text">
                                </div>
                            </div>
                        </div> --}}

                    </div>

                    <div class="col-lg-5">

                        <!-- Checkout Summary Start -->
                        <div class="checkout-box">

                            <h4 class="mb-4">Tổng số hàng</h4>

                            <table class="checkout-summary-table table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                        $quantity = 0;
                                    @endphp
                                    @foreach ($user_cart->items as $item)
                                        @php
                                            $price = $item->product->price * $item->quantity;
                                            $total += $price;
                                            $quantity += $item->quantity
                                        @endphp
                                        <tr>
                                            <td>{{$item->product->name}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->product->price}}</td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="border-top">Tổng</th>
                                        <th class="border-top">{{$quantity}}</th>
                                        <th class="border-top">{{$total}}</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- Checkout Summary End -->

                        <!-- Payment Method Start -->
                        <div class="checkout-box">
                            @if($quantity !== 0) 
                                <h4 class="mb-4">Phương thức thanh toán</h4>
    
                                <div class="checkout-payment-method">
    
                                    <div class="single-method form-check">
                                        <input class="form-check-input" type="radio" id="payment_check" name="payment-method" checked>
                                        <label class="form-check-label" for="payment_check">Thanh toán bằng tiền mặt</label>
                                        <p>Vui lòng thanh toán sau khi nhận hàng</p>
                                    </div>
                                </div>
    
                                <button class="btn btn-dark btn-primary-hover rounded-0 mt-6">Đặt hàng</button>
                            @else
                                <h4 class="mb-4">Bạn chưa có sản phẩm nào trong giỏ hàng</h4>
                                <a href="{{route('shop.index')}}" class="btn btn-dark btn-primary-hover rounded-0 mt-6">Tới mua hàng</a>
                            @endif
                        </div>
                        <!-- Payment Method End -->

                    </div>

                </div>
            </form>
        </div>
    </div>
    <!-- Product Section End -->

@stop()