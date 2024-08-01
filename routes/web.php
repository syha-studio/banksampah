<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WastePriceController;

// Public
Route::get('/', function () {
    return view('home',['title'=>'Banks BIMA']);
});

Route::get('/about', function () {
    return view('about',['title'=>'About - Banks BIMA']);
});

Route::get('/how-to-join-banksbima', function () {
    return view('howTo',['title'=>'How to Join - Banks BIMA']);
});

Route::get('/harga-sampah', [WastePriceController::class, 'index'])->name('wasteprice.index');

Route::get('/login', function () {
    return view('login',['title'=>'Login - Banks BIMA']);
});

Route::get('/register', function () {
    return view('register',['title'=>'Register - Banks BIMA']);
});

// Nasabah
Route::get('/dashboard', function () {
    return view('nasabah.dashboard',['title'=>'Dashboard - Banks BIMA']);
});

Route::get('/profile-edit', function () {
    return view('nasabah.profileEdit',['title'=>'Edit Profile - Banks BIMA']);
});

Route::get('/history', function () {
    return view('nasabah.pickUpHistory',['title'=>'History - Banks BIMA']);
});

Route::get('/saldo', function () {
    return view('nasabah.saldo',['title'=>'Saldo - Banks BIMA']);
});

Route::get('/shop', function () {
    return view('nasabah.shop',['title'=>'Shop - Banks BIMA']);
});

// Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard',['title'=>'Dashboard - Admin Banks BIMA']);
});

Route::get('/admin/financial-report', function () {
    return view('admin.laporanKeuangan',['title'=>'Finance Report - Admin Banks BIMA']);
});

Route::get('/admin/waste-report', function () {
    return view('admin.laporanSampah',['title'=>'Waste Report - Admin Banks BIMA']);
});

Route::get('/admin/deposit-log', function () {
    return view('admin.logSetoranSampah',['title'=>'Deposit Log - Admin Banks BIMA']);
});

Route::get('/admin/nasabah', function () {
    return view('admin.nasabahManagement',['title'=>'Nasabah Management - Admin Banks BIMA']);
});

Route::get('/admin/pickup', function () {
    return view('admin.pickUpManagement',['title'=>'Pick Up Management - Admin Banks BIMA']);
});

Route::get('/admin/pricing', function () {
    return view('admin.priceManagement',['title'=>'Price Management - Admin Banks BIMA']);
});