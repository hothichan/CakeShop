<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\cartItem;
use App\Models\category;
use App\Models\Favorited;
use App\Models\order;
use App\Models\orderDetail;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $itemsList = product::orderBy('name', 'ASC')->take(8)->get();
        $pastryList = product::where('category_id', 12)->take(8)->get();
        $muffinList = product::where('category_id', 15)->take(8)->get();
        $waffleList = product::where('category_id', 13)->take(8)->get();
        $cupcakeList = product::where('category_id', 14)->take(8)->get();
        return view('home.index', compact('itemsList', 'pastryList', 'muffinList', 'cupcakeList', 'waffleList'));
    }
    public function contact() {
        return view('home.contact');
    }
    public function blog() {
        return view('home.blog');
    }

    public function cart() {
        return view('home.cart');
    }

    public function add_to_cart(Request $request) {
        if(Auth::check()) {
            $cart = cart::firstOrCreate([
                'user_id' => auth()->id(),
            ]);
            $cartItem = cartItem::where([
                'product_id' => $request->product_id,
                'cart_id' => $cart->id,
            ])->first();
            if($cartItem) {
                $cartItem->quantity++;
                $cartItem->save();
            } else {
                cartItem::create([
                    'product_id' => $request->product_id,
                    'cart_id' => $cart->id,
                    'quantity' => 1,
                ]);
            }
            return response()->json(['message' => 'Đã thêm vào giỏ hàng'], 200);
        }
        return response()->json(['error' => 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng'], 403);

    }
    public function delete_cart(Request $request) {
        $cartItem = cartItem::where('id', $request->item_cart_id)->first();
        if($cartItem->delete()) {
            $user_cart_list = cart::where('user_id', auth()->id())->first();
            $view =  view('partials.cartList', compact('user_cart_list'))->render();
            return response()->json(['message' => 'Đã xóa khỏi giỏ hàng', 'html' => $view], 200);
        } else {
            return response()->json(['error' => 'Chưa thể xóa sản phẩm'], 403);
        }
    }
    public function clear_cart($cart_id) {
        cartItem::where([
            'cart_id' => $cart_id,
        ])->delete();
        return redirect()->back()->with('ok', 'Đã xóa giỏ hàng');
    }

    public function checkout() {
        
        return view('home.checkout');
    }
    public function handle_checkout(Request $request) {
        $auth = auth()->user();
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' =>'required|email',
            'address' => 'required',
        ], [
            'name.required' => 'Tên không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'address.required' => 'Địa chỉ không được để trống',
        ]);

        $orderData = $request->only(['name', 'phone', 'email', 'address']);
        $orderData['user_id'] = auth()->user()->id;
        $orderData['status'] = 'Chờ xác nhận';
        if($order = order::create($orderData)) {
            foreach($auth->carts->items as $item) {
                $dataDetail = [
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price * $item->quantity,
                ];
                orderDetail::create($dataDetail);
            }
            $auth->carts->items()->delete();
            return redirect()->route('home')->with('ok', 'Đặt hàng thành công');
        }

    }

    public function favorited(Request $request) {
        if(!Auth::check()) {
            return response()->json(['error' => 'Đã xóa khỏi danh sách yêu thích'], 403);
        }
        $data = [
            'product_id' => $request->product_id,
            'user_id' => auth()->id()
        ];
        $favorited = Favorited::where(['user_id' => auth()->id(), 'product_id' => $request->product_id])->first();
        if($favorited) {
            $favorited->delete();
            return response()->json(['message' => 'Đã xóa khỏi danh sách yêu thích'], 200);
        }
        Favorited::create($data);
        return response()->json(['message' => 'Đã thêm vào danh sách yêu thích'], 200);
    }

    
}