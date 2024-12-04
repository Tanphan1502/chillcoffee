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
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
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


//Authenticate
// -->Register
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// --> Login
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']); // Đăng nhập

// -->Logout
Route::post('/logout', function () {
    Auth::logout(); // Đăng xuất người dùng
    session()->flush(); // Xóa tất cả thông tin session
    return redirect()->route('home'); // Chuyển hướng về trang đăng nhập
})->name('logout');




//Admin group
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    // index metric
    Route::get('/admin/order', [AdminController::class, 'orderList'])->name('order');

    //-->user
    Route::get('/admin/user', [UserController::class, 'index'])->name('user');
    Route::get('/admin/user/edit/{id}', [Usercontroller::class, 'editUser'])->name('editUser');
    Route::post('/admin/user/create', [UserController::class, 'store'])->name('addUser');
    Route::PUT('/admin/user/edit/{id}', [UserController::class, 'updateUser'])->name("updateUser");
    Route::DELETE('/admin/user/delete/{id}', [UserController::class, 'delete'])->name('delUser');


    //-->product
    Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
    Route::GET('/admin/product/edit/{id}', [ProductController::class, 'editPro'])->name('editPro');
    Route::POST('/admin/product/addpro', [ProductController::class, 'store'])->name('addPro');
    Route::PUT('/admin/product/edit/{id}', [ProductController::class, 'updatePro'])->name('updatePro');
    Route::DELETE('/admin/product/delete/{id}', [ProductController::class, 'delete'])->name('delPro');

    //-->categories
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('category');
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'editCat'])->name('editCat');
    Route::PUT('/admin/category/update/{id}', [CategoryController::class, 'updateCat'])->name('updateCat');
    Route::POST('/admin/category/add', [CategoryController::class, 'store'])->name('addCat');
    Route::DELETE('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('delCat');

    //-->blog
    Route::get('/admin/blog', [AdminBlogController::class, 'index'])->name('blogList');
    Route::get('/admin/newpost', [AdminBlogController::class, 'newPost'])->name('newPost');
    Route::POST('/admin/addBlog', [AdminBlogController::class, 'addBlog'])->name('addBlog');
});

