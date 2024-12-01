<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KaryawanController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Menambahkan rute resource untuk 'kategori', 'produk', 'customer', 'penjualan', 'service', dan 'karyawan'
Route::middleware('auth')->group(function () {
    // Rute untuk produk
    Route::resource('produk', ProdukController::class)->names([
        'index' => 'produk.index',
        'create' => 'produk.create',
        'store' => 'produk.store',
        'show' => 'produk.show',
        'edit' => 'produk.edit',
        'update' => 'produk.update',
        'destroy' => 'produk.destroy',
    ]);

    // Rute untuk kategori
    Route::resource('kategori', KategoriController::class)->names([
        'index' => 'kategori.index',
        'create' => 'kategori.create',
        'store' => 'kategori.store',
        'show' => 'kategori.show',
        'edit' => 'kategori.edit',
        'update' => 'kategori.update',
        'destroy' => 'kategori.destroy',
    ]);

    // Rute untuk customer
    Route::resource('customer', CustomerController::class)->names([
        'index' => 'customer.index',
        'create' => 'customer.create',
        'store' => 'customer.store',
        'show' => 'customer.show',
        'edit' => 'customer.edit',
        'update' => 'customer.update',
        'destroy' => 'customer.destroy',
    ]);

    // Rute untuk penjualan
    Route::resource('penjualan', PenjualanController::class)->names([
        'index' => 'penjualan.index',
        'create' => 'penjualan.create',
        'store' => 'penjualan.store',
        'show' => 'penjualan.show',
        'edit' => 'penjualan.edit',
        'update' => 'penjualan.update',
        'destroy' => 'penjualan.destroy',
    ]);

    // Rute untuk service
    Route::resource('service', ServiceController::class)->names([
        'index' => 'service.index',
        'create' => 'service.create',
        'store' => 'service.store',
        'show' => 'service.show',
        'edit' => 'service.edit',
        'update' => 'service.update',
        'destroy' => 'service.destroy',
    ]);

    // Rute untuk karyawan
    Route::resource('karyawan', KaryawanController::class)->names([
        'index' => 'karyawan.index',
        'create' => 'karyawan.create',
        'store' => 'karyawan.store',
        'show' => 'karyawan.show',
        'edit' => 'karyawan.edit',
        'update' => 'karyawan.update',
        'destroy' => 'karyawan.destroy',
    ]);
});
