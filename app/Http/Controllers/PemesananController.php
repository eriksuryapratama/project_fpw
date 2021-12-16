<?php

namespace App\Http\Controllers;

use App\Mail\PemesananMail;
use App\Models\Barang;
use App\Models\Pemesanan;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PemesananController extends Controller
{
    // FUNGSI FORM PEMESANAN
    public function form_pemesanan()
    {
        $supplier = Supplier::all();
        $data = [];
        $data['supplier'] = $supplier;

        return view('fitur_admin.form_tambah.form_pemesanan', $data);
    }

    // FUNGSI TAMBAH PEMESANAN
    public function tambah_pemesanan(Request $request)
    {
         //setting rule
         $rules = [
            'jumlah' => 'required',
            'kode_supplier' => 'required'
        ];

        //seting custom message
        $custom_msg = [
            'required' => ':attribute harus diisi!',
        ];

        //validasi
        $this->validate($request, $rules, $custom_msg);

        //buat kode pemesanan
        $jum = Pemesanan::select(DB::raw('count(*) as nama_barang'))->first();
        $kd_pemesanan = "M".str_pad((intval($jum->nama_barang) + 1),4,"0",STR_PAD_LEFT);

        //input ke database
        $data = $request->all();
        $data['kode_pemesanan'] = $kd_pemesanan;
        Pemesanan::create($data);

        //kirim email
        $cariemail = Supplier::where('kode_supplier','=',$request->kode_supplier)->first();

        $pemesanan = Pemesanan::where('kode_supplier','=',$request->kode_supplier)->get();

        Mail::to($cariemail->email)->send(new PemesananMail($pemesanan));

        return redirect('admin/listpemesanan');
    }

    // FUNGSI TAMBAH PEMESANAN
    public function index_pemesanan(Request $request)
    {
        $admin = Barang::find($request->id);
        $data['data'] = $admin;

        $supplier = Supplier::all();
        $data2 = [];
        $data2['supplier'] = $supplier;

        return view('fitur_admin.form_tambah.form_pemesanan', $data, $data2);
    }

    // LIST BARANG
    public function list_barang()
    {
        $result = Barang::all();
        $param = [];
        $param['result'] = $result;

        return view('fitur_admin.list_admin.list_barang_pemesanan', $param);
    }

    // LIST PEMESANAN
    public function list_pemesanan()
    {
        $result = Pemesanan::all()->where('cek_kirim',0)->where('cek_terima',0);
        $param = [];
        $param['result'] = $result;

        return view('fitur_admin.list_admin.list_pemesanan', $param);
    }

    // LIST PEMESANAN SUPPLIER
    public function list_pemesanan_supplier()
    {
        $result = Pemesanan::all()->where('cek_kirim',0)
                                ->where('cek_terima',0)->where('kode_supplier',Auth::guard('supplier_guard')->user()->kode_supplier);
        $param = [];
        $param['result'] = $result;

        return view('fitur_supplier.listpemesanan', $param);
    }

    // AMBIL INDEX PEMESANAN
    public function sendindex_supplier(Request $req)
    {
        $pemesanan = Pemesanan::find($req->id);
        $data['result'] = $pemesanan;
        return view('fitur_supplier.konfirmasi_pemesanan', $data);
    }

    // UPDATE PEMESANAN
    public function send_supplier(Request $req)
    {
        $result = Pemesanan::find($req->id)->update([
            "cek_kirim" => 1,
        ]);

        return redirect('/supplier');
    }

    public function cariListPesanan(Request $request)
    {
        $cari = $request->cari;

        if($request->kategori == "snama"){
            $caridata = Pemesanan::where('nama_barang', 'like', "%".$cari."%")
                                 ->where('cek_kirim',0)
                                 ->where('cek_terima',0)->where('kode_supplier',Auth::guard('supplier_guard')->user()->kode_supplier)
                                 ->get();
            return view('fitur_supplier.listpemesanan',['result' => $caridata]);
        }
        if($request->kategori == "ssatuan"){
            $caridata = Pemesanan::where('satuan_barang', 'like', "%".$cari."%")
                                 ->where('cek_kirim',0)
                                 ->where('cek_terima',0)->where('kode_supplier',Auth::guard('supplier_guard')->user()->kode_supplier)
                                 ->get();
            return view('fitur_supplier.listpemesanan',['result' => $caridata]);
        }
        else{
            $barang = Pemesanan::all()->where('cek_kirim',0)
                                      ->where('cek_terima',0)->where('kode_supplier',Auth::guard('supplier_guard')->user()->kode_supplier);
            $data = [];
            $data['result'] = $barang;
            return view('fitur_supplier.listpemesanan', $data);
        }
    }

    // CARI PEMESANAN
    public function cariPemesanan(Request $request)
    {
        // menangkap data pencarian
		$cari = $request->cari;

        // jika dicari berdasarkan nama barang
        if($request->kategori == "snama"){
            $caridata = Pemesanan::where('nama_barang', 'like', "%".$cari."%")
                                 ->where('cek_kirim',0)
                                 ->where('cek_terima',0)
                                 ->get();
            return view('fitur_admin.list_admin.list_pemesanan',['result' => $caridata]);
        }

        // jika dicari berdasarkan satuan
        if($request->kategori == "ssatuan"){
            $caridata = Pemesanan::where('satuan_barang', 'like', "%".$cari."%")
                                 ->where('cek_kirim',0)
                                 ->where('cek_terima',0)
                                 ->get();
            return view('fitur_admin.list_admin.list_pemesanan',['result' => $caridata]);
        }

        // jika tidak sedang mencari
        else{
            $barang = Pemesanan::all()->where('cek_kirim',0)
                                      ->where('cek_terima',0);
            $data = [];
            $data['result'] = $barang;
            return view('fitur_admin.list_admin.list_pemesanan', $data);
        }
    }

    // CARI BARANG PEMESANAN
    public function cariBarangPemesanan(Request $request)
    {
        // menangkap data pencarian
		$cari = $request->cari;

        // jika dicari berdasarkan nama barang
        if($request->kategori == "snama"){
            $caridata = Barang::where('nama_barang', 'like', "%".$cari."%")->get();
            return view('fitur_admin.list_admin.list_barang_pemesanan',['result' => $caridata]);
        }

        // jika dicari berdasarkan kategori
        if($request->kategori == "ssatuan"){
            $caridata = Barang::where('satuan_barang', 'like', "%".$cari."%")->get();
            return view('fitur_admin.list_admin.list_barang_pemesanan',['result' => $caridata]);
        }

        // jika dicari berdasarkan harga
        if($request->kategori == "sharga"){
            $caridata = Barang::where('harga_barang', 'like', "%".$cari."%")->get();
            return view('fitur_admin.list_admin.list_barang_pemesanan',['result' => $caridata]);
        }

        // jika tidak sedang mencari
        else{
            $barang = Barang::all();
            $data = [];
            $data['result'] = $barang;
            return view('fitur_admin.list_admin.list_barang_pemesanan', $data);
        }
    }
}
