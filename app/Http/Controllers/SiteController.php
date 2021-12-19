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

    //fungsi untuk logout
    public function logout()
    {
        if (Auth::guard('admin_guard')->check()) {
            Auth::guard('admin_guard')->logout();
            return redirect('/login');

        } else if (Auth::guard('pegawai_guard')->check()) {
            Auth::guard('pegawai_guard')->logout();
            return redirect('/login');
        }

        else {
            Auth::guard('supplier_guard')->logout();
            return redirect('/login');
        }
    }

    //fungsi untuk pengecekkan login
    public function do_login(Request $request)
    {
        // RULES
        $rules = [
            'password' => 'required',
            'username' => 'required'
        ];

        // ERROR MESSAGE
        $custom_msg = [
            'required' => ':attribute harus diisi!',
        ];

        // VALIDASI
        $this->validate($request, $rules, $custom_msg);

        // CEK STATUS LOGIN DAN AUTHENTIKASI
        if ($request->role == 'admin') {
            // AMBIL ISI DB
            $credential = [
                "username" => $request->username,
                "password" => $request->password
            ];

            //CEK GUARD
            $result = Auth::guard('admin_guard')->attempt($credential);

            //JIKA DAPAT
            if ($result) {
                return redirect('admin/listadmin')->with('message', 'Berhasil Login');
            } else {
                return redirect('login')->with('message', 'Username / Password anda salah !');
            }
        }
        elseif ($request->role == 'pegawai') {
            // AMBIL ISI DB
            $credential = [
                "username" => $request->username,
                "password" => $request->password
            ];

            // CEK GUARD
            $result = Auth::guard('pegawai_guard')->attempt($credential);

            //JIKA DAPAT
            if ($result) {
                return redirect('pegawai/')->with('message', 'Berhasil Login');
            } else {
                return redirect('login')->with('message', 'Username / Password anda salah !');
            }
        }
        elseif ($request->role == 'supplier') {
            // AMBIL ISI DB
            $credential = [
                "username" => $request->username,
                "password" => $request->password
            ];

            // CEK GUARD
            $result = Auth::guard('supplier_guard')->attempt($credential);

            //JIKA DAPAT
            if ($result) {
                return redirect('supplier/')->with('message', 'Berhasil Login');
            } else {
                return redirect('login')->with('message', 'Username / Password anda salah !');
            }
        }
        else{
            return redirect('login')->with('message', 'Role anda salah !');
        }
    }

}
