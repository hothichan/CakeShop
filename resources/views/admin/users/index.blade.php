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
                                    <h3>Loại sản phẩm</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div
                                    class="dashboard_breadcam text-end"
                                >
                                    <p>
                                        <a href="index.html"
                                            ></a
                                        >
                                        <i
                                            class="fas fa-caret-right"
                                        ></i>
                                        Sản phẩm
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Danh sách khách hàng</h4>
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
                                        <th scope="col">Tên khách hàng</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @php
                                        $i=1; 
                                    @endphp
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                <a
                                                    href="{{route('admin.order_user', $user->id)}}"
                                                    class="status_btn"
                                                    >Lịch sử mua hàng
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
