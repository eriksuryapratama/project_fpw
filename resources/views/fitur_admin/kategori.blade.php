@extends('template_admin')

{{-- Judul Halaman --}}
@section('judul')
<div class="container" style="border: 3px solid white;padding:20px;background-color:#2b4251">
    <h1 style="text-align: center;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:white;">Kategori Barang</h1>
</div>
@endsection

{{-- Isi Halaman --}}
@section('konten')
    <div class="container" style="background-color: white; padding:20px;">
            @if (Session::has('message'))
                {{ Session::get('message') }}
            @endif

            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <h4 style="text-align: left;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;">List Kategori</h4>
                    </div>
                    <div class="col-2">
                        <a href="#"><button type="button" class="btn btn-success">Tambah Kategori</button></a>
                    </div>
                </div>
            </div>

            <br>

            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th style="width: 700px;">Nama Kategori</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        {{-- @foreach ($data as $item) --}}
                        <td>1</td>
                        <td>Produk Makanan</td>
                        <td><a href="#"><button type="button" class="btn btn-warning">Edit</button></a></td>
                        <td><a href="#"><button type="button" class="btn btn-danger">Hapus</button></a></td>
                        {{-- @endforeach --}}
                    </tr>
                            {{-- <tr style="border: 1 px solid black;">
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;">1</td>
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;">Produk Makanan</td>
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;"><a href="#"><button type="button" class="btn btn-warning">Edit</button></a></td>
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;"><a href="#"><button type="button" class="btn btn-danger">Hapus</button></a></td> --}}


                                {{-- <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;">{{$loop ->index + 1}}</td>
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;">{{ $item->nama_karyawan }}</td>
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;">{{ $item->alamat_karyawan }}</td>
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;">{{ $item->telepon_karyawan }}</td>
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;">{{ $item->jabatan_karyawan }}</td>
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;">{{ $item->username_karyawan }}</td>
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;">{{ $item->password_karyawan }}</td>
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;"><a href="/admin/karyawan/{{$item->id_karyawan}}"><button>Edit</button></a></td>
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;"><a href="/admin/karyawan/delete/{{$item->id_karyawan}}"><button>Delete</button></a></td> --}}
                            {{-- </tr>
                            <tr>
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;">1</td>
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;">Produk Makanan</td>
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;"><a href="#"><button type="button" class="btn btn-warning">Edit</button></a></td>
                                <td style="border:1px solid black; text-align:center; padding:10px; background-color:white;"><a href="#"><button type="button" class="btn btn-danger">Hapus</button></a></td>

                            </tr> --}}
                        {{-- @endforeach --}}
                </tbody>
            </table>
    </div>
@endsection
