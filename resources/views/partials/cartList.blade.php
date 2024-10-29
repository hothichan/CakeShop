<!-- Offcanvas Cart Items Start  -->
<ul class="offcanvas-cart-items">
    @foreach ($user_cart_list->items as $item)
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