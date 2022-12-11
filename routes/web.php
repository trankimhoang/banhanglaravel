<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


App()->setLocale('vi');




Route::group(['middleware' => 'guest:web'], function () {
    Route::get('/register', [\App\Http\Controllers\Auth\AuthController::class, "showFormRegister"])->name('show-form-register');
    Route::post('/register', [\App\Http\Controllers\Auth\AuthController::class, "register"])->name('register');

    Route::get('/login', [\App\Http\Controllers\Auth\AuthController::class, "showFormLogin"])->name('show-form-login');
    Route::post('/login', [\App\Http\Controllers\Auth\AuthController::class, "login"])->name('login');
});

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('cart', [\App\Http\Controllers\HomeController::class, 'addCart'])->name('cart.add');

    Route::get('cartDetail', [\App\Http\Controllers\HomeController::class, 'cartDetail'])->name('cart.detail');
});





Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, "logout"])->name('logout');

Route::get('/profile', [\App\Http\Controllers\Auth\AuthController::class, 'showProfile'])->name('show-profile');
Route::get('/profile', [\App\Http\Controllers\Auth\AuthController::class, 'profile'])->name('profile');


Route::get('/list-user', [\App\Http\Controllers\HomeController::class, "listUser"])->name('list_user');

Route::get('/', [\App\Http\Controllers\HomeController::class, "index"])->name('home');

Route::get('search', [\App\Http\Controllers\HomeController::class, 'search'])->name('search');

Route::get('product_detail/{id}', [\App\Http\Controllers\ProductController::class, 'productDetail'])->name('product.detail');
