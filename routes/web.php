<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;

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
//bảng categories
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/search', [CategoryController::class, 'search'])->name('category.search');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

//bảng broducts
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/product/show', [ProductController::class, 'show'])->name('product.show');

Route::get('/user/master', function() {
    return view('user.master');
});

Route::get('/user/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/user/checkout', [ShopController::class, 'checkOut'])->name('user.checkOut');


Route::get('/', [ShopController::class, 'index']);
Route::get('cart', [ShopController::class, 'cart'])->name('cart');
Route::get('products/{id}', [ShopController::class, 'detail'])->name('detail');
Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ShopController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ShopController::class, 'remove'])->name('remove.from.cart');


Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');

Route::get('/admin/master', function() {
    return view('admin.master');
});

Route::get('/customer/register', [CustomerController::class, 'register'])->name('customer.register');
Route::post('/customer/register', [CustomerController::class, 'checkRegister'])->name('customer.checkRegister');

Route::get('/customer/login', [CustomerController::class, 'login'])->name('customer.login');
Route::post('/customer/login', [CustomerController::class, 'checkLogin'])->name('customer.checkLogin');
