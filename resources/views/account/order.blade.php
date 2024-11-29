@extends('account.index')

@section('route')
    Lịch sử mua hàng
@stop()
@section('menu')
    <div class="col-lg-4 col-12">
        <ul class="my-account-tab-list nav">
            <li><a href="#orders" class="active"><i class="dlicon files_notebook"></i> Lịch sử mua hàng</a></li>
            
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
                            <th>Ngày mua</th>
                            <th>Trạng thái</th>
                            <th>Số Tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            @php
                                
                                $total = 0;
                            @endphp
                            @foreach ($order->orderDetails as $item)
                                @php
                                    $total += $item->price;
                                @endphp
                            @endforeach
                            <tr>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->status}}</td>
                                <td>{{$total}}</td>
                                <td><a href="{{route('account.orderDetails', $order->id)}}"><b>Chi tiết</b></a></td>
                                @if ($order->status === "Chờ xác nhận")
                                    <td><a href="{{route('home.cancelOrder', $order->id)}}" style="color: red"><b>Hủy đơn</b></a></td>
                                    
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Single Tab Content End -->

@stop()