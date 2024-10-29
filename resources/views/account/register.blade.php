<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/styleDNvaTinTuc.css">

    <title>Document</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100 box-area0 " style="font-family:'Edu NSW ACT Foundation';">
        <div class="row border rounded-5 p-3 bg-while shadow box-area1 ">
            <h1 class="text-center " >Đăng ký tài khoản</h1>
            <form action="" method="POST">
              @csrf
              <div class="form-floating mb-1 mt-1">
                <input type="text" class="form-control" id="email" placeholder="Họ và tên" name="name">
                <label for="name">Họ và tên<span>*</span></label>
                @error('name')
                  <span style="color: red">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-floating  mb-1 mt-1">
                <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="phone">
                <label for="pwd">Số điện thoại<span>*</span></label>
                @error('phone')
                  <span style="color: red">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-floating mb-1 mt-1">
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                <label for="email">Email<span>*</span></label>
                @error('email')
                  <span style="color: red">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-floating mb-1 mt-1">
                <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
                <label for="address">Địa chỉ<span>*</span></label>
                @error('address')
                  <span style="color: red">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-floating mb-1 mt-1">
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                <label for="pwd">Mật khẩu<span>*</span></label>
                @error('password')
                  <span style="color: red">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-floating mb-1 mt-1 ml-3">
                <input type="password" class="form-control" id="email" placeholder="Enter email" name="confirm_password">
                <label for="pwd" class="form-floating">Nhập lại mật khẩu<span>*</span></label>
                @error('confirm_password')
                  <span style="color: red">{{ $message }}</span>
                @enderror
              </div>
              
              <div>
                <button class="btn btn-lg btn-primary w-100 fs-6" type="submit">Đăng ký</button>
                @if (Session::has('warning'))
                  <span style="color: red">{{ Session::get('warning') }}</span>
                @endif
                <p>Bằng việc đăng ký tài khoản bạn đã đồng ý với <a href="#">Điều khoản sử dụng</a> của chúng tôi!</p>
                <p>Bạn đã có tài khoản? <a href="{{ route('account.login') }}">Đăng nhập</a> </p>
                <a href="{{ route('home') }}">Quay về trang chủ</a>
              </div>
              
            </form>
            </div>
        </div>
    </div>
</body>
</html>