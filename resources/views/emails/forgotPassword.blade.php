<h1>Xin chào {{ $user->email }}</h1>
<p>Bạn muốn lấy lại mật khẩu?</p>
<a href="{{ route('account.reset_password', $token)}}">Bấm vào đây để lấy lại mật khẩu</a>