<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
  
Route::get('/', function () {
    return view('welcome');
});

Route::get('products/admin', [ProductController::class, 'admin'])->name('products.admin');
Route::get('products/showdetail2/{id}', [ProductController::class, 'showdetail2'])->name('products.showdetail2');
Route::get('products/{id}/buy', [ProductController::class, 'buy'])->name('products.buy');
Route::get('/learn-more', [ProductController::class, 'learnMore'])->name('products.learnMore');

Route::get('/filter', [ProductController::class, 'filter'])->name('filter');

Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/categories/{categoryId}/create/product', [CategoryController::class, 'createProduct'])
    ->name('categories.createProduct');
    

Route::resource('categories', CategoryController::class);
Route::get('categories/{categoryId}/showProducts', [CategoryController::class, 'showProducts'])->name('categories.showProducts');

    Route::post('/categories/{categoryId}/products', [CategoryController::class, 'storeProduct'])
    ->name('categories.storeProduct');

Route::resource('products', ProductController::class);
Route::get('/user', [UserController::class, 'index']);

