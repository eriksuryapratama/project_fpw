<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\modelKategori;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    ///fungsi untuk menampilkan form tambah kategori
    public function kategori()
    {
        // $result = Kategori::create([
        //     'kode_kategori' => $req->nl,
        //     'nama_kategori' => $req->uname,
        //     'nomor_telepon' => $req->nt,
        //     'alamat' => $req->almt,
        //     'email' => $req->eml_rgs,
        //     'password' => $req->psw,
        // ]);
        return view('fitur_admin.tambah_kategori');
    }

    //fungsi untuk tambah admin
    public function tambah_kategori()
    {

        return redirect('admin/kategori');
    }

    //fungsi untuk menampilkan halaman list kategori
    public function list_kategori()
    {
        $result = Kategori::all();
        $param = [];
        $param['result'] = $result;
        return view('fitur_admin.kategori', $param);
    }

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

    //fungsi untuk menampilkan halaman kategori
    public function supplier()
    {

        return view('fitur_admin.supplier');
    }

    //fungsi untuk tambah barang
    public function tambah_supplier()
    {

        return view('fitur_admin.supplier');
    }

    //fungsi untuk menampilkan halaman pegawai
    public function pegawai()
    {
        return view('fitur_admin.pegawai');
    }

    //fungsi untuk tambah barang
    public function tambah_pegawai()
    {

        return view('fitur_admin.pegawai');
    }
}
