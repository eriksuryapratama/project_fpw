<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PenerimaanController extends Controller
{
    //function menampilkan data yang cek kirim = 1 dan cek terima = 0
    public function list_pengiriman_pegawai()
    {
        $result = Pemesanan::all()->where('cek_kirim',1)
                                    ->where('cek_terima',0);
        $param = [];
        $param['result'] = $result;

        return view('fitur_pegawai.listpengiriman', $param);
    }

    //function menampilkan form konfirmasi
    public function acceptindex_pegawai(Request $req)
    {
        $pemesanan = Pemesanan::find($req->id);
        $data['result'] = $pemesanan;
        return view('fitur_pegawai.konfirmasi_pengiriman', $data);
    }

    //function untuk konfirmasi barang dan menambah stok ke tabel barang
    public function accept_pegawai(Request $req)
    {
        $stokbarang = Barang::where('nama_barang',$req->nama_barang)->get();
        $stokbeli = $req->jumlah_barang;
        $stokhasil = intval($stokbarang[0]['stok_barang']) + $stokbeli;

        //update cek terima menjadi 1
        $result = Pemesanan::find($req->id)->update([
            "cek_terima" => 1,
        ]);
        //update stok barang nambah
        $result2 = Barang::where('nama_barang',$req->nama_barang)->update([
            "stok_barang" => $stokhasil,
        ]);

        return redirect('/pegawai');
    }

}
