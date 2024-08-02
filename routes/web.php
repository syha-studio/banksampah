<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WastePriceController;

// Public
Route::get('/', function () {
    return view('home', ['title' => 'Banks BIMA']);
});
Route::get('/about', function () {
    return view('about', ['title' => 'About - Banks BIMA']);
});
Route::get('/how-to-join-banksbima', function () {
    return view('howTo', ['title' => 'How to Join - Banks BIMA']);
});
Route::get('/harga-sampah', [WastePriceController::class, 'index'])->name('wasteprice.index');


//Register
Route::get('/register', [RegisterController::class, 'getCity'])->middleware('guest');
Route::get('/register-2', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register-2', [RegisterController::class, 'store']);


//Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


// Nasabah - Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('nasabah.dashboard')->middleware('auth');
Route::post('/pickup/cancel/{id}', [DashboardController::class, 'cancel'])->name('pickup.cancel');
Route::post('/pickup-request', [DashboardController::class, 'create'])->name('pickup.request');
Route::post('/profile', [DashboardController::class, 'update'])->name('profile.update');

// Nasabah - Saldo
Route::get('/saldo', [SaldoController::class, 'index'])->name('nasabah.saldo')->middleware('auth');

// Nasabah - History
Route::get('/history', function () {
    return view('nasabah.pickUpHistory', ['title' => 'History - Banks BIMA']);
})->middleware('auth');

// Nasabah - Shop
Route::get('/shop', function () {
    return view('nasabah.shop', ['title' => 'Shop - Banks BIMA']);
})->middleware('auth');

// Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard', ['title' => 'Dashboard - Admin Banks BIMA']);
})->middleware('auth');

Route::get('/admin/financial-report', function () {
    return view('admin.laporanKeuangan', ['title' => 'Finance Report - Admin Banks BIMA']);
})->middleware('auth');

Route::get('/admin/waste-report', function () {
    return view('admin.laporanSampah', ['title' => 'Waste Report - Admin Banks BIMA']);
})->middleware('auth');

Route::get('/admin/deposit-log', function () {
    return view('admin.logSetoranSampah', ['title' => 'Deposit Log - Admin Banks BIMA']);
})->middleware('auth');

Route::get('/admin/nasabah', function () {
    return view('admin.nasabahManagement', ['title' => 'Nasabah Management - Admin Banks BIMA']);
})->middleware('auth');

Route::get('/admin/pickup', function () {
    return view('admin.pickUpManagement', ['title' => 'Pick Up Management - Admin Banks BIMA']);
})->middleware('auth');

Route::get('/admin/pricing', function () {
    return view('admin.priceManagement', ['title' => 'Price Management - Admin Banks BIMA']);
})->middleware('auth');
