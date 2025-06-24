<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\User\AuthController as UserAuth;
use App\Http\Controllers\Admin\AuthController as AdminAuth;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

// User Login
Route::get('/login', [UserAuth::class, 'showLogin'])->name('login');
// Route::get('/login', [UserAuth::class, 'showLogin'])->name('login');
Route::post('/login', [UserAuth::class, 'login']);
Route::middleware('auth')->group(function () {
    Route::post('/add-to-cart/{id}', [LandingController::class, 'addToCart']);
    Route::get('/shop', [LandingController::class, 'shop']);
    Route::get('/detail-produk/{id}', [LandingController::class, 'show'])->name('produk.detail');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
    Route::post('/cart/remove/{id}', [CartController::class, 'increase'])->name('cart.increase');

    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('/order', [PembayaranController::class, 'index'])->name('user.order');
    Route::get('/bayar/{id_order}', [PembayaranController::class, 'form'])->name('bayar.form');
    Route::post('/bayar/{id_order}', [PembayaranController::class, 'upload'])->name('bayar.upload');
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});

// Admin Login
Route::get('/admin/login', [AdminAuth::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuth::class, 'login']);

Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/produk', [ProdukController::class, 'index'])->name('admin.produk');
    Route::get('/produk-create', [ProdukController::class, 'create'])->name('admin.create');
    Route::post('/produk-create', [ProdukController::class, 'store'])->name('admin.store');
    Route::post('/produk-edit', [ProdukController::class, 'store'])->name('admin.edit');
    Route::post('/produk-delete', [ProdukController::class, 'store'])->name('admin.destroy');
    Route::get('/order', [AdminDashboardController::class, 'order'])->name('admin.order');
    Route::post('/order/{id}/status', [AdminDashboardController::class, 'updateStatus'])->name('admin.order.status');
    Route::post('/order/{id}/resi', [AdminDashboardController::class, 'updateResi'])->name('admin.order.resi');
});
