<?php
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\UserProfileController;

use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\CheckOutController;

Route::resource('wishlist', WishlistController::class)->only(['index', 'store', 'destroy']);

/** Wishlist routes */
Route::middleware('hasPermission')->group(function () {

    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile'); // user.profile
    Route::put('profile', [UserProfileController::class, 'updateProfile'])->name('profile.update'); // user.profile.update
    Route::post('profile', [UserProfileController::class, 'updatePassword'])->name('profile.update.password');

    /** User Address Route */
    Route::resource('address', UserAddressController::class);
    /** Order Routes */
    Route::get('orders', [UserOrderController::class, 'index'])->name('order.index');
    Route::get('orders/{id}', [UserOrderController::class, 'show'])->name('order.show');



    /** Checkout routes */
    Route::get('checkout', [CheckOutController::class, 'index'])->name('checkout');
    Route::post('checkout/address-create', [CheckOutController::class, 'createAddress'])->name('checkout.address.create');
    Route::post('checkout', [CheckOutController::class, 'checkOutFormSubmit'])->name('checkout.store');

    /** Payment Routes */
    Route::get('payment', [PaymentController::class, 'index'])->name('payment');

    /** COD routes */
    Route::post('cod/payment', [PaymentController::class, 'payWithCod'])->name('cod.payment');
});
