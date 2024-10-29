<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Đăng nhập</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100 box-area0 " style="font-family:'Edu NSW ACT Foundation';">
        <div class="row border rounded-5 p-3 bg-while shadow box-area1 w-50">
            <h1 class="text-center " >Đăng nhập</h1>
           <form action="" method="POST">
                @csrf
               <div class="form-floating mb-1 mt-1">
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                    <label for="email">Email<span>*</span></label>
                    @error('email')
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
               
               <div>
                    @if (Session::has('warning'))
                        <span style="color: red">{{ Session::get('warning') }}</span>
                    @endif
                    @if (Session::has('no_confirm_email'))
                        <span style="color: red">{{ Session::get('no_confirm_email') }}</span>
                    @endif
                    <button class="btn btn-lg btn-primary w-100 fs-6" type="submit">Đăng nhập</button>
                    <p>Bạn chưa có tài khoản? <a href="{{ route('account.register') }}">Đăng ký</a> </p>
                    <p>Bạn quên mật khẩu? <a href="{{ route('account.forgot') }}">Lấy lại mật khẩu</a> </p>
                    <a href="{{ route('home') }}">Quay về trang chủ</a>
               </div>
           </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" ></script>

    @if (Session::has('confirm_email'))
        <script>
            $.toast({
                heading: 'Thành công',
                text: "{{ Session::get('confirm_email') }}",
                showHideTransition: 'fade',
                position: 'top-center',
                icon: 'success'
            })
        </script>
    @endif
    @if (Session::has('reset_password'))
        <script>
            $.toast({
                heading: 'Thành công',
                text: "{{ Session::get('reset_password') }}",
                showHideTransition: 'fade',
                position: 'top-center',
                icon: 'success'
            })
        </script>
        
    @endif
    @if (Session::has('success_register'))
        <script>
            $.toast({
                heading: 'Thành công',
                text: "{{ Session::get('success_register') }}",
                showHideTransition: 'fade',
                position: 'top-center',
                icon: 'success'
            })
        </script>
    @endif
    @if (Session::has('forgot_password'))
        <script>
            $.toast({
                heading: 'Thành công',
                text: "{{ Session::get('forgot_password') }}",
                showHideTransition: 'fade',
                position: 'top-center',
                icon: 'success'
            })
        </script>
    @endif
</body>
</html>