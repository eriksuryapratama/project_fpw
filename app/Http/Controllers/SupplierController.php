<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Supplier;
use App\Rules\CekAngka;
use App\Rules\CekUsernameSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{
     /////////////////////////////////////////////////////////////////////////
    ///-----------------------------SUPPLIER------------------------------///
    /////////////////////////////////////////////////////////////////////////

    // FUNGSI FORM SUPPLIER
    public function form_supplier()
    {
        return view('fitur_admin.form_tambah.tambah_supplier');
    }

    // FUNGSI TAMBAH SUPPLIER
    public function tambah_supplier(Request $request)
    {
        // RULES
        $rules = [
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'telepon' => ['required', 'min:10', new CekAngka()],
            'email' => 'required | email',
            'username' => ['required', 'regex:/^\S*$/u', new CekUsernameSupplier()],
            'password' => 'required | confirmed',
            'password_confirmation' => 'required'
        ];

        // ERROR MESSAGE
        $custom_msg = [
            'required' => ':attribute harus diisi!',
            'min' => ':attribute minimal 10 angka',
            'confirmed' => 'password dan confirm password harus sama !',
            'email' => ':attribute harus sesuai format !',
            'regex' => ':attribute tidak boleh menggunakan spasi !'
        ];

        // VALIDASI
        $this->validate($request, $rules, $custom_msg);

        // BUAT KODE SUPPLIER
        $jum = Supplier::select(DB::raw('count(*) as nama_supplier'))->first();
        $kd_supplier = "S".str_pad((intval($jum->nama_supplier) + 1),4,"0",STR_PAD_LEFT);

        //input ke database
        $data = $request->all();
        $data['kode_supplier'] = $kd_supplier;
        $data['password'] = Hash::make($data['password']);
        Supplier::create($data);

        return redirect('admin/listsupplier');
    }

    // FUNGSI LIST SUPPLIER
    public function list_supplier()
    {
       $result = Supplier::all();
       $param = [];
       $param['result'] = $result;

       return view('fitur_admin.list_admin.list_supplier', $param);
    }

    public function deletesupplier(Request $req)
    {
        Supplier::find($req->id)->delete();
        return redirect('admin/listsupplier');
    }

    public function updateindex_supplier(Request $req)
    {
        $supplier = Supplier::find($req->id);
        $data['result'] = $supplier;
        return view('fitur_admin.form_edit.edit_supplier', $data);
    }

    public function updatesupplier(Request $req)
    {
        $rules = [
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'telepon' => ['required', 'min:10', new CekAngka()],
            'email' => 'required | email',
            'username' => ['required', 'regex:/^\S*$/u', new CekUsernameSupplier()]
        ];

        // ERROR MESSAGE
        $custom_msg = [
            'required' => ':attribute harus diisi !',
            'min' => ':attribute minimal 10 angka',
            'regex' => ':attribute tidak boleh menggunakan spasi !'
        ];

        // VALIDATE
        $this->validate($req, $rules, $custom_msg);

        // UPDATE DATA Kategori
        $result = Supplier::find($req->id)->update([
            "nama_supplier"=>$req->nama_supplier,
            "alamat"=>$req->alamat,
            "telepon"=>$req->telepon,
            "email"=>$req->email,
            "username"=>$req->username
        ]);

        return redirect('/admin/listsupplier');
    }


}
