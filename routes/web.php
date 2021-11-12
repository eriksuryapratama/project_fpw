<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//LOGIN
Route::get('/' , [SiteController::class, 'login']);
Route::get('/login' , [SiteController::class, 'login']);
Route::post('/login' , [SiteController::class, 'do_login']);

//ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/', [BarangController::class, 'list_kategori']);

    //kategori
    Route::get('/kategori', [BarangController::class, 'form_kategori']);
    Route::post('/kategori', [BarangController::class, 'tambah_kategori']);
    Route::get('/listkategori', [BarangController::class, 'list_kategori']);

    //barang
    Route::get('/barang', [BarangController::class, 'form_barang']);
    Route::post('/barang', [BarangController::class, 'tambah_barang']);
    Route::get('/listbarang', [BarangController::class, 'list_barang']);

    //supplier
    Route::get('/supplier', [SupplierController::class, 'form_supplier']);
    Route::post('/supplier', [SupplierController::class, 'tambah_supplier']);
    Route::get('/listsupplier', [SupplierController::class, 'list_supplier']);

    //pegawai
    Route::get('/pegawai', [PegawaiController::class, 'form_pegawai']);
    Route::post('/pegawai', [PegawaiController::class, 'tambah_pegawai']);
    Route::get('/listpegawai', [PegawaiController::class, 'list_pegawai']);

    //admin
    Route::get('/admin', [AdminController::class, 'form_admin']);
    Route::post('/admin', [AdminController::class, 'tambah_admin']);
    Route::get('/listadmin', [AdminController::class, 'list_admin']);

});

//PEGAWAI
Route::prefix('pegawai')->group(function () {
    Route::get('/', [PenerimaanController::class, 'form_penerimaan']);

});

//SUPPLIER
Route::prefix('supplier')->group(function () {
    Route::get('/', [PembelianController::class, 'form_pembelian']);

});
