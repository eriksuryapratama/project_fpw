<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pemesanan;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $result = Pemesanan::all();
        $param = [];
        $param['result'] = $result;

        return view('fitur_admin.list_admin.list_pemesanan', $param);
    }
}
