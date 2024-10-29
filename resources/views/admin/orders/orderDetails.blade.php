@extends('admin.index')

@section('main')

    <div class="main_content_iner">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="dashboard_header mb_50">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dashboard_header_title">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <div>
                                <h4>Chi tiết đơn hàng </h4><br>
                                <div>
                                    <h3>Thông tin khách hàng</h3>
                                    <p><b>Tên khách hàng: </b>{{$order->name}}</p>
                                    <p><b>Số điện thoại: </b>{{$order->phone}}</p>
                                    <p><b>Địa chỉ: </b>{{$order->address}}</p>
                                    <p><b>Trạng thái đơn hàng: </b>{{$order->status}}</p>
                                </div>
                            </div>
                            <div class="box_right d-flex lms_block">
                                @if ($order->status === 'Chờ xác nhận')
                                    <div class="add_button ms-2">
                                        <a  href="{{route('admin.confirm', $order->id)}}"
                                            class="btn_1"
                                            >Xác nhận đơn hàng</a
                                        >
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="QA_table mb_30">
                            <table class="table lms_table_active col-6">
                                <h4>Danh sách sản phẩm</h4>
                                <thead>
                                    <tr>
                                        <th scope="col">Số thứ tự</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Giá tiền</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $i=1; 
                                    @endphp
                                    @foreach ($details as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop()
