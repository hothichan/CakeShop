@extends('master.main')

@section('main')

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb" data-bg-image="assets/images/bg/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="breadcrumb_title">Cart</h1>
                        <ul class="breadcrumb_list">
                            <li><a href="index.html">Home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Shop Cart Section Start -->
    <div class="section section-padding-03">
        <div class="container custom-container">
            <div class="row mb-n30">

                <div class="col-lg-8 col-12 mb-30">

                    <!-- Cart Table For Tablet & Up Devices Start -->
                    <div class="table-responsive">
                        <table class="cart-table table text-center align-middle mb-6 d-none d-md-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th class="title text-start">Product</th>
                                    <th class="price">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="border-top-0">
                                @foreach ($user_cart->items as $item)
                                    <tr>
                                        <th class="cart-remove">
                                            <a href="{{route('home.delete_cart', $item->id)}}" class="remove-btn"><i class="lastudioicon lastudioicon-e-remove"></i></a>
                                        </th>
                                        <th class="cart-thumb">
                                            <a href="{{route('shop.details', $item->product_id)}}">
                                                <img src="uploads/product/{{$item->product->image}}" alt="Croissant Italy Cake">
                                            </a>
                                        </th>
                                        <th class="text-start">
                                            <a href="{{route('shop.details', $item->product_id)}}">{{$item->product->name}}</a>
                                        </th>
                                        <td>{{$item->product->price}} VNĐ</td>
                                        <td class="text-center cart-quantity">
                                            <!-- Quantity Start -->
                                            <div class="quantity">
                                                <div class="cart-plus-minus border-0 mx-auto">
                                                    {{-- <div class="dec qtybutton">-</div> --}}
                                                        <input class="cart-plus-minus-box" value="{{$item->quantity}}" type="text">
                                                    {{-- <div class="inc qtybutton">+</div> --}}
                                                </div>
                                            </div>
                                            <!-- Quantity End -->
                                        </td>
                                        <td>{{$item->quantity * $item->product->price}} VNĐ</td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- Cart Table For Tablet & Up Devices End -->

                    <!-- Cart Table For Mobile Devices Start -->
                    <div class="cart-products-mobile d-md-none">
                        @foreach ($user_cart->items as $item)
                            <div class="cart-product-mobile">
                                <div class="cart-product-mobile-thumb">
                                    <a href="{{route('shop.details', $item->product_id)}}" class="cart-product-mobile-image"><img src="uploads/product/{{$item->product->image}}" alt="Croissant Italy Cake" width="90" height="103"></a>
                                    <a href="{{route('home.delete_cart', $item->id)}}" class="cart-product-mobile-remove"><i class="lastudioicon lastudioicon-e-remove"></i></a>
                                </div>
                                <div class="cart-product-mobile-content">
                                    <h5 class="cart-product-mobile-title"><a href="{{route('shop.details', $item->product_id)}}">{{$item->product->name}}</a></h5>
                                    <span class="cart-product-mobile-quantity">{{$item->quantity}} x {{$item->product->price}}</span>
                                    <span class="cart-product-mobile-total"><b>Tổng:</b> {{$item->quantity * $item->product->price}}</span>
                                    <!-- Quantity Start -->
                                    <div class="quantity">
                                        <div class="cart-plus-minus border-0"></div>
                                    </div>
                                    <!-- Quantity End -->
                                </div>
                            </div>  
                        @endforeach
                        
                    </div>
                    <!-- Cart Table For Mobile Devices End -->

                    @if ($user_cart->count() !== 0)
                        <!-- Cart Action Buttons Start -->
                        <div class="row justify-content-between gap-3">
                            <div class="col-auto"><a href="{{route('shop.index')}}" class="btn btn-outline-dark btn-primary-hover rounded-0">Continue Shopping</a></div>
                            <div class="col-auto d-flex flex-wrap gap-3">
                                {{-- <button class="btn btn-outline-dark btn-primary-hover rounded-0">Update Cart</button> --}}
                                <a href="{{route('home.clear_cart', $user_cart->id)}}" class="btn btn-outline-dark btn-primary-hover rounded-0">Clear Cart</a>
                            </div>
                        </div>
                        <!-- Cart Action Buttons End -->
                    @endif

                </div>

                <!-- Cart Totals Start -->
                <div class="col-lg-4 col-12 mb-30">
                    <div class="cart-totals">
                        <div class="cart-totals-inner">
                            <h4 class="title">Tổng tiền</h4>
                            <table class="table bg-transparent">
                                @php
                                    $price = 0;
                                    foreach ($user_cart->items as $item) {
                                        $price += $item->quantity * $item->product->price;
                                    }
                                @endphp
                                <tbody>
                                    <tr class="subtotal">
                                        <th class="sub-title">Tổng phụ</th>
                                        <td class="amount"><span >{{$price}}</span></td>
                                    </tr>
                                    <tr class="total">
                                        <th class="sub-title">Tổng tiền</th>
                                        <td class="amount"><strong>{{$price}}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{route('home.checkout')}}" class="btn btn-dark btn-hover-primary rounded-0 w-100">Thanh toán giỏ hàng</a>
                    </div>
                </div>
                <!-- Cart Totals End -->

            </div>
        </div>
    </div>
    <!-- Shop Cart Section End -->
@stop()