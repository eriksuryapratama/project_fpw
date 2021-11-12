<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembelianController extends Controller
{
     // FUNGSI FORM PEMBELIAN
     public function form_pembelian()
     {
         return view('fitur_supplier.listpemesanan');
     }
}
