<?php

use App\Http\Controllers\AdminPickupRequestController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\BengkelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store')->middleware(['throttle:global']);

Auth::routes([
    'register' => false
]);

Route::get('/login-bengkel', [LoginController::class, 'showBengkelLoginForm'])->name('login.bengkel');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('bengkels', BengkelController::class);
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('/bengkels/{id}', [BengkelController::class, 'show'])->name('bengkels.show');
    Route::get('/admin/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::delete('/kontak/{id}', [KontakController::class, 'destroy'])->name('kontak.destroy');

    Route::get('/settings/password/edit', [ChangePasswordController::class, 'edit'])->name('auth.passwords.edit');
    Route::put('/settings/password/update', [ChangePasswordController::class, 'update'])->name('auth.passwords.update');

    Route::resource('pickup-requests', \App\Http\Controllers\PickupRequestController::class);
    Route::get('/admin/pickup-requests', [AdminPickupRequestController::class, 'index'])->name('admin.pickup_requests.index');
    Route::post('/admin/pickup-requests/{id}/update-status', [AdminPickupRequestController::class, 'updateStatus'])->name('admin.pickup_requests.updateStatus');

    Route::get('/admin/akuns', [AkunController::class, 'index'])->name('admin.akun.index');
    Route::post('/admin/akuns', [AkunController::class, 'store'])->name('admin.akun.store');
    Route::put('/admin/akuns/{id}', [AkunController::class, 'update'])->name('admin.akun.update');
    Route::delete('/admin/akuns/{id}', [AkunController::class, 'destroy'])->name('admin.akun.destroy');

    Route::resource('products', ProductController::class);
    Route::get('/bengkel/products', [ProductController::class, 'bengkelIndex'])->name('bengkels.product.index');
    Route::post('/bengkel/order', [OrderController::class, 'store'])->name('bengkel.order.store');

    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.pesanan.index');
    Route::post('/admin/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.update');


});




// Route::post('/login-bengkel', [LoginController::class, 'bengkelLogin']);

