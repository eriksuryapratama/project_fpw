<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pemesanan;
use App\Models\Retur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    /////////////////////////////////////////////////////////////////////////
    ///------------------------------RETUR--------------------------------///
    /////////////////////////////////////////////////////////////////////////

    // LIST RETUR
    public function list_retur()
    {
        $result = Retur::all();
        $param = [];
        $param['result'] = $result;

       return view('fitur_pegawai.list_pegawai.list_retur', $param);
    }

    // CARI INDEX RETUR
    public function index_retur(Request $req)
    {
        $pemesanan = Pemesanan::find($req->id);
        $data['result'] = $pemesanan;
        return view('fitur_pegawai.form_tambah.tambah_retur', $data);
    }

    // TAMBAH RETUR
    public function tambah_retur(Request $req)
    {
         // RULES
         $rules = [
            'alasan' => 'required'
        ];

        // ERROR MESSAGE
        $custom_msg = [
            'required' => ':attribute harus diisi!'
        ];

        // VALIDASI
        $this->validate($req, $rules, $custom_msg);

        // KODE RETUR
        $jum = Retur::select(DB::raw('count(*) as nama_barang'))->first();
        $kd_retur = "R".str_pad((intval($jum->nama_barang) + 1),4,"0",STR_PAD_LEFT);

        // KODE PEGAWAI
        $kd_pegawai =  Auth::guard('pegawai_guard')->user()->kode_pegawai;

        // UPDATE STATUS BARANG
        Pemesanan::find($req->id)->update([
            "cek_terima" => 1,
        ]);

        // INPUT DATABASE RETUR
        $data['kode_retur'] = $kd_retur;
        $data['nama_barang'] = $req->nama_barang;
        $data['satuan_barang'] = $req->satuan_barang;
        $data['jumlah'] = $req->jumlah;
        $data['kode_supplier'] = $req->kode_supplier;
        $data['kode_pegawai'] = $kd_pegawai;
        $data['alasan'] = $req->alasan;
        Retur::create($data);

        return redirect('pegawai/listretur');
    }

}
