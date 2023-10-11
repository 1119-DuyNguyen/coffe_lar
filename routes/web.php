<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\GiaoHangNhanhController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Route;


// frontend

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/quickview', [HomeController::class, 'quickView'])->name('quickview');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});


require __DIR__.'/auth.php';

Route::get('admin/login', [\App\Http\Controllers\Backend\DashboardController::class, 'login'])->name('admin.login');


/** Product route */
Route::get('product', [ProductController::class, 'index'])->name('product.index');

Route::get('product/{slug}', [ProductController::class, 'show'])->name('product.show');

/** Cart routes */

Route::resource('cart',CartController::class);


Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::post('contact', [PageController::class, 'handleContactForm'])->name('handle-contact-form');
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::get('ghn/province',[GiaoHangNhanhController::class,'getProvince'])->name('ghn.province');
Route::get('ghn/district/{idProvince}',[GiaoHangNhanhController::class,'getDistrict'])->name('ghn.district');
Route::get('ghn/ward/{idDistrict}',[GiaoHangNhanhController::class,'getWard'])->name('ghn.ward');

Route::get('ghn/price', [GiaoHangNhanhController::class, 'getPrice'])->name('ghn.price');


