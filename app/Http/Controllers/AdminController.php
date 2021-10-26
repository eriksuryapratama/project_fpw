<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    ///fungsi untuk menampilkan halaman Admin
    public function kategori()
    {
        return view('fitur_admin.kategori');
    }
}
