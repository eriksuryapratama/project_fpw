<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\modelKategori;
use App\Models\Supplier;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /////////////////////////////////////////////////////////////////////////
    ///----------------------------KATEGORI-------------------------------///
    /////////////////////////////////////////////////////////////////////////

    ///fungsi untuk menampilkan form tambah kategori
    public function kategori()
    {
        return view('fitur_admin.tambah_kategori');
    }

    //fungsi untuk tambah kategori
    public function tambah_kategori(Request $request)
    {
        //setting rule
        $rules = [
            'nama_kategori' => 'required'
        ];

        //seting custom message
        $custom_msg = [
            'required' => ':attribute harus diisi!',
        ];

        //validasi
        $this->validate($request, $rules, $custom_msg);

        //buat kode user
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

    //fungsi untuk menampilkan halaman barang
    public function barang()
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
            // 'nama_barang' => 'required',

            'satuan_barang' => 'required',
            'stok_barang' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required'
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

    /////////////////////////////////////////////////////////////////////////
    ///-----------------------------SUPPLIER------------------------------///
    /////////////////////////////////////////////////////////////////////////

    //fungsi untuk menampilkan halaman supplier
    public function supplier()
    {
        return view('fitur_admin.tambah_supplier');
    }

    //fungsi untuk tambah supplier
    public function tambah_supplier(Request $request)
    {
        //setting rule
        $rules = [
            'nama_supplier' => 'required',
            'alamat_supplier' => 'required',
            'kota_supplier' => 'required'
        ];

        //seting custom message
        $custom_msg = [
            'required' => ':attribute harus diisi!',
        ];

        //validasi
        $this->validate($request, $rules, $custom_msg);

        //buat kode supplier
        $jum = Supplier::select(DB::raw('count(*) as nama_supplier'))->first();
        $kd_supplier = "S".str_pad((intval($jum->nama_supplier) + 1),4,"0",STR_PAD_LEFT);

        //input ke database
        $data = $request->all();
        $data['kode_supplier'] = $kd_supplier;
        Supplier::create($data);

        return redirect('admin/listsupplier');
    }

    //fungsi untuk menampilkan halaman list supplier
    public function list_supplier()
    {
       $result = Supplier::all();
       $param = [];
       $param['result'] = $result;

       return view('fitur_admin.supplier', $param);
    }

    /////////////////////////////////////////////////////////////////////////
    ///-------------------------------USER--------------------------------///
    /////////////////////////////////////////////////////////////////////////

    //fungsi untuk menampilkan form tambah user
    public function user()
    {
        return view('fitur_admin.tambah_pegawai');
    }

    //fungsi untuk tambah user
    public function tambah_user(Request $request)
    {
        //setting rule
        $rules = [
            'nama_user' => 'required',
            'alamat_user' => 'required',
            'status_user' => 'required',
            'username' => 'required',
            'password' => 'required'
        ];

        //seting custom message
        $custom_msg = [
            'required' => ':attribute harus diisi!',
        ];

        //validasi
        $this->validate($request, $rules, $custom_msg);

        //buat kode user
        $jum = Users::select(DB::raw('count(*) as nama_user'))->first();
        $kd_user = "P".str_pad((intval($jum->nama_user) + 1),4,"0",STR_PAD_LEFT);

        //input ke database
        $data = $request->all();
        $data['kode_user'] = $kd_user;
        $data['password'] = Hash::make($data['password']);
        Users::create($data);

        return redirect('admin/listuser');
    }

     //fungsi untuk menampilkan halaman list user
     public function list_user()
     {
        $result = Users::all();
        $param = [];
        $param['result'] = $result;

        return view('fitur_admin.pegawai', $param);
     }
}
