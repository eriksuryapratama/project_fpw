<?php

namespace App\Http\Controllers;

use App\Models\Dtrans;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function list_penjualan()
    {
        $result = Dtrans::all();
        $param = [];
        $param['result'] = $result;

        return view('fitur_pegawai.list_pegawai.list_penjualan', $param);
    }
}
