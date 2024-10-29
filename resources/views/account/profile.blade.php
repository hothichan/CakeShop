@extends('account.index')
@section('route')
    Thông tin cá nhân
@stop()
@section('menu')
    <div class="col-lg-4 col-12">
        <ul class="my-account-tab-list nav">
            <li><a href="#account-info" class="active" ><i class="lastudioicon-home-2"></i> Thông tin cá nhân</a></li>
            
        </ul>
    </div>
@stop()
@section('content')
    <div  id="account-info">
        <div class="myaccount-content account-details">
            <div class="account-details-form">
                <form action="" method="POST">
                    @csrf
                    <div class="row g-4">
                        <legend>Thông tin</legend>
                        <div class="col-12">
                            <label for="email">Tên người dùng <abbr class="required">*</abbr></label>
                            <input class="form-field" type="text" id="name" value="{{ auth()->user()->name }}" name="name">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="email">Email <abbr class="required">(Không thể thay đổi)</abbr></label>
                            <input class="form-field" type="email" id="email" value="{{ auth()->user()->email }} " name="email" readonly >
                        </div>
                        <div class="col-12">
                            <label for="display-name">Số điện thoại <abbr class="required">*</abbr></label>
                            <input class="form-field" type="text" id="phone" value="{{ auth()->user()->phone }}" name="phone">
                            @error('phone')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="email">Địa chỉ <abbr class="required">*</abbr></label>
                            <input class="form-field" type="text" id="address" value="{{ auth()->user()->address }} " name="address">
                            @error('address')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-12">
                            <button type="submit" name="submit_bottom" value="profile" class="btn btn-dark btn-primary-hover">Lưu thông tin</button>
                        </div>
                    </div>
                </form>
                <form action="" class="mt-4" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-12">
                            <fieldset>
                                <legend>Thay đổi mật khẩu</legend>
                                <div class="row g-4">
                                    <div class="col-12">
                                        <label for="current-pwd">Mật khẩu hiện tại</label>
                                        <input class="form-field" type="password" id="current-pwd" name="old_password">
                                        @error('old_password')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="new-pwd">Mật khẩu mới</label>
                                        <input class="form-field" type="password" id="new-pwd" name="new_password">
                                        @error('new_password')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="confirm-pwd">Nhập lại mật khẩu</label>
                                        <input class="form-field" type="password" id="confirm-pwd" name="confirm_new_password">
                                        @error('confirm_new_password')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-dark btn-primary-hover" type="submit" name="submit_bottom" value="change_password">Đổi mật khẩu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop()