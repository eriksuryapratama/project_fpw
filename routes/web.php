<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\PenjualanController;
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
    Route::get('/carikategori', [BarangController::class, 'cariKategori']);

    //barang
    Route::get('/barang', [BarangController::class, 'form_barang']);
    Route::post('/barang', [BarangController::class, 'tambah_barang']);
    Route::get('/listbarang', [BarangController::class, 'list_barang']);
    Route::get('/barang/delete/{id}', [BarangController::class, 'deletebarang']);
    Route::get('/barang/update/{id}', [BarangController::class, 'updateindex_barang']);
    Route::post('/barang/update', [BarangController::class, 'updatebarang']);
    Route::get('/caribarang', [BarangController::class, 'cariBarang']);

    //pemesanan
    Route::get('/pemesanan', [PemesananController::class, 'list_barang']);
    Route::get('/pemesanan/tambah/{id}', [PemesananController::class, 'index_pemesanan']);
    Route::get('/tambahpemesanan', [PemesananController::class, 'form_pemesanan']);
    Route::post('/tambahpemesanan', [PemesananController::class, 'tambah_pemesanan']);
    Route::get('/listpemesanan', [PemesananController::class, 'list_pemesanan']);
    Route::get('/caripemesanan', [PemesananController::class, 'cariPemesanan']);
    Route::get('/caribarangpemesanan', [PemesananController::class, 'cariBarangPemesanan']);

    Route::get('/cariemail', [PemesananController::class, 'cari_email']);
    Route::post('/cariemail', [PemesananController::class, 'konfirmasi_pemesanan']);

    //Route::get('/konfirmasi_pemesanan', [PemesananController::class, 'konfirmasi_pemesanan']);

    //supplier
    Route::get('/supplier', [SupplierController::class, 'form_supplier']);
    Route::post('/supplier', [SupplierController::class, 'tambah_supplier']);
    Route::get('/listsupplier', [SupplierController::class, 'list_supplier']);
    Route::get('/supplier/delete/{id}', [SupplierController::class, 'deletesupplier']);
    Route::get('/supplier/update/{id}', [SupplierController::class, 'updateindex_supplier']);
    Route::post('/supplier/update', [SupplierController::class, 'updatesupplier']);
    Route::get('/carisupplier', [SupplierController::class, 'cariSupplier']);

    //pegawai
    Route::get('/pegawai', [PegawaiController::class, 'form_pegawai']);
    Route::post('/pegawai', [PegawaiController::class, 'tambah_pegawai']);
    Route::get('/listpegawai', [PegawaiController::class, 'list_pegawai']);
    Route::get('/pegawai/delete/{id}', [PegawaiController::class, 'deletepegawai']);
    Route::get('/pegawai/update/{id}', [PegawaiController::class, 'updateindex_pegawai']);
    Route::post('/pegawai/update', [PegawaiController::class, 'updatepegawai']);
    Route::get('/caripegawai', [PegawaiController::class, 'cariPegawai']);

    //admin
    Route::get('/admin', [AdminController::class, 'form_admin']);
    Route::post('/admin', [AdminController::class, 'tambah_admin']);
    Route::get('/listadmin', [AdminController::class, 'list_admin']);
    Route::get('/admin/delete/{id}', [AdminController::class, 'deleteadmin']);
    Route::get('/admin/update/{id}', [AdminController::class, 'updateindex_admin']);
    Route::post('/admin/update', [AdminController::class, 'updateadmin']);
    Route::get('/cariadmin', [AdminController::class, 'cariAdmin']);

});

//PEGAWAI
Route::prefix('pegawai')->middleware(['pegawaiCek'])->group(function () {
    // PENERIMAAN
    Route::get('/', [PenerimaanController::class, 'list_pengiriman_pegawai']);
    Route::get('/send/{id}', [PenerimaanController::class, 'acceptindex_pegawai']);
    Route::post('/send', [PenerimaanController::class, 'accept_pegawai']);
    Route::get('/caripenerimaan', [PenerimaanController::class, 'cariPenerimaan']);

    // BARANG
    Route::get('/listbarang', [BarangController::class, 'list_barangpegawai']);
    Route::get('/caribarangpegawai', [BarangController::class, 'cariBarangPegawai']);

    // RETUR
    Route::get('/listretur', [PenerimaanController::class, 'list_retur']);
    Route::get('/retur/{id}', [PenerimaanController::class, 'index_retur']);
    Route::post('/retur', [PenerimaanController::class, 'tambah_retur']);
    Route::get('/cariretur', [PenerimaanController::class, 'cariRetur']);

    // PENJUALAN
    Route::get('/listpenjualan', [PenjualanController::class, 'list_penjualan']);
    Route::get('/penjualan/delete/{id}', [PenjualanController::class, 'delete_penjualan']);
    Route::get('/penjualan', [PenjualanController::class, 'penjualan']);
    Route::post('/penjualan', [PenjualanController::class, 'penjualan_input']);
    Route::get('/caripenjualan', [PenjualanController::class, 'cariPenjualan']);
    Route::get('/caribarangpenjualan', [PenjualanController::class, 'cariBarangPenjualan']);

    //REPORT
    Route::get('/report', [PenjualanController::class, 'report']);
    Route::post('/report', [PenjualanController::class, 'report_payment']);

});

//SUPPLIER
Route::prefix('supplier')->middleware(['supplierCek'])->group(function () {
    // Route::get('/', [PembelianController::class, 'form_pembelian']);
    Route::get('/', [PemesananController::class, 'list_pemesanan_supplier']);
    Route::get('/supplier/send/{id}', [PemesananController::class, 'sendindex_supplier']);
    Route::post('/supplier/send', [PemesananController::class, 'send_supplier']);
    Route::get('/caribarang', [PemesananController::class, 'cariListPesanan']);
});
