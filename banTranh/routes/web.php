<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\RateController;

Route::get('/', function () {
    return view('welcome');
});

// Routes liên quan đến đăng nhập, đăng ký
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/learn-more', [ProductController::class, 'learnMore'])->name('products.learnMore');

Route::middleware([AuthMiddleware::class])->group(function () {
    // Các route người dùng đã đăng nhập có thể truy cập
    Route::get('products/admin', [ProductController::class, 'admin'])->name('products.admin');
    Route::get('products/showdetail2/{id}/{category_id}', [ProductController::class, 'showdetail2'])->name('products.showdetail2');
    Route::post('products/{id}/buy', [ProductController::class, 'buy'])->name('products.buy');
    
    Route::get('/filter', [ProductController::class, 'filter'])->name('filter');
    Route::resource('products', ProductController::class);
    
    Route::get('orders/user', [OrderController::class, 'getOrderEmail'])->name('ordersemail');

    Route::post('/rates/{product_id}/{email}', [RateController::class, 'store'])->name('rate.store');
    Route::get('/rates/{product_id}', [RateController::class, 'show'])->name('rate.show');
    Route::get('/rates/email/{email}/{product_id}', [RateController::class, 'showByEmail'])->name('rate.showByEmail');
    // routes/web.php

    Route::get('/productrate/{id}', [ProductController::class, 'showById'])->name('products.showrate');
    
    Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('password.form');
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('password.change');
    
    // Các route chỉ dành cho admin
    Route::middleware([AuthMiddleware::class])->group(function () {
        Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/categories/{categoryId}/create/product', [CategoryController::class, 'createProduct'])->name('categories.createProduct');
        Route::resource('categories', CategoryController::class);
        Route::get('categories/{categoryId}/showProducts', [CategoryController::class, 'showProducts'])->name('categories.showProducts');
        Route::post('/categories/{categoryId}/products', [CategoryController::class, 'storeProduct'])->name('categories.storeProduct');
        
    });

    Route::get('/user', [UserController::class, 'index']);

    Route::get('profile-user', function () {
        $user = Auth::user();
        return view('/user/profileuser', compact('user'));
    })->name('userprofile');
});
