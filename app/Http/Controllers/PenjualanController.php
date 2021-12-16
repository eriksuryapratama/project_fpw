<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Dtrans;
use App\Models\Htrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function cariPenjualan(Request $request)
    {
        // menangkap data pencarian
		$cari = $request->cari;

        // jika dicari berdasarkan nama barang
        if($request->kategori == "snama"){
            $caridata = Htrans::where('nama_barang', 'like', "%".$cari."%")->get();
            return view('fitur_pegawai.list_pegawai.list_penjualan',['result' => $caridata]);
        }

        // jika dicari berdasarkan kategori
        if($request->kategori == "ssatuan"){
            $caridata = Htrans::where('satuan_barang', 'like', "%".$cari."%")->get();
            return view('fitur_pegawai.list_pegawai.list_penjualan',['result' => $caridata]);
        }

        // jika tidak sedang mencari
        else{
            $barang = Htrans::all();
            $data = [];
            $data['result'] = $barang;
            return view('fitur_pegawai.list_pegawai.list_penjualan', $data);
        }
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

    //CARI BARANG PENJUALAN
    public function cariBarangPenjualan(Request $request)
    {
        // menangkap data pencarian
		$cari = $request->cari;

        // jika dicari berdasarkan nama barang
        if($request->kategori == "snama"){
            $caridata = Barang::where('nama_barang', 'like', "%".$cari."%")->get();
            return view('fitur_pegawai.list_pegawai.konfirmasi_penjualan',['result' => $caridata]);
        }

        // jika dicari berdasarkan harga
        if($request->kategori == "sharga"){
            $caridata = Barang::where('harga_barang', 'like', "%".$cari."%")->get();
            return view('fitur_pegawai.list_pegawai.konfirmasi_penjualan',['result' => $caridata]);
        }

        // jika dicari berdasarkan kategori
        if($request->kategori == "ssatuan"){
            $caridata = Barang::where('satuan_barang', 'like', "%".$cari."%")->get();
            return view('fitur_pegawai.list_pegawai.konfirmasi_penjualan',['result' => $caridata]);
        }

        // jika tidak sedang mencari
        else{
            $barang = Barang::all();
            $data = [];
            $data['result'] = $barang;
            return view('fitur_pegawai.list_pegawai.konfirmasi_penjualan', $data);
        }
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

        $stokbarang = intval($barang_list->stok_barang);
        $inputjumlah = $req->jumlah_beli;
        $stokakhir = $stokbarang - $inputjumlah;


        $result2 = Barang::find($req->id)->update([
            "stok_barang" => $stokakhir
        ]);



        return redirect('pegawai/report');
    }
    public function report(Request $req)
    {
        $subtotal = 0;
        $jum = DB::table('dtrans')->select(DB::raw('count(*) as jumlah'))->first();
        $no_nota = "N".str_pad((intval($jum->jumlah) + 1),4,"0",STR_PAD_LEFT);
        $result = DB::table('htrans')->where('no_nota','=',$no_nota)->get();

        foreach ($result as $item) {
            $subtotal += $item->total;
        }
        $param['result'] = $result;
        $param['subtotal'] = $subtotal;
        return view('fitur_pegawai.list_pegawai.report_penjualan', $param);
    }
    public function report_payment(Request $req)
    {
        $jum = DB::table('dtrans')->select(DB::raw('count(*) as jumlah'))->first();
        $no_nota = "N".str_pad((intval($jum->jumlah) + 1),4,"0",STR_PAD_LEFT);
        // $pegawai = $req->session()->get('pegawai');
        $pegawai = Auth::guard('pegawai_guard')->user()->kode_pegawai;

        $result = Dtrans::create([
            "no_nota"=>$no_nota,
            "kode_pegawai"=>$pegawai,
            "subtotal"=>$req->subtotal
        ]);

        if($result){
            return redirect('/pegawai/report')->with('message', 'Payment Success');
        }else {
            return redirect('/pegawai/report')->with('message', 'Payment Failed');
        }
    }
}
