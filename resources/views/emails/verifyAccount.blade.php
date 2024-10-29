<h3>Xin chào: {{ $account->name }}</h3>
<p>Tài khoản của bạn chưa được kích hoạt</p>
<p>
    <a href="{{ route('account.verify', $account->email) }}">Bấm vào để kích hoạt tài khoản</a>
</p>