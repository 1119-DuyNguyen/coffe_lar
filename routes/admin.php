<?php

use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Category\CategorySubController;
use App\Http\Controllers\Backend\Category\ChildCategoryController;
use App\Http\Controllers\Backend\Category\SubCategoryController;
use App\Http\Controllers\Backend\Category\SubChildCategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\Product\FeaturedProductController;
use App\Http\Controllers\Backend\Product\ImageGalleryController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Product\ProductImageGalleryController;
use App\Http\Controllers\Backend\Product\ProductVariantController;
use App\Http\Controllers\Backend\Product\ProductVariantItemController;
use App\Http\Controllers\Backend\Product\VariantController;
use App\Http\Controllers\Backend\Product\VariantItemController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\User\ManageRoleController;
use App\Http\Controllers\Backend\User\ManageUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::resource('category.sub-category', CategorySubController::class)->only(['index']);
Route::resource('sub-category.child-category', SubChildCategoryController::class)->only(['index']);
/** Profile Routes */
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

Route::middleware('can:admin.product.index')->group(function () {
    Route::resource('product.product-variant', ProductVariantController::class)->only(['index', 'create', 'edit']);
    Route::resource('product.product-variant.product-variant-item', ProductVariantItemController::class)->only(['index', 'create', 'edit']);
    Route::resource('product.product-image-gallery', ProductImageGalleryController::class)->only(['index']);
});
Route::middleware('can:admin.product.update')->group(function () {
    /** Products routes */
    Route::put('product/change-status', [ProductController::class, 'changeStatus'])->name('product.change-status');
    /** Products image gallery route */
    Route::resource('product-image-gallery', ImageGalleryController::class)->only(['destroy', 'store']);

    /** Products variant route */
    Route::put('product-variant/change-status', [VariantController::class, 'changeStatus'])->name('product-variant.change-status');
    Route::resource('product-variant', VariantController::class)->only(['store', 'update', 'destroy']);
    Route::put('product-variant-item/change-status', [VariantItemController::class, 'changeStatus'])->name('product-variant-item.change-status');
    Route::resource('product-variant-item', VariantItemController::class)->only(['store', 'update', 'destroy']);
});
/** featured-product */
Route::middleware('can:admin.featured-product.update')->group(function () {
    Route::put('featured-product/show-at-home/change-status', [FeaturedProductController::class, 'changeShowAtHomeStatus'])->name('featured-product.show-at-home.change-status');
    Route::put('featured-product/change-status', [FeaturedProductController::class, 'changeStatus'])->name('featured-product.change-status');
});


/** Admin Routes */
Route::middleware('hasPermission')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');
    /** Slider Route */
    Route::resource('slider', SliderController::class);

    /** Category Route */
    Route::put('category/change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
    Route::resource('category', CategoryController::class);

    /** Sub Category Route */
    Route::put('sub-category/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
    Route::resource('sub-category', SubCategoryController::class);


    /** Child Category Route */
    Route::put('child-category/change-status', [ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
    Route::resource('child-category', ChildCategoryController::class);

    /** Brand routes */
    Route::put('brand/change-status', [BrandController::class, 'changeStatus'])->name('brand.change-status');
    Route::resource('brand', BrandController::class);

    /** product */

    Route::resource('product', ProductController::class);



    /** featured-product */

    Route::resource('featured-product', FeaturedProductController::class)->except(['update', 'edit']);

    /** Coupon Routes */
    Route::put('coupon/change-status', [CouponController::class, 'changeStatus'])->name('coupons.change-status');
    Route::resource('coupon', CouponController::class);


    /** Order routes */
    Route::put('order/change-status', [OrderController::class, 'changeOrderStatus'])->name('order.change-status');

    Route::resource('order', OrderController::class);


    /** settings routes */
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('general-setting', [SettingController::class, 'generalSettingUpdate'])->name('general-setting.update');
    Route::put('email-setting', [SettingController::class, 'emailConfigSettingUpdate'])->name('email-setting.update');
    Route::put('logo-setting', [SettingController::class, 'logoSettingUpdate'])->name('logo-setting.update');

    /** manage user routes */
    Route::put('user/change-status', [ManageUserController::class, 'changeStatus'])->name('user.change-status');
    Route::resource('user', ManageUserController::class);
//manage role
    Route::resource('role', ManageRoleController::class);

});









