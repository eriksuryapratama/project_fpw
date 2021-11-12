<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenerimaanController extends Controller
{
    // FUNGSI FORM PENERIMAAN
    public function form_penerimaan()
    {
        return view('fitur_pegawai.listpengiriman');
    }
}
