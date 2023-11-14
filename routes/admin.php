<?php

use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\SettingController;

use App\Http\Controllers\Backend\User\ManageRoleController;
use App\Http\Controllers\Backend\User\ManageUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/** Profile Routes */
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

//Route::middleware('can:admin.product.index')->group(function () {
//    Route::resource('product.product-variant', ProductVariantController::class)->only(['index', 'create', 'edit']);
//    Route::resource('product.product-variant.product-variant-item', ProductVariantItemController::class)->only(['index', 'create', 'edit']);
//});
Route::middleware('can:admin.product')->group(function () {
    /** Products routes */
    Route::put('product/change-status', [ProductController::class, 'changeStatus'])->name('product.change-status');

//    /** Products variant route */
//    Route::put('product-variant/change-status', [VariantController::class, 'changeStatus'])->name('product-variant.change-status');
//    Route::resource('product-variant', VariantController::class)->only(['store', 'update', 'destroy']);
//    Route::put('product-variant-item/change-status', [VariantItemController::class, 'changeStatus'])->name('product-variant-item.change-status');
//    Route::resource('product-variant-item', VariantItemController::class)->only(['store', 'update', 'destroy']);
});



/** Admin Routes */
Route::middleware('hasPermission')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');
    /** Slider Route */
//    Route::resource('slider', SliderController::class);

    /** Category Route */
    Route::put('category/change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
    Route::resource('category', CategoryController::class);



    /** product */

    Route::resource('product', ProductController::class);



    /** Order routes */
    Route::put('order/change-payment-status', [OrderController::class, 'changePaymentStatus'])->name('order.change-payment-status');

    Route::put('order/change-status', [OrderController::class, 'changeOrderStatus'])->name('order.change-status');

    Route::resource('order', OrderController::class);


    /** settings routes */
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('general-setting', [SettingController::class, 'generalSettingUpdate'])->name('general-setting.update');
//    Route::put('email-setting', [SettingController::class, 'emailConfigSettingUpdate'])->name('email-setting.update');
    Route::put('logo-setting', [SettingController::class, 'logoSettingUpdate'])->name('logo-setting.update');

    /** manage user routes */
    Route::put('user/change-status', [ManageUserController::class, 'changeStatus'])->name('user.change-status');
    Route::resource('user', ManageUserController::class);
//manage role
    Route::resource('role', ManageRoleController::class);

});









