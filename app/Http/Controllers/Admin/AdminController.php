<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\orderDetail;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.home');
    }

    public function users() {
        $users = User::where('role', 0)->orderBy('name', 'DESC')->paginate(10);
        return view('admin.users.index', compact('users'));
    }
    public function order_user($user_id) {
        $orders = order::where('user_id', $user_id)->orderBy('created_at', 'DESC')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function orders() {
        $orders = order::orderBy('created_at', 'DESC')->get();
        return view('admin.orders.index', compact('orders'));
    }
    
    public function details(order $order) {
        $details = orderDetail::where('order_id', $order->id)->get();
        return view('admin.orders.orderDetails', compact('details', 'order'));
    }
    public function confirm_order(order $order) {
        if($order->update(['status'=> 'Đã xác nhận'])) {
            return redirect()->route('admin.orders')->with('success', 'Đã xác nhận đơn hàng');
        }
        return redirect()->back()->with('error', 'Xác nhận đơn hàng không thành công');
    }
}
