<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\modelKategori;
use App\Models\Supplier;
use App\Models\Users;
use App\Rules\CekAngka;
use App\Rules\CekUsername;
use App\Rules\CekUsernameAdmin;
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

    //////////////////////////////////////////////////////////////////////////
    ///------------------------------ ADMIN ------------------------------///
    /////////////////////////////////////////////////////////////////////////

    //fungsi untuk menampilkan form tambah user
    public function form_admin()
    {
        return view('fitur_admin.tambah_admin');
    }

    //fungsi untuk tambah user
    public function tambah_admin(Request $request)
    {
        //setting rule
        $rules = [
            'nama_admin' => 'required',
            'telepon' => ['required', 'min:10', new CekAngka()],
            'username' => ['required', 'regex:/^\S*$/u', new CekUsernameAdmin()],
            'password' => 'required | confirmed',
            'password_confirmation' => 'required'
        ];

        //seting custom message
        $custom_msg = [
            'required' => ':attribute harus diisi!',
            'min' => ':attribute minimal 10 angka',
            'confirmed' => 'password dan confirm password harus sama !',
            'regex' => ':attribute tidak boleh menggunakan spasi !'
        ];

        //validasi
        $this->validate($request, $rules, $custom_msg);

        //buat kode user
        $jum = Admin::select(DB::raw('count(*) as nama_admin'))->first();
        $kd_admin = "A".str_pad((intval($jum->nama_admin) + 1),4,"0",STR_PAD_LEFT);

        //input ke database
        $data = $request->all();
        $data['kode_admin'] = $kd_admin;
        $data['password'] = Hash::make($data['password']);
        Admin::create($data);

        return redirect('admin/listadmin');
    }

     // FUNGSI LIST ADMIN
     public function list_admin()
     {
        $result = Admin::all();
        $param = [];
        $param['result'] = $result;

        return view('fitur_admin.admin', $param);
     }
}
