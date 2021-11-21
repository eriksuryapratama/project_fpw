<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PemesananController;
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

Route::get('/logout' , [SiteController::class, 'logout']);

//ADMIN
Route::prefix('admin')->middleware(['adminCek'])->group(function () {
    Route::get('/', [BarangController::class, 'list_kategori']);

    //kategori
    Route::get('/kategori', [BarangController::class, 'form_kategori']);
    Route::post('/kategori', [BarangController::class, 'tambah_kategori']);
    Route::get('/listkategori', [BarangController::class, 'list_kategori']);
    Route::get('/kategori/delete/{id}', [BarangController::class, 'deletekategori']);
    Route::get('/kategori/update/{id}', [BarangController::class, 'updateindex_kategori']);
    Route::post('/kategori/update', [BarangController::class, 'updatekategori']);

    //barang
    Route::get('/barang', [BarangController::class, 'form_barang']);
    Route::post('/barang', [BarangController::class, 'tambah_barang']);
    Route::get('/listbarang', [BarangController::class, 'list_barang']);
    Route::get('/barang/delete/{id}', [BarangController::class, 'deletebarang']);
    Route::get('/barang/update/{id}', [BarangController::class, 'updateindex_barang']);
    Route::post('/barang/update', [BarangController::class, 'updatebarang']);

    // PEMESANAN

    Route::get('/pemesanan/tambah/{id}', [PemesananController::class, 'index_pemesanan']);

    Route::get('/tambahpemesanan', [PemesananController::class, 'form_pemesanan']);
    Route::post('/tambahpemesanan', [PemesananController::class, 'tambah_pemesanan']);


    Route::get('/pemesanan', [PemesananController::class, 'list_barang']);
    Route::get('/listpemesanan', [PemesananController::class, 'list_pemesanan']);

    //supplier
    Route::get('/supplier', [SupplierController::class, 'form_supplier']);
    Route::post('/supplier', [SupplierController::class, 'tambah_supplier']);
    Route::get('/listsupplier', [SupplierController::class, 'list_supplier']);
    Route::get('/supplier/delete/{id}', [SupplierController::class, 'deletesupplier']);
    Route::get('/supplier/update/{id}', [SupplierController::class, 'updateindex_supplier']);
    Route::post('/supplier/update', [SupplierController::class, 'updatesupplier']);

    //pegawai
    Route::get('/pegawai', [PegawaiController::class, 'form_pegawai']);
    Route::post('/pegawai', [PegawaiController::class, 'tambah_pegawai']);
    Route::get('/listpegawai', [PegawaiController::class, 'list_pegawai']);
    Route::get('/pegawai/delete/{id}', [PegawaiController::class, 'deletepegawai']);
    Route::get('/pegawai/update/{id}', [PegawaiController::class, 'updateindex_pegawai']);
    Route::post('/pegawai/update', [PegawaiController::class, 'updatepegawai']);

    //admin
    Route::get('/admin', [AdminController::class, 'form_admin']);
    Route::post('/admin', [AdminController::class, 'tambah_admin']);
    Route::get('/listadmin', [AdminController::class, 'list_admin']);
    Route::get('/admin/delete/{id}', [AdminController::class, 'deleteadmin']);
    Route::get('/admin/update/{id}', [AdminController::class, 'updateindex_admin']);
    Route::post('/admin/update', [AdminController::class, 'updateadmin']);

});

//PEGAWAI
Route::prefix('pegawai')->middleware(['pegawaiCek'])->group(function () {
    Route::get('/', [PenerimaanController::class, 'form_penerimaan']);

});

//SUPPLIER
Route::prefix('supplier')->middleware(['supplierCek'])->group(function () {
    // Route::get('/', [PembelianController::class, 'form_pembelian']);

});
