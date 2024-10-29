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
                            <h4>Dánh sách đơn hàng</h4>
                            <div class="box_right d-flex lms_block">
                                <div class="serach_field_2">
                                    <div class="search_inner">
                                        <form Active="#">
                                            <div class="search_field">
                                                <input
                                                    type="text"
                                                    placeholder="Search content here..."
                                                />
                                            </div>
                                            <button type="submit">
                                                <i
                                                    class="ti-search"
                                                ></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="QA_table mb_30">
                            <table class="table lms_table_active">
                                <thead>
                                    <tr>
                                        <th scope="col">Số thứ tự</th>
                                        <th scope="col">Mã đơn hàng</th>
                                        <th scope="col">Mã khách hàng</th>
                                        <th scope="col">Số tiền</th>
                                        <th scope="col">Ngày đặt hàng</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @php
                                        $i=1; 
                                    @endphp
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->user_id}}</td>
                                            <td>{{number_format($order->totalPrice)}}</td>
                                            <td>{{$order->created_at->format('d/m/Y')}}</td>
                                            <td>{{$order->status}}</td>
                                            <td>
                                                <a
                                                    href="{{route('admin.details', $order->id)}}"
                                                    class="status_btn"
                                                    >Chi tiết đơn hàng
                                                </a>
                                            </td>
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
