@extends('account.index')
@section('route')
    Sản phẩm yêu thích
@stop()
@section('menu')
    <div class="col-lg-4 col-12">
        <ul class="my-account-tab-list nav">
            <li><a href="#orders" class="active"><i class="dlicon files_notebook"></i> Sản phẩm yêu thích</a></li>
            
        </ul>
    </div>
@stop()
@section('content')
    <!-- Single Tab Content Start -->
    <div id="orders">
        <div class="myaccount-content order">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($favorited as $fav)
                            <tr>
                                <td>{{$fav->product->name}}</td>
                                <td>
                                    <img src="uploads/product/{{$fav->product->image}}" alt=""
                                    style="width: 50px; height: 50px">
                                </td>
                                <td><a href="{{route('shop.details', $fav->product_id)}}"><b>View</b></a></td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Single Tab Content End -->

@stop()