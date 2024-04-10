<?php

use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\SettingController;

use App\Http\Controllers\Backend\User\RoleController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/** Profile Routes */
Route::get('profile/password', [ProfileController::class, 'editPassword'])->name('password.edit');
Route::post('profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');

Route::get('profile/{id}', [ProfileController::class, 'edit'])->name('profile');


Route::middleware('can:admin.products')->group(function () {
    /** Products routes */
    Route::put('products/change-status', [ProductController::class, 'changeStatus'])->name('products.change-status');
    Route::get('products/statistic', [ProductController::class, 'getStatistic'])->name('products.statistic');
});


/** Admin Routes */
Route::middleware('hasPermission')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');
    /** Slider Route */
    //    Route::resource('slider', SliderController::class);

    /** Category Route */
    Route::put('categories/change-status', [CategoryController::class, 'changeStatus'])->name(
        'categories.change-status'
    );
    Route::resource('categories', CategoryController::class);


    /** product */

    Route::resource('products', ProductController::class);


    /** Order routes */
    Route::put('orders/change-payment-status', [OrderController::class, 'changePaymentStatus'])->name(
        'orders.change-payment-status'
    );

    Route::put('orders/change-status', [OrderController::class, 'changeOrderStatus'])->name('orders.change-status');

    Route::resource('orders', OrderController::class);


    /** settings routes */
//    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
//    Route::put('general-setting', [SettingController::class, 'generalSettingUpdate'])->name('general-setting.update');
//    //    Route::put('email-setting', [SettingController::class, 'emailConfigSettingUpdate'])->name('email-setting.update');
//    Route::put('logo-setting', [SettingController::class, 'logoSettingUpdate'])->name('logo-setting.update');

    /** manage user routes */
    Route::put('users/change-status', [UserController::class, 'changeStatus'])->name('users.change-status');
    Route::resource('users', UserController::class);
    //manage role
    Route::resource('roles', RoleController::class);
});
