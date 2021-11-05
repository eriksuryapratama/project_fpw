<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\modelKategori;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
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
        $kategori = new Kategori();
        $kategori->kode_kategori = $kd_kategori;
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->save();

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

    //fungsi untuk menampilkan halaman barang
    public function barang()
    {

        return view('fitur_admin.barang');
    }

    //fungsi untuk tambah barang
    public function tambah_barang()
    {

        return view('fitur_admin.barang');
    }

    /////////////////////////////////////////////////////////////////////////

    //fungsi untuk menampilkan halaman supplier
    public function supplier()
    {

        return view('fitur_admin.supplier');
    }

    //fungsi untuk tambah supplier
    public function tambah_supplier()
    {

        return view('fitur_admin.supplier');
    }

    /////////////////////////////////////////////////////////////////////////

    //fungsi untuk menampilkan form tambah pegawai
    public function user()
    {
        return view('fitur_admin.tambah_pegawai');
    }

    //fungsi untuk tambah pegawai
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
        $user = new Users();
        $user->kode_user = $kd_user;
        $user->nama_user = $request->input('nama_user');
        $user->alamat_user = $request->input('alamat_user');
        $user->status_user = $request->input('status_user');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('admin/listuser');
    }

     //fungsi untuk menampilkan halaman list kategori
     public function list_user()
     {
        $result = Users::all();
        $param = [];
        $param['result'] = $result;

        return view('fitur_admin.pegawai', $param);
     }
}
