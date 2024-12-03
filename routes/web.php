<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/menu', [MenuController::class, 'menu'])->name('menu');

Route::get('/services', [ServicesController::class, 'services'])->name('services');

Route::get('/blog', [BlogController::class, 'blog'])->name('blog');

Route::get('/about', [AboutController::class, 'about'])->name('about');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

Route::get('/shop', [ShopController::class, 'shop'])->name('shop');

Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');

Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/set-default-address', [CheckoutController::class, 'setDefaultAddress'])->name('setDefaultAddress');
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('placeOrder');

Route::get('/detailproduct/{id}', [DetailProductController::class, 'detailproduct'])->name('detailproduct');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']); // Đăng nhập
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Đăng xuất
Route::post('/logout', function () {
    Auth::logout(); // Đăng xuất người dùng
    session()->flush(); // Xóa tất cả thông tin session
    return redirect()->route('home'); // Chuyển hướng về trang đăng nhập
})->name('logout');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);



//admin
//Get method 
Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware('admin')->group(function () {
    // Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    // Route::resource('users', 'UserController');
});
// index metric
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/order', [AdminController::class, 'orderList'])->name('order');


//user
Route::get('/admin/user', [UserController::class, 'index'])->name('user');
Route::get('/admin/user/edit/{id}',[Usercontroller::class,'editUser'])->name('editUser');
Route::post('/admin/user/create',[UserController::class,'store'])->name('addUser');
Route::PUT('/admin/user/edit/{id}',[UserController::class, 'updateUser'])->name("updateUser");
Route::DELETE('/admin/user/delete/{id}',[UserController::class, 'delete'])->name('delUser');


//product
Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
Route::GET('/admin/product/edit/{id}',[ProductController::class, 'editPro'])->name('editPro');
Route::POST('/admin/product/addpro', [ProductController::class,'store'])->name('addPro');
Route::PUT('/admin/product/edit/{id}', [ProductController::class, 'updatePro'])->name('updatePro');
Route::DELETE('/admin/product/delete/{id}',[ProductController::class,'delete'])->name('delPro');

//categories
Route::get('/admin/category', [CategoryController::class, 'index'])->name('category');
Route::POST('/admin/category/add',[CategoryController::class,'store'])->name('addCat');
