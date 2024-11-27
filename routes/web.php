<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ServiceController;

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

Auth::routes();

Route::resource('kategori', KategoriController::class)->middleware('auth');
Route::resource('customer', CustomerController::class)->middleware('auth');
Route::resource('penjualan', PenjualanController::class)->middleware('auth');
Route::resource('service', ServiceController::class)->middleware('auth');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
