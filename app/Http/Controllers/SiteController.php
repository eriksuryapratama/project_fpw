<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    //fungsi untuk menampilkan menuBar login
    public function login()
    {
        return view('fitur_website.login');
    }

    //fungsi untuk pengecekkan login
    public function do_login(Request $request)
    {
        //ambil data dari database
        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];

        //cek authentikasi
        if(Auth::guard('pegawai_guard')->attempt($credential)){
            if(Auth::guard('pegawai_guard')->user()->status_user == 'admin'){
                return redirect('admin/listkategori');
            }else{
                // return redirect('user');
                dd("kasir");
            }
        }else{
            return redirect('login')->with('pesan','Gagal Login !');
        }
    }

}
