<?php

    use Illuminate\Support\Facades\Route;

    Route::group(['middleware' => 'guest:admin'], function () {
        Route::get('/login', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'showFormLogin'])->name('show-form-login'); // admin.login
        Route::post('/login', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'login'])->name('login'); // admin.login
    });


    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('home', function (){
            echo 232;
        })->name('home');
    });


