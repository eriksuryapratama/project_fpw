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
    ///------------------------------PEGAWAI------------------------------///
    /////////////////////////////////////////////////////////////////////////

    // FUNGSI FORM PEGAWAI
    public function form_pegawai()
    {
        return view('fitur_admin.form_tambah.tambah_pegawai');
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

        return view('fitur_admin.list_admin.list_pegawai', $param);
     }

    // DELETE PEGAWAI
    public function deletepegawai(Request $req)
    {

        Pegawai::find($req->id)->delete();
        return redirect('admin/listpegawai');
    }

    public function updateindex_pegawai(Request $req)
    {
        $pegawai = Pegawai::find($req->id);
        $data['result'] = $pegawai;
        return view('fitur_admin.form_edit.edit_pegawai', $data);
    }

    // EDIT PEGAWAI
    public function updatepegawai(Request $req)
    {
        $rules = [
            'nama_pegawai' => 'required',
            'telepon' => ['required', 'min:10', new CekAngka()],
        ];

        // ERROR MESSAGE
        $custom_msg = [
            'required' => ':attribute harus diisi !'
        ];

        // VALIDATE
        $this->validate($req, $rules, $custom_msg);

        // UPDATE DATA Pegawai
        $result = Pegawai::find($req->id)->update([
            "nama_pegawai"=>$req->nama_pegawai,
            "telepon"=>$req->telepon
        ]);

        return redirect('/admin/listpegawai');
    }
}
