<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Product_GalleriesController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function () {

    Route::resource('transaksi', TransaksiController::class);
    Route::resource('detail_transaksi', DetailTransaksiController::class);
    Route::resource('user', UserController::class);

    //Route Penjual
    Route::get('/penjual', [PenjualController::class, 'index']);
    Route::get('/penjual/create', [PenjualController::class, 'create']);
    Route::post('/penjual/store', [PenjualController::class, 'store']);

    //Route Product
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/create', [ProductController::class, 'create']);
    Route::post('/product/store', [ProductController::class, 'store']);

    //Route Product Galleries
    Route::get('/product_galleries', [Product_GalleriesController::class, 'index']);
    Route::get('/product_galleries/create', [Product_GalleriesController::class, 'create']);
    Route::post('/product_galleries/store', [Product_GalleriesController::class, 'store']);
});
