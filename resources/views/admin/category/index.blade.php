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
                                        Loại sản phẩm
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Bảng danh sách</h4>
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
                                <div class="add_button ms-2">
                                    <a
                                        href="{{ route('category.create')}}"
                                        class="btn_1"
                                        >Thêm mới</a
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="QA_table mb_30">
                            <table class="table lms_table_active">
                                <thead>
                                    <tr>
                                        <th scope="col">Số thứ tự</th>
                                        <th scope="col">Mã loại sả phẩm</th>
                                        <th scope="col">Tên loại sản phẩm</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <img src="uploads/category/{{ $category->image }}" alt="">
                                            </td>
                                            <td>{{ $category->description }}</td>
                                            <td>
                                                
                                                <form action="{{ route('category.destroy', $category->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('bạn có chắc muốn xóa loại sản phẩm có mã sản phẩm là {{$category->id}}')">
                                                    <a
                                                        href="{{ route('category.show', $category->id) }}"
                                                        class="status_btn"
                                                        >Chi tiết
                                                    </a>
                                                    @csrf @method('DELETE')
                                                    <button
                                                        class="status_btn"
                                                        style="background-color: red; 
                                                        font-weight: 400;
                                                        font-size: 14px;
                                                        border: none"
                                                        >Xóa
                                                    </button>
                                                </form>
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
