<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{

    /////////////////////////////////////////////////////////////////////////
    ///----------------------------KATEGORI-------------------------------///
    /////////////////////////////////////////////////////////////////////////

    // FUNGSI FORM KATEGORI
    public function form_kategori()
    {
        return view('fitur_admin.tambah_kategori');
    }

    // FUNGSI TAMBAH KATEGORI
    public function tambah_kategori(Request $request)
    {
        // RULES
        $rules = [
            'nama_kategori' => 'required'
        ];

        // ERROR MESSAGE
        $custom_msg = [
            'required' => ':attribute harus diisi!',
        ];

        // VALIDASI
        $this->validate($request, $rules, $custom_msg);

        // KODE KATEGORI
        $jum = Kategori::select(DB::raw('count(*) as nama_kategori'))->first();
        $kd_kategori = "K".str_pad((intval($jum->nama_kategori) + 1),4,"0",STR_PAD_LEFT);

        //input ke database
        $data = $request->all();
        $data['kode_kategori'] = $kd_kategori;
        Kategori::create($data);

        return redirect('admin/listkategori');
    }

    //fungsi untuk menampilkan halaman list kategori
    public function list_kategori()
    {
        $result = Kategori::all();
        $param = [];
        $param['result'] = $result;
        return view('fitur_admin.kategori', $param);
    }

    /////////////////////////////////////////////////////////////////////////
    ///------------------------------BARANG-------------------------------///
    /////////////////////////////////////////////////////////////////////////

    // FUNGSI FORM BARANG
    public function form_barang()
    {
        $kategori = Kategori::all();
        $data = [];
        $data['kategori'] = $kategori;

        return view('fitur_admin.tambah_barang',$data);
    }

    //fungsi untuk tambah barang
    public function tambah_barang(Request $request)
    {

        //setting rule
        $rules = [
            'nama_barang' => 'required',
            'satuan_barang' => 'required',
            'stok_barang' => 'required',
            'harga_barang' => 'required'
        ];

        //seting custom message
        $custom_msg = [
            'required' => ':attribute harus diisi!',
        ];

        //validasi
        $this->validate($request, $rules, $custom_msg);

        //buat kode supplier
        $jum = Barang::select(DB::raw('count(*) as nama_barang'))->first();
        $kd_barang = "B".str_pad((intval($jum->nama_barang) + 1),4,"0",STR_PAD_LEFT);

        //input ke database
        $data = $request->all();
        $data['kode_barang'] = $kd_barang;
        Barang::create($data);

        return redirect('admin/listbarang');
    }
    public function list_barang()
    {
        $result = Barang::all();
        $param = [];
        $param['result'] = $result;

       return view('fitur_admin.barang', $param);
    }
}
