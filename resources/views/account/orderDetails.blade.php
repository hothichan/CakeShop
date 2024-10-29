@extends('account.index')

@section('menu')
    <div class="col-lg-4 col-12">
        <ul class="my-account-tab-list nav">
            <li><a href="#items" class="active"><i class="dlicon files_notebook"></i> Lịch sử mua hàng</a></li>
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
                            <th>Tên hàng</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderDetails as $item)
                            <tr>
                                <td>{{$item->product->name}}</td>
                                <td>
                                    <img src="uploads/product/{{$item->product->image}}" alt="" width="40" height="40">
                                </td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{route('account.order')}}">Quay về</a>
        </div>
    </div>
    <!-- Single Tab Content End -->

@stop()