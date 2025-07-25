<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;

// Public
Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/how-to-join-banksbima', [MainController::class, 'howTo'])->name('howTo');
Route::get('/harga-sampah', [MainController::class, 'wastePrice'])->name('wastePrice');

// Guest Only
Route::middleware(['guest'])->group(function () {
    //Register
    Route::get('/register', [RegisterController::class, 'getCity']);
    Route::get('/register-2', [RegisterController::class, 'index']);
    Route::post('/register-2', [RegisterController::class, 'store']);

    //Login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

// Auth
Route::middleware(['auth'])->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout']);
});


// Nasabah - Only
Route::middleware(['nasabah'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('nasabah.dashboard');
    Route::post('/pickup/cancel/{id}', [DashboardController::class, 'cancel'])->name('pickup.cancel1');
    Route::post('/transfer/cancel/{id}', [DashboardController::class, 'transferCancel'])->name('transfer.cancel');
    Route::post('/pickup-request', [DashboardController::class, 'create'])->name('pickup.request');
    Route::post('/profile', [DashboardController::class, 'update'])->name('profile.update');

    // Saldo
    Route::get('/saldo', [SaldoController::class, 'index'])->name('nasabah.saldo');
    Route::post('/transfer', [SaldoController::class, 'create'])->name('withdraw.request');

    // History
    Route::get('/history', [PickupController::class, 'index'])->name('nasabah.history');

    // Shop
    Route::get('/shop', function () {
        return view('nasabah.shop', ['title' => 'Shop']);
    });
});

// Admin
Route::middleware(['admin'])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/pickup/cancel/{id}', [AdminController::class, 'cancel'])->name('pickup.cancel2');
    Route::post('/pickup/{id}/update', [AdminController::class, 'update'])->name('pickup.update');
    Route::post('/pickup/{id}/take', [AdminController::class, 'take'])->name('pickup.take');
    Route::post('/pick/{id}', [AdminController::class, 'storePickupDetails'])->name('pick.store');
    Route::post('/transfer/{id}', [AdminController::class, 'transferNow'])->name('transfer.update');
    Route::post('/transfer/cancel/{id}', [AdminController::class, 'transferCancel'])->name('transfer.cancel2');

    // Waste Pricing
    Route::get('/admin/pricing', [PricingController::class, 'index'])->name('admin.pricing');

    // Nasabah
    Route::get('/admin/nasabah', [NasabahController::class, 'index'])->name('admin.nasabah');


    Route::get('/admin/financial-report', function () {
        return view('admin.laporanKeuangan', ['title' => 'Finance Report - Admin Banks BIMA']);
    });

    Route::get('/admin/waste-report', function () {
        return view('admin.laporanSampah', ['title' => 'Waste Report - Admin Banks BIMA']);
    });

    Route::get('/admin/deposit-log', function () {
        return view('admin.logSetoranSampah', ['title' => 'Deposit Log - Admin Banks BIMA']);
    });

    Route::get('/admin/pickup', function () {
        return view('admin.pickUpManagement', ['title' => 'Pick Up Management - Admin Banks BIMA']);
    });

    Route::get('/admin/saldo', function () {
        return view('admin.saldoManagement', ['title' => 'Pick Up Management - Admin Banks BIMA']);
    });
});
