<?php

use App\Http\Controllers\BengkelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\SettingController;
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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('bengkels', BengkelController::class);
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('/bengkels/{id}', [BengkelController::class, 'show'])->name('bengkels.show');
    Route::get('/admin/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::delete('/kontak/{id}', [KontakController::class, 'destroy'])->name('kontak.destroy');
});
