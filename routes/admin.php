<?php

    use Illuminate\Support\Facades\Route;

    Route::group(['middleware' => 'guest:admin'], function () {
        Route::get('/login', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'showFormLogin'])->name('show-form-login'); // admin.login
        Route::post('/login', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'login'])->name('login'); // admin.login
    });


    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('home', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

        Route::get('logout', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'logout'])->name('logout');

        Route::get('product/index', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product.index');

        Route::get('product/add', [\App\Http\Controllers\Admin\ProductController::class, 'addProduct'])->name('product.add');
        Route::post('product/add', [\App\Http\Controllers\Admin\ProductController::class, 'addProductPost'])->name('product.add.post');

        Route::get('product/delete/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'deleteProduct'])->name('product.delete');

        Route::get('product/edit/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'editProduct'])->name('product.edit');
        Route::post('product/edit', [\App\Http\Controllers\Admin\ProductController::class, 'editProductPost'])->name('product.edit.post');

        Route::get('user/list', [\App\Http\Controllers\Admin\HomeController::class, 'listUser'])->name('user.list');

        Route::get('user/detail/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'detailUser'])->name('user.detail');




        // admin.admin.index => trang list
        // admin.admin.create => trang html create
        // admin.admin.destroy => xoa
        // admin.admin.update => trang xu li update
        // admin.admin.store => trang xu li them moi
        // admin.admin.edit => trang tao html edit
        Route::resource('admin', \App\Http\Controllers\Admin\AdminController::class);
    });


