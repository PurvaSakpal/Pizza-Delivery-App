<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user;
use App\Http\Controllers\Cart;
use App\Http\Controllers\Order;

Route::get('/', function () {
    return view('welcome');
});
Route::get('signup',[user::class,'register'])->name('signup');
Route::post('postRegister',[user::class,'postRegister'])->name('postRegister');
Route::get('login',[user::class,'login'])->name('login');
Route::post('postLogin',[user::class,'postLogin'])->name('postLogin');
Route::middleware([checkStatus::class])->group(function(){
    Route::get('getstatus',function(){
        return " Success";
    });
    Route::get('admin/menu',[Cart::class,'menu'])->name('menu');
    Route::get('logout',[user::class,'logout'])->name('logout');
    Route::get('cart', [Cart::class, 'cart'])->name('cart');
    Route::get('admin/profile', [user::class, 'profile'])->name('profile');
    Route::get('admin/order', [Cart::class, 'order'])->name('order');
    Route::get('admin/cart/checkout/{total}', [Cart::class, 'checkout'])->name('checkout');
    Route::post('admin/cart/postOrder', [Cart::class, 'postOrder'])->name('postOrder');
    Route::get('admin/add-to-cart/{id}', [Cart::class, 'addToCart'])->name('add.to.cart');
    Route::patch('admin/update-cart', [Cart::class, 'update'])->name('update.cart');
    Route::delete('admin/remove-from-cart', [Cart::class, 'remove'])->name('remove.from.cart');
    Route::get('admin/editProfile',[user::class,'editProfile'])->name('edit.profile');
    Route::post('admin/updateProfile',[user::class,'updateProfile'])->name('update.profile');
});



