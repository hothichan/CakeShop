<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Mail\VerifyAccount;
use App\Models\Favorited;
use App\Models\order;
use App\Models\orderDetail;
use App\Models\passwordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Stringable;

class AccountController extends Controller
{
    public function index() {

        return view('account.index');
    }
    public function login() {
        return view('account.login');
    }
    public function check_login(Request $request) {
        $request->validate([
            'email' =>'required|email|exists:users',
            'password' => 'required',
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.exists' => 'Email không tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
        ]);

        $data = $request->only(['email', 'password']);
        $check = auth()->attempt($data);
        if($check) {
            if(auth()->user()->role === 0) {
                if(auth()->user()->email_verified_at === null) {
                    auth()->logout();
                    return redirect()->back()->with('no_confirm_email', 'Vui lòng xác nhận email để đăng nhập');
                }
                $name = auth()->user()->name;
                return redirect()->route('home')->with('ok', "Chào mừng {$name}");
            } 
            return redirect()->route('admin.home')->with('ok', 'Chào mừng quản trị viên');
        }
        return redirect()->back()->with('warning', 'Tài khoản hoặc mật khẩu không đúng');
    }
    public function register() {
        return view('account.register');
    }
    public function check_register(Request $request) {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' =>'required|email|unique:users',
            'address' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ], [
            'name.required' => 'Tên không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'address.required' => 'Địa chỉ không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'confirm_password.required' => 'Xác nhận mật khẩu không được để trống',
            'confirm_password.same' => 'Mật khẩu không khớp'
        ]);

        $data = $request->only(['name','email','address','phone']);
        $data['password'] = bcrypt($request->password);

        if($acc = User::create($data)) {
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            return redirect()->route('account.login')->with('success_register', 'Đăng ký tài khoản thành công');
        }
        return redirect()->back()->with('warning', 'Đăng ký không thành công');
    }

    public function verify($email) {
        $acc = User::where('email', $email)->whereNull("email_verified_at")->firstOrFail();
        User::where('email', $email)->update(['email_verified_at' => date('Y-m-d H:i:s')]);
        return redirect()->route('account.login')->with('confirm_email', 'Xác nhận tài khoản thành công');
    }

    public function check_logout() {
        auth()->logout();
        return redirect()->route('account.login');
    }
    public function profile() {
        return view('account.profile');
    }
    public function check_profile(Request $request) {
        $auth = auth()->user();
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' =>'required|email|unique:users,email,' . $auth->id,
            'address' => 'required',
        ], [
            'name.required' => 'Tên không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'address.required' => 'Địa chỉ không được để trống',
        ]);
        $data = $request->only(['name','address','phone']);
        $acc = User::where('email', $auth->email)->update($data);
        if($acc) {
            return redirect()->back()->with('update', 'Cập nhật thông tin thành công');
        } 
        return redirect()->back()->with('no_update', 'Cập nhật thông tin không thành công');
    }

    public function order() {
        $orders = order::where('user_id', auth()->id())->get();
        return view('account.order', compact('orders'));
    }
    public function order_details($order_id) {
        $orderDetails = orderDetail::where('order_id', $order_id)->get();
        return view('account.orderDetails', compact('orderDetails'));
    }

    public function check_change_password(Request $request) {
        $auth = auth()->user();
        $request->validate([
            'old_password' => ['required', function($attr, $val, $fail) use($auth) {
                if(!Hash::check($val, $auth->password)) {
                    return $fail('Mật khẩu hiện tại không đúng');
                }
            }],
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|same:new_password'
        ], [
            'old_password.required' => 'Mật khẩu cũ không được để trống',
            'new_password.required' => 'Mật khẩu mới không được để trống',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự',
            'confirm_new_password.required' => 'Xác nhận mật khẩu mới không được để trống',
            'confirm_new_password.same' => 'Mật khẩu xác nhận không khớp'
        ]);
        $data['password'] = bcrypt($request->new_password);
        $acc = User::where('email', $auth->email)->update($data);
        if($acc) {
            auth()->logout();
            return redirect()->route('account.login')->with('change_password', 'Cập nhật mật khẩu thành công thành công! vui lòng đăng nhập lại');
        } 
        return redirect()->back()->with('no_change_password', 'Cập nhật thông tin không thành công');
    }

    public function forgot_password() {
        return view('account.forgot-password');
    }
    public function check_forgot_password(Request $request) {
        $request->validate([
            'email' => 'required|exists:users',
        ], [
            'email.required' => 'Bạn phải nhập email',
            'email.exists' => 'Email không tồn tại'
        ]);

        $user = User::where('email', $request->email)->first();

        $token = \Str::random(50);

        $data = [
            'email' => $user->email,
            'token' => $token
        ];

        if(passwordResetToken::create($data)) {
            Mail::to($request->email)->send(new ForgotPassword($user, $token));
            return redirect()->route('account.login')->with('forgot_password', 'Link lấy lại mật khẩu đã được gửi đến email của bạn');
        }

        return view('account.forgot-password');
    }
    public function reset_password() {
        return view('account.reset-password');
    }
    public function check_reset_password($token) {
        request()->validate([
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|same:new_password'
        ]);

        $tokenData = passwordResetToken::checkToken($token);
        $user = $tokenData->user;

        $data = [
            'password' => bcrypt(request('new_password'))
        ];
        $check = $user->update($data);
        if($check) {
            passwordResetToken::deleteToken($token);  // Xóa token sau khi sử dụng
            return redirect()->route('account.login')->with('reset_password', 'Mật khẩu đã được cập nhật thành công');
        }
        return  redirect()->back()->with('no_reset_password', 'Mật khẩu không được cập nhật thành công');
    }

    public function favorited() {
        $favorited = Favorited::where('user_id', auth()->user()->id)->get();
        return view('account.favorited', compact('favorited'));
    }
}
