<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Dtrans;
use App\Models\Htrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function list_penjualan()
    {
        $result = Htrans::all();
        $param = [];
        $param['result'] = $result;

        return view('fitur_pegawai.list_pegawai.list_penjualan', $param);
    }

    public function delete_penjualan(Request $req)
    {
        Htrans::find($req->id)->delete();
        return redirect('pegawai/listpenjualan');
    }

    public function penjualan()
    {
        $result = Barang::all();
        $param = [];
        $param['result'] = $result;

        return view('fitur_pegawai.list_pegawai.konfirmasi_penjualan', $param);
    }

    public function penjualan_input(Request $req)
    {
        $barang_list = Barang::find($req->id);

        $total = intval($barang_list->harga_barang) * $req->jumlah_beli;

        //KODE NOTA
        $jum = DB::table('dtrans')->select(DB::raw('count(*) as jumlah'))->first();
        $no_nota = "N".str_pad((intval($jum->jumlah) + 1),4,"0",STR_PAD_LEFT);

        $result = Htrans::create([
            "no_nota"=>$no_nota,
            "nama_barang"=>$barang_list->nama_barang,
            "satuan_barang"=>$barang_list->satuan_barang,
            "harga_barang"=>$barang_list->harga_barang,
            "jumlah"=>$req->jumlah_beli,
            "total"=>$total
        ]);

        return redirect('pegawai/penjualan');
    }
}
