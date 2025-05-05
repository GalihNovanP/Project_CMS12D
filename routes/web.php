<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PembayaranController;


Route::get('/', function () {
    return view('home');
});

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
