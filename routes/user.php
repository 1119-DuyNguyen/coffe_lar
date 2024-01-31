<?php

use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\UserProfileController;
use Illuminate\Support\Facades\Route;

/** Profile Routes */
Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [UserProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [UserProfileController::class, 'updatePassword'])->name('password.update');

//Route::middleware('hasPermission')->group(function () {

Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard.index');
/** Order Routes */
Route::get('orders', [UserOrderController::class, 'index'])->name('order.index');
Route::get('orders/{id}', [UserOrderController::class, 'show'])->name('order.show');

/** COD routes */
Route::post('cod/payment', [PaymentController::class, 'payWithCod'])->name('cod.payment');
//});
