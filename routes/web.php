<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;
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

Route::get('/', function () {
    return view('welcome');
});

//LOGIN
Route::get('/' , [SiteController::class, 'login']);
Route::get('/login' , [SiteController::class, 'login']);
Route::post('/login' , [SiteController::class, 'do_login']);

//ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'kategori']);

    //kategori
    Route::get('/kategori', [AdminController::class, 'kategori']);
    Route::post('/kategori', [AdminController::class, 'tambah_kategori']);
    Route::get('/listkategori', [AdminController::class, 'list_kategori']);

    //barang
    Route::get('/barang', [AdminController::class, 'barang']);
    Route::post('/barang', [AdminController::class, 'tambah_barang']);

    //supplier
    Route::get('/supplier', [AdminController::class, 'supplier']);
    Route::post('/supplier', [AdminController::class, 'tambah_supplier']);
    Route::get('/listsupplier', [AdminController::class, 'list_supplier']);

    //pegawai
    Route::get('/user', [AdminController::class, 'user']);
    Route::post('/user', [AdminController::class, 'tambah_user']);
    Route::get('/listuser', [AdminController::class, 'list_user']);

});

//PEGAWAI
