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