<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AdminReviewController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Category\CategorySubController;
use App\Http\Controllers\Backend\Category\ChildCategoryController;
use App\Http\Controllers\Backend\Category\SubCategoryController;
use App\Http\Controllers\Backend\Category\SubChildCategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CustomerListController;
use App\Http\Controllers\Backend\Footer\FooterGridThreeController;
use App\Http\Controllers\Backend\Footer\FooterGridTwoController;
use App\Http\Controllers\Backend\Footer\FooterInfoController;
use App\Http\Controllers\Backend\Footer\FooterSocialController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\Payment\CodSettingController;
use App\Http\Controllers\Backend\Product\FeaturedProductController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Product\ProductImageGalleryController;
use App\Http\Controllers\Backend\Product\ProductVariantController;
use App\Http\Controllers\Backend\Product\ProductVariantItemController;
use App\Http\Controllers\Backend\Product\SellerProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TermsAndConditionController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\User\ManageRoleController;
use App\Http\Controllers\Backend\User\ManageUserController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::resource('category.sub-category', CategorySubController::class)->only(['index']);
Route::resource('sub-category.child-category', SubChildCategoryController::class)->only(['index']);
/** Profile Routes */
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');
/** Admin Routes */
Route::middleware('hasPermission')->group(function (){
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


    /** Products routes */
    Route::put('product/change-status', [ProductController::class, 'changeStatus'])->name('product.change-status');
    Route::resource('product', ProductController::class);


    /** Products image gallery route */
    Route::resource('products-image-gallery', ProductImageGalleryController::class);

    /** Products variant route */
    Route::put('products-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
    Route::resource('products-variant', ProductVariantController::class);

    /** Products variant item route */
    Route::get('products-variant-item/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])->name('products-variant-item.index');

    Route::get('products-variant-item/create/{productId}/{variantId}', [ProductVariantItemController::class, 'create'])->name('products-variant-item.create');
    Route::post('products-variant-item', [ProductVariantItemController::class, 'store'])->name('products-variant-item.store');

    Route::get('products-variant-item-edit/{variantItemId}', [ProductVariantItemController::class, 'edit'])->name('products-variant-item.edit');

    Route::put('products-variant-item-update/{variantItemId}', [ProductVariantItemController::class, 'update'])->name('products-variant-item.update');

    Route::delete('products-variant-item/{variantItemId}', [ProductVariantItemController::class, 'destroy'])->name('products-variant-item.destroy');

    Route::put('products-variant-item-status', [ProductVariantItemController::class, 'chageStatus'])->name('products-variant-item.chages-status');



    /** featured-product */
    Route::put('featured-product/show-at-home/change-status', [FeaturedProductController::class, 'changeShowAtHomeStatus'])->name('featured-product.show-at-home.change-status');
    Route::put('featured-product/change-status', [FeaturedProductController::class, 'changeStatus'])->name('featured-product.change-status');
    Route::resource('featured-product',FeaturedProductController::class)->except(['update','edit']);

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


    /** about routes */
    Route::get('about', [AboutController::class, 'index'])->name('about.index');
    Route::put('about/update', [AboutController::class, 'update'])->name('about.update');
    /** terms and conditons routes */
    Route::get('terms-and-conditions', [TermsAndConditionController::class, 'index'])->name('terms-and-conditions.index');
    Route::put('terms-and-conditions/update', [TermsAndConditionController::class, 'update'])->name('terms-and-conditions.update');

});









