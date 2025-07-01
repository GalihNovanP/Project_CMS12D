<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AuthController;



Route::get('/pendaftaran-ktp', function() {
    return 'Selamat datang di halaman Pendaftaran KTP Online!';
})->middleware('check.age');


Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('dashboard'); // atau halaman dashboard kamu
})->middleware('auth');


// Route untuk pelanggan
Route::resource('pelanggan', PelangganController::class);
Route::get('/pelanggan/{id}/delete', [PelangganController::class, 'delete'])->name('pelanggan.delete');

// Route untuk produk
Route::resource('produk', ProdukController::class);
Route::get('/produk/{id}/delete', [ProdukController::class, 'delete'])->name('produk.delete');

// Route untuk order
Route::resource('order', OrderController::class);
Route::get('order/{id}/delete', [OrderController::class, 'delete'])->name('order.delete');

// Route untuk DetailOrder
Route::resource('detail_order', DetailOrderController::class);
Route::get('detail_order/{id}/delete', [DetailOrderController::class, 'delete'])->name('detail_order.delete');

// Route untuk karyawan
Route::resource('karyawan', KaryawanController::class);
Route::get('karyawan/{id}/delete', [KaryawanController::class, 'delete'])->name('karyawan.delete');

// Route untuk pembayaran
Route::resource('pembayaran', PembayaranController::class);
Route::get('pembayaran/{id}/delete', [PembayaranController::class, 'delete'])->name('pembayaran.delete');

// Route untuk upload gambar
Route::get('/upload', [ImageController::class, 'create']);
Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
Route::delete('/upload/{id}', [ImageController::class, 'destroy'])->name('image.delete');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard / Home (setelah login)
Route::get('/dashboard', function () {
    return view('dashboard'); // Ganti dengan view kamu
})->middleware('auth');




