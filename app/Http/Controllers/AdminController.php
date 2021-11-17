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

     //Delete Admin
     public function deleteadmin(Request $req)
    {

        Admin::find($req->id)->delete();
        return redirect('admin/listadmin');
    }
    public function updateindex_admin(Request $req)
    {


        $admin = Admin::find($req->id);
        $data['result'] = $admin;
        return view('fitur_admin.edit_admin', $data);
    }
    public function updateadmin(Request $req)
    {
        $rules = [
            'nama_admin' => 'required',
            'telepon' => ['required', 'min:10', new CekAngka()],

        ];

        // ERROR MESSAGE
        $custom_msg = [
            'required' => ':attribute harus diisi !'
        ];

        // VALIDATE
        $this->validate($req, $rules, $custom_msg);

        // UPDATE DATA Kategori
        $result = Admin::find($req->id)->update([
            "nama_admin"=>$req->nama_admin,
            "telepon"=>$req->telepon,
        ]);

        return redirect('/admin/listadmin');
    }
}
