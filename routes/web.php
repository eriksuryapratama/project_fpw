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
Route::post('/login' , [SiteController::class, 'cekLogin']);

//ADMIN
//ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'kategori']);
    Route::get('/kategori', [AdminController::class, 'kategori']);
    Route::post('/kategori', [AdminController::class, 'tambah_kategori']);
});

// Aku adalah manusia tampanaaaaa
