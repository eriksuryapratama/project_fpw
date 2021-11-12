<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Rules\CekAngka;
use App\Rules\CekUsernameSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
     /////////////////////////////////////////////////////////////////////////
    ///-----------------------------SUPPLIER------------------------------///
    /////////////////////////////////////////////////////////////////////////

    // FUNGSI FORM SUPPLIER
    public function form_supplier()
    {
        return view('fitur_admin.tambah_supplier');
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
        Supplier::create($data);

        return redirect('admin/listsupplier');
    }

    // FUNGSI LIST SUPPLIER
    public function list_supplier()
    {
       $result = Supplier::all();
       $param = [];
       $param['result'] = $result;

       return view('fitur_admin.supplier', $param);
    }
}
