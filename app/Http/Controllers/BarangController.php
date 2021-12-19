<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{

    /////////////////////////////////////////////////////////////////////////
    ///----------------------------KATEGORI-------------------------------///
    /////////////////////////////////////////////////////////////////////////

    // FUNGSI FORM KATEGORI
    public function form_kategori()
    {
        return view('fitur_admin.form_tambah.tambah_kategori');
    }

    // FUNGSI TAMBAH KATEGORI
    public function tambah_kategori(Request $request)
    {
        // RULES
        $rules = [
            'nama_kategori' => 'required'
        ];

        // ERROR MESSAGE
        $custom_msg = [
            'required' => ':attribute harus diisi!',
        ];

        // VALIDASI
        $this->validate($request, $rules, $custom_msg);

        // KODE KATEGORI
        $jum = Kategori::select(DB::raw('count(*) as nama_kategori'))->first();
        $kd_kategori = "K".str_pad((intval($jum->nama_kategori) + 1),4,"0",STR_PAD_LEFT);

        //input ke database
        $data = $request->all();
        $data['kode_kategori'] = $kd_kategori;
        Kategori::create($data);

        if($data){
            return redirect('/admin/listkategori')->with('message', 'Sukses menambah kategori');
        }else {
            return redirect('/admin/listkategori')->with('message', 'Gagal menambah kategori');
        }
    }

    // LIST KATEGORI
    public function list_kategori()
    {
        $result = Kategori::all();
        $param = [];
        $param['result'] = $result;
        return view('fitur_admin.list_admin.list_kategori', $param);
    }

    // DELETE KATEGORI
    public function deletekategori(Request $req)
    {

        Kategori::find($req->id)->delete();
        return redirect('admin/listkategori')->with('message', 'Sukses menghapus data kategori');
    }

    // AMBIL INDEX KATEGORI
    public function updateindex_kategori(Request $req)
    {
        $kategori = Kategori::find($req->id);
        $data['result'] = $kategori;
        return view('fitur_admin.form_edit.edit_kategori', $data);
    }

    // UPDATE KATEGORI
    public function updatekategori(Request $req)
    {
        $rules = [
            'nama_kategori' => 'required'
        ];

        // ERROR MESSAGE
        $custom_msg = [
            'required' => ':attribute harus diisi !'
        ];

        // VALIDATE
        $this->validate($req, $rules, $custom_msg);

        // UPDATE DATA Kategori
        Kategori::find($req->id)->update([
            "nama_kategori"=>$req->nama_kategori
        ]);

        return redirect('/admin/listkategori')->with('message', 'Data kategori berhasil diupdate');
    }

    // CARI KATEGORI
    public function cariKategori(Request $request)
    {
        // menangkap data pencarian
		$cari = $request->cari;

        // jika dicari berdasarkan nama kategori
        if($request->kategori == "snama"){
            $caridata = Kategori::where('nama_kategori', 'like', "%".$cari."%")->get();
            return view('fitur_admin.list_admin.list_kategori',['result' => $caridata]);
        }

        // jika tidak sedang mencari
        else{
            $kategori = Kategori::all();
            $data = [];
            $data['result'] = $kategori;
            return view('fitur_admin.list_admin.list_kategori', $data);
        }
    }

    /////////////////////////////////////////////////////////////////////////
    ///------------------------------BARANG-------------------------------///
    /////////////////////////////////////////////////////////////////////////

    // FUNGSI FORM BARANG
    public function form_barang()
    {
        $kategori = Kategori::all();
        $data = [];
        $data['kategori'] = $kategori;

        return view('fitur_admin.form_tambah.tambah_barang',$data);
    }

    //fungsi untuk tambah barang
    public function tambah_barang(Request $request)
    {
        //setting rule
        $rules = [
            'nama_barang' => 'required',
            'satuan_barang' => 'required',
            'stok_barang' => 'required',
            'harga_barang' => 'required'
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

        //nama file
        $imageName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('img_barang'), $imageName);

        //input ke database
        $result = Barang::create([
            'kode_barang' => $kd_barang,
            'nama_barang' => $request->nama_barang,
            'kode_kategori' => $request->kode_kategori,
            'satuan_barang' => $request->satuan_barang,
            'stok_barang' => $request->stok_barang,
            'harga_barang' => $request->harga_barang,
            'gambar' => $imageName
        ]);

        if($result){
            return redirect('/admin/listbarang')->with('message', 'Sukses menambah barang');
        }else {
            return redirect('/admin/listbarang')->with('message', 'Gagal menambah barang');
        }
    }

    // FUNGSI LIST BARANG ADMIN
    public function list_barang()
    {
        $result = Barang::all();
        $param = [];
        $param['result'] = $result;

       return view('fitur_admin.list_admin.list_barang', $param);
    }

    // FUNGSI LIST BARANG PEGAWAI
    public function list_barangpegawai()
    {
        $result = Barang::all();
        $param = [];
        $param['result'] = $result;

       return view('fitur_pegawai.listbarangpegawai', $param);
    }

    // FUNGSI DELETE BARANG
    public function deletebarang(Request $req)
    {
        Barang::find($req->id)->delete();
        return redirect('admin/listbarang')->with('message', 'Sukses menghapus data barang');
    }

    // FUNGSI AMBIL ID BARANG
    public function updateindex_barang(Request $req)
    {
        $barang = Barang::find($req->id);
        $data['result'] = $barang;
        return view('fitur_admin.form_edit.edit_barang', $data);
    }

    // FUNGSI UPDATE BARANG
    public function updatebarang(Request $req)
    {
        $rules = [
            'nama_barang' => 'required',
            'satuan_barang' => 'required',
            'stok_barang' => 'required',
            'harga_barang' => 'required'
        ];

        // ERROR MESSAGE
        $custom_msg = [
            'required' => ':attribute harus diisi !'
        ];

        // VALIDATE
        $this->validate($req, $rules, $custom_msg);

        // UPDATE DATA Barang
        $result = Barang::find($req->id)->update([
            "nama_barang"=>$req->nama_barang,
            "satuan_barang"=>$req->satuan_barang,
            "stok_barang"=>$req->stok_barang,
            "satuan_barang"=>$req->satuan_barang,
            "harga_barang"=>$req->harga_barang
        ]);

        return redirect('/admin/listbarang')->with('message', 'Data barang berhasil diupdate');
    }

    //CARI BARANG PEGAWAI
    public function cariBarangPegawai(Request $request)
    {
        // menangkap data pencarian
		$cari = $request->cari;

        // jika dicari berdasarkan nama barang
        if($request->kategori == "snama"){
            $caridata = Barang::where('nama_barang', 'like', "%".$cari."%")->get();
            return view('fitur_pegawai.listbarangpegawai',['result' => $caridata]);
        }

        // jika dicari berdasarkan kategori
        if($request->kategori == "ssatuan"){
            $caridata = Barang::where('satuan_barang', 'like', "%".$cari."%")->get();
            return view('fitur_pegawai.listbarangpegawai',['result' => $caridata]);
        }

        // jika dicari berdasarkan harga
        if($request->kategori == "sharga"){
            $caridata = Barang::where('harga_barang', 'like', "%".$cari."%")->get();
            return view('fitur_pegawai.listbarangpegawai',['result' => $caridata]);
        }

        // jika tidak sedang mencari
        else{
            $barang = Barang::all();
            $data = [];
            $data['result'] = $barang;
            return view('fitur_pegawai.listbarangpegawai', $data);
        }
    }


    // CARI BARANG
    public function cariBarang(Request $request)
    {
        // menangkap data pencarian
		$cari = $request->cari;

        // jika dicari berdasarkan nama barang
        if($request->kategori == "snama"){
            $caridata = Barang::where('nama_barang', 'like', "%".$cari."%")->get();
            return view('fitur_admin.list_admin.list_barang',['result' => $caridata]);
        }

        // jika dicari berdasarkan kategori
        if($request->kategori == "ssatuan"){
            $caridata = Barang::where('satuan_barang', 'like', "%".$cari."%")->get();
            return view('fitur_admin.list_admin.list_barang',['result' => $caridata]);
        }

        // jika dicari berdasarkan harga
        if($request->kategori == "sharga"){
            $caridata = Barang::where('harga_barang', 'like', "%".$cari."%")->get();
            return view('fitur_admin.list_admin.list_barang',['result' => $caridata]);
        }

        // jika tidak sedang mencari
        else{
            $barang = Barang::all();
            $data = [];
            $data['result'] = $barang;
            return view('fitur_admin.list_admin.list_barang', $data);
        }
    }
}
