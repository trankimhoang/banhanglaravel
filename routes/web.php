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

Route::get('/', [\App\Http\Controllers\HomeController::class, "index"])->name('home');

Route::get('/register', [\App\Http\Controllers\AuthController::class, "showFormRegister"])->name('show-form-register');
Route::post('/register', [\App\Http\Controllers\AuthController::class, "register"])->name('register');


Route::get('/login', [\App\Http\Controllers\AuthController::class, "showFormLogin"])->name('show-form-login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, "login"])->name('login');

Route::get('/logout', [\App\Http\Controllers\AuthController::class, "logout"])->name('logout');

Route::get('/profile', [\App\Http\Controllers\AuthController::class, 'showProfile'])->name('show-profile');
Route::get('/profile', [\App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
