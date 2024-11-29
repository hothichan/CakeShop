@extends('master.main')

@section('main')

    <!-- Breadcrumb Section Start -->
    <div
        class="breadcrumb"
        data-bg-image="assets/images/bg/breadcrumb-bg.jpg"
    >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="breadcrumb_title">Chi tiết {{$product->name}}</h1>
                        <ul class="breadcrumb_list">
                            <li><a href="{{route('home')}}">Trang chủ</a></li>
                            <li>Chi tiết {{$product->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Single Product Section Start -->
    <div class="section section-margin-top section-padding-03">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-0 col-md-10 offset-md-1">
                    <!-- Product Details Image Start -->
                    <div
                        class="product-details-img d-flex overflow-hidden flex-row"
                    >
                        <!-- Single Product Image Start -->
                        <div
                            class="single-product-vertical-tab swiper-container order-2"
                        >
                            <div
                                class="swiper-wrapper popup-gallery"
                                id="popup-gallery"
                            >
                                <a
                                    class="swiper-slide h-auto"
                                    href="uploads/product/{{$product->image}}"
                                >
                                    <img
                                        class="w-100"
                                        src="uploads/product/{{$product->image}}"
                                        alt="Product"
                                    />
                                </a>
                            </div>

                            <!-- Swiper Pagination Start -->
                            <!-- <div class="swiper-pagination d-none"></div> -->
                            <!-- Swiper Pagination End -->

                            <!-- Next Previous Button Start -->
                            <div
                                class="swiper-button-vertical-next swiper-button-next"
                            >
                                <i class="lastudioicon-arrow-right"></i>
                            </div>
                            <div
                                class="swiper-button-vertical-prev swiper-button-prev"
                            >
                                <i class="lastudioicon-arrow-left"></i>
                            </div>
                            <!-- Next Previous Button End -->
                        </div>
                        <!-- Single Product Image End -->

                        <!-- Single Product Thumb Start -->
                        <div
                            class="product-thumb-vertical overflow-hidden swiper-container order-1"
                        >
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img
                                        src="uploads/product/{{$product->image}}"
                                        alt="Product"
                                    />
                                </div>
                            </div>

                            <!-- Swiper Pagination Start -->
                            <!-- <div class="swiper-pagination d-none"></div> -->
                            <!-- Swiper Pagination End -->

                            <!-- Next Previous Button Start -->
                            <!-- 
                            <div class="swiper-button-vertical-next  swiper-button-next"><i class="lastudioicon-right-arrow"></i></div>
                            <div class="swiper-button-vertical-prev swiper-button-prev"><i class="lastudioicon-left-arrow"></i></div> 
                        -->
                            <!-- Next Previous Button End -->
                        </div>
                        <!-- Single Product Thumb End -->
                    </div>
                    <!-- Product Details Image End -->
                </div>
                <div class="col-lg-6">
                    <!-- Product Summery Start -->
                    <div class="product-summery position-relative">
                        <!-- Product Head Start -->
                        <div class="product-head mb-3" style="align-items: start;">
                            <!-- Category Start -->
                            <div>
                                <p>
                                    <span class="product-head-price">{{$product->category->name}}</span>
                                </p>
                                <!-- Category End -->
                                <!-- Name Start -->
                                <p style="margin-top: 12px;">
                                    Loại bánh <br><span class="product-head-price">{{$product->name}}</span>
                                </p>
                                <!-- name End -->
                            </div>
                            
                            <!-- Rating Start -->
                            <div class="review-rating" style="align-items: start; flex-direction: column;">
                                
                                <span class="review-rating-bg">
                                    <span
                                        class="review-rating-active"
                                        style="width: {{ $product->average_rating }}%"
                                    ></span>
                                </span>
                                <a href="#/" class="review-rating-text"
                                    >({{$product->reviews->count()}} Review)</a
                                >
                                
                                <!-- Price Start -->
                                <p >
                                    <span class="product-head-price">{{$product->price}}</span> VNĐ
                                </p>
                                <!-- Price End -->
                            </div>
                            <!-- Rating End -->
                        </div>
                        <!-- Product Head End -->

                        <!-- Description Start -->
                        <p class="desc-content">
                            {{$product->description}}
                        </p>
                        <!-- Description End -->

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
                                        <button class="addToCart btn btn-dark btn-hover-primary"
                                            data-product_id= "{{$product->id}}" 
                                            data-url= "{{ route('home.add_to_cart') }}" 
                                        >Thêm giỏ hàng</button>
                                    </div>
                                </div>
                                <!-- Cart Button End -->
                            </li>
                            <li>
                                <!-- Action Button Start -->
                                <div class="actions">
                                    <button class="favorited shadow-1 labtn-icon-wishlist" 
                                        data-product_id= "{{$product->id}}"
                                        data-url="{{route('home.favorited')}}"
                                        style="border: none;{{$product->favorited ? "background-color: #bc8157" : "background-color: #ffffff"}}; font-size: 16px; width: 38px; height: 38px; border-radius: 50%"
                                    >
                                    <i class="lastudioicon-heart-2"></i>
                                    
                                    </button>
                                    
                                    <a
                                        href="#/"
                                        title="Compare"
                                        class="action wishlist"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalCompare"
                                        ><i
                                            class="lastudioicon-ic_compare_arrows_24px"
                                        ></i
                                    ></a>
                                </div>
                                <!-- Action Button End -->
                            </li>
                        </ul>
                        

                        <!-- Product Shear Start -->
                        <div class="product-share">
                            <a href="#"
                                ><i class="lastudioicon-b-facebook"></i
                            ></a>
                            <a href="#"
                                ><i class="lastudioicon-b-twitter"></i
                            ></a>
                            <a href="#"
                                ><i class="lastudioicon-b-pinterest"></i
                            ></a>
                            <a href="#"
                                ><i class="lastudioicon-b-instagram"></i
                            ></a>
                        </div>
                        <!-- Product Shear End -->
                    </div>
                    <!-- Product Summery End -->
                </div>
            </div>

            <div class="row section-margin">
                <!-- Single Product Tab Start -->
                <div class="col-lg-12 single-product-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="profile-tab"
                                data-bs-toggle="tab"
                                href="#connect-2"
                                role="tab"
                                aria-selected="false"
                                >Reviews ({{$product->reviews->count()}})</a
                            >
                        </li>
                    </ul>
                    <div class="tab-content mb-text" id="myTabContent">
                        <div
                            class="tab-pane fade show active"
                            id="connect-2"
                            role="tabpanel"
                            aria-labelledby="profile-tab"
                        >
                            <!-- Start Single Content -->
                            <div  class="review">
                                <!-- Review Top Start -->
                                <div id="comments_prod" class="review-top align-items-center">
                                    @foreach ($reviews as $review)
                                        <!-- Review Details Start -->
                                        <div class="review_details ms-3 mb-5">
                                            <!-- Review Title & Date Start -->
                                            <div
                                                class="review-title-date d-flex"
                                            >
                                                <h5 class="title me-1">
                                                    {{$review->user->name}} 
                                                </h5>
                                                <span> - {{$review->created_at->format('d/m/Y h:i A')}}</span>
                                            </div>
                                            <!-- Review Title & Date End -->
                                            <!-- Rating Start -->
                                            <div class="review-rating mb-2">
                                                <span class="review-rating-bg">
                                                    <span
                                                        class="review-rating-active"
                                                        style="width: {{$review->rating/5*100}}%"
                                                    ></span>
                                                </span>
                                            </div>
                                            <!-- Rating End -->
                                            <p>
                                                {{$review->comment}}
                                            </p>
                                        </div>
                                        <!-- Review Details End -->
                                    @endforeach
                                    <!-- Hiển thị liên kết phân trang -->
                                    <div class="pagination">
                                        {{ $reviews->links() }}
                                    </div>
                                </div>
                                <!-- Review Top End -->

                                <!-- Comments ans Replay Start -->
                                <div
                                    class="comments-area comments-reply-area"
                                >
                                    <div class="row">
                                        <div class="col-lg-12 col-custom ">
                                            <h5 class="title mb-2">
                                                Thêm đánh giá của bạn
                                            </h5>
                                            <form
                                                id="comments_prod"
                                                action=""
                                                class="comments-area_form"
                                            >
                                                <div class="stars">
                                                    <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                                                    <label class="star star-5" for="star-5"></label>
                                                    <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                                                    <label class="star star-4" for="star-4"></label>
                                                    <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                                                    <label class="star star-3" for="star-3"></label>
                                                    <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                                                    <label class="star star-2" for="star-2"></label>
                                                    <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                                                    <label class="star star-1" for="star-1"></label>
                                                </div>
                                                <!-- Comment Texarea Start -->
                                                <div class="mb-3">
                                                    <label>Nội dung</label>
                                                    <textarea
                                                        class="comment_content comments-area_textarea"
                                                        required="required"
                                                    ></textarea>
                                                </div>
                                                <!-- Comment Texarea End -->

                                                <!-- Comment Submit Button Start -->
                                                <div
                                                    class="comment-form-submit"
                                                >
                                                    <button
                                                        class="review_btn btn btn-dark btn-hover-primary"
                                                        data-url="{{route('review.comment')}}"
                                                        data-product_id="{{$product->id}}"
                                                    >
                                                        Gửi
                                                    </button>
                                                </div>
                                                <!-- Comment Submit Button End -->
                                            </form>
                                            <!-- Comment form End -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Comments ans Replay End -->
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
                <!-- Single Product Tab End -->
            </div>
        </div>
    </div>
    <!-- Single Product Section End -->

    <!-- Product Section Strat -->
    <div class="section-padding-03 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Title Strat -->
                    <div class="section-title">
                        <h2 class="section-title__title">
                            Sản phẩm liên quan
                        </h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>
            <!-- Product Active Strat -->
            <div class="tab-pane fade show active" id="tab1">
                <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1 mb-n50">
                    @foreach ($relatedProduct as $productItem)
                        <div class="col mb-50">
                            <!-- Product Item Start -->
                            <div class="product-item text-center">
                                <div class="product-item__badge">Hot</div>
                                <div class="product-item__image border w-100">
                                    <a href="{{ route('shop.details', $productItem->id) }}"><img width="350" height="350" src="uploads/product/{{$productItem->image}}" alt="Product"></a>
                                    <ul class="product-item__meta">
                                        <li class="product-item__meta-action">
                                            <a class="shadow-1 labtn-icon-quickview" href="#/" data-bs-tooltip="tooltip" data-bs-placement="top" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleProductModal"></a>
                                        </li>
                                        <li class="product-item__meta-action">
                                            <a class="shadow-1 labtn-icon-cart" href="#/" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#modalCart"></a>
                                        </li>
                                        <li class="product-item__meta-action">
                                            <a class="shadow-1 labtn-icon-wishlist" href="#/" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to wishlist" data-bs-toggle="modal" data-bs-target="#modalWishlist"></a>
                                        </li>
                                        <li class="product-item__meta-action">
                                            <a class="shadow-1 labtn-icon-compare" href="#/" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to compare" data-bs-toggle="modal" data-bs-target="#modalCompare"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-item__content pt-5">
                                    <h5 class="product-item__title"><a href="{{ route('shop.details', $productItem->id) }}">{{ $productItem->name }}</a></h5>
                                    <span class="product-item__price">{{ $productItem->price }}</span>
                                </div>
                            </div>
                            <!-- Product Item End -->
                        </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Product Active End -->
        </div>
    </div>
    <!-- Product Section End -->

@stop()