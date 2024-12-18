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
                                <h3>Thêm mới loại sản phẩm</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div
                                class="dashboard_breadcam text-end"
                            >
                                <p>
                                    <a href="index.html"
                                        >Dashboard</a
                                    >
                                    <i
                                        class="fas fa-caret-right"
                                    ></i>
                                    login
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="modal-content cs_modal">
                                <div
                                    class="modal-header justify-content-center theme_bg_1"
                                >
                                    <h5
                                        class="modal-title text_white"
                                    >
                                        Thêm mới
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('category.update', $category->id) }}">
                                        @csrf @method('PUT')
                                        <div class>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="name"
                                                value="{{ $category->name }}"
                                            />
                                            @error('name')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class>
                                            <textarea name="description" id="" cols="30" rows="10">{{ $category->description }}</textarea>
                                            
                                        </div>
                                        <button type="submit"
                                            class="btn_1 full_width text-center">
                                            Sửa
                                        </button>
                                        <p>
                                            <a href="{{ route('category.index') }}"> Quay về</a>
                                        </p>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop()