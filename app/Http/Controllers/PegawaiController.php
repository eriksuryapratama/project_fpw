<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Rules\CekAngka;
use App\Rules\CekUsernamePegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /////////////////////////////////////////////////////////////////////////
    ///-------------------------------USER--------------------------------///
    /////////////////////////////////////////////////////////////////////////

    // FUNGSI FORM USER
    public function form_pegawai()
    {
        return view('fitur_admin.tambah_pegawai');
    }

    // FUNGSI TAMBAH PEGAWAI
    public function tambah_pegawai(Request $request)
    {
        // RULES
        $rules = [
            'nama_pegawai' => 'required',
            'telepon' => ['required', 'min:10', new CekAngka()],
            'username' => ['required', 'regex:/^\S*$/u', new CekUsernamePegawai()],
            'password' => 'required | confirmed',
            'password_confirmation' => 'required'
        ];

        // ERROR MESSAGE
        $custom_msg = [
            'required' => ':attribute harus diisi!',
            'min' => ':attribute minimal 10 angka',
            'confirmed' => 'password dan confirm password harus sama !',
            'regex' => ':attribute tidak boleh menggunakan spasi !'
        ];

        // VALIDASI
        $this->validate($request, $rules, $custom_msg);

        // KODE PEGAWAI
        $jum = Pegawai::select(DB::raw('count(*) as nama_pegawai'))->first();
        $kd_pegawai = "P".str_pad((intval($jum->nama_pegawai) + 1),4,"0",STR_PAD_LEFT);

        //input ke database
        $data = $request->all();
        $data['kode_pegawai'] = $kd_pegawai;
        $data['password'] = Hash::make($data['password']);
        Pegawai::create($data);

        return redirect('admin/listpegawai');
    }

     // FUNGSI LIST PEGAWAI
     public function list_pegawai()
     {
        $result = Pegawai::all();
        $param = [];
        $param['result'] = $result;

        return view('fitur_admin.pegawai', $param);
     }
}
