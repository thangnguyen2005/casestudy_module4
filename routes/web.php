<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;

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
Route::get('/home', function () {
    return view('homes');
});


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('/')->middleware(['auth', 'preventBackHistory'])->group(function () {
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
    Route::get('/product/show', [ProductController::class, 'show'])->name('product.show');
    Route::get('/product/trash', [ProductController::class, 'trash'])->name('product.trash');
    Route::put('product/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('product.softdeletes');
    Route::put('product/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('product.restoredelete');
    Route::get('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product_destroy');
    Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product.edit');

    //bảng customers
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('/customer/search', [CustomerController::class, 'search'])->name('customer.search');
    Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');

    // search
    Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');

    Route::get('/admin/master', function () {
        return view('admin.master');
    });


    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/editpass/{id}', [UserController::class, 'editpass'])->name('user.editpass');
        Route::put('/updatepass/{id}', [UserController::class, 'updatepass'])->name('user.updatepass');
        Route::get('/adminpass/{id}', [UserController::class, 'adminpass'])->name('user.adminpass');
        Route::put('/adminUpdatePass/{id}', [UserController::class, 'adminUpdatePass'])->name('user.adminUpdatePass');
    });
});

//Chức vụ
Route::group(['prefix' => 'groups'], function () {
    Route::get('/', [GroupController::class, 'index'])->name('group.index');
    Route::get('/create', [GroupController::class, 'create'])->name('group.create');
    Route::post('/store', [GroupController::class, 'store'])->name('group.store');
    Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
    Route::put('/update/{id}', [GroupController::class, 'update'])->name('group.update');
    Route::delete('destroy/{id}', [GroupController::class, 'destroy'])->name('group.destroy');
    Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('group.detail');
    Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('group.group_detail');
});

Route::get('/customer/register', [CustomerController::class, 'register'])->name('customer.register');
Route::post('/customer/register', [CustomerController::class, 'checkRegister'])->name('customer.checkRegister');
Route::get('/customer/login', [CustomerController::class, 'login'])->name('customer.login');
Route::post('/customer/login', [CustomerController::class, 'checkLogin'])->name('customer.checkLogin');
Route::get('/shop/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/checkout', [ShopController::class, 'checkOut'])->name('shop.checkOut');
Route::post('/order', [ShopController::class, 'order'])->name('order');
Route::prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
});
Route::get('/shop/master', function () {
    return view('shop.master');
});

Route::get('/shop', [ShopController::class, 'index']);
Route::get('cart', [ShopController::class, 'cart'])->name('cart');
Route::get('products/{id}', [ShopController::class, 'detail'])->name('detail');
Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ShopController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ShopController::class, 'remove'])->name('remove.from.cart');

Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');
