<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('')->middleware(['admin.login:user'])->group(function() {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
    Route::get('/blog', [HomeController::class, 'blog'])->name('home.blog');

    // Shop
    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::post('/shop', [ShopController::class, 'price_filter'])->name('shop.price_filter');
    Route::post('/shop/search', [ShopController::class, 'search_item'])->name('shop.search_name');
    Route::get('/shop/{cat}', [ShopController::class, 'getProduct'])->name('shop.product');
    Route::get('/shop/details/{id}', [ShopController::class, 'productDetails'])->name('shop.details');

    //SortBy
    Route::post('/sort', [ShopController::class, 'item_sort'])->name('shop.item_sort');

    // Route cart
    Route::get('/cart', [HomeController::class, 'cart'])->name('home.cart');
    Route::post('/add_to_cart', [HomeController::class, 'add_to_cart'])->name('home.add_to_cart');
    Route::post('/delete_cart', [HomeController::class, 'delete_cart'])->name('home.delete_cart');
    Route::get('/clear_cart/{cart_id}', [HomeController::class, 'clear_cart'])->name('home.clear_cart');

    Route::get('/checkout', [HomeController::class, 'checkout'])->name('home.checkout');
    Route::post('/checkout', [HomeController::class, 'handle_checkout']);

    Route::post('favorited', [HomeController::class, 'favorited'])->name('home.favorited');

    //comment
    Route::post('/comment', [ReviewController::class, 'comment'])->name('review.comment');

});

Route::group(['prefix'=> '/account'], function() {
    Route::get('/index', [AccountController::class, 'index'])->name('account.index')->middleware('auth');

    //profile
    Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
    Route::post('profile', [AccountController::class, 'check_profile']);
    
    //order route
    Route::get('/order', [AccountController::class, 'order'])->name('account.order');
    Route::get('/order_details/{order_id}', [AccountController::class, 'order_details'])->name('account.orderDetails');

    Route::get('/verify-account/{email}', [AccountController::class, 'verify'])->name('account.verify');

    // Login 
    Route::get('/login', [AccountController::class, 'login'])->name('account.login');
    Route::post('/login', [AccountController::class, 'check_login']);
    
    // Logout
    Route::get('/logout', [AccountController::class, 'check_logout'])->name('account.logout');
    
    // Register
    Route::get('/register', [AccountController::class, 'register'])->name('account.register');
    Route::post('/register', [AccountController::class, 'check_register']);

    //forgot password
    Route::get('/forgot', [AccountController::class, 'forgot_password'])->name('account.forgot');
    Route::post('/forgot', [AccountController::class, 'check_forgot_password']);

    //reset password
    Route::get('/reset_password/{token}', [AccountController::class, 'reset_password'])->name('account.reset_password');
    Route::post('/reset_password/{token}', [AccountController::class, 'check_reset_password']);

    Route::get('/favorited', [AccountController::class, 'favorited'])->name('account.favorited');
});

//Route admin
Route::prefix('admin')->middleware(['auth', 'admin.login:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');

    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,
    ]);
    Route::get('orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('orders/details/{order}', [AdminController::class, 'details'])->name('admin.details');
    Route::get('orders/confirm/{order}', [AdminController::class, 'confirm_order'])->name('admin.confirm');

    Route::get('users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('users/{user_id}', [AdminController::class, 'order_user'])->name('admin.order_user');

});
