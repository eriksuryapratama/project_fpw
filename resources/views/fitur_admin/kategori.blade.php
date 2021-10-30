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
                        <a href="/admin/kategori"><button type="button" class="btn btn-success">Tambah Kategori</button></a>
                    </div>
                </div>
            </div>

            <br>

            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Kode Kategori</th>
                        <th style="width: 700px;">Nama Kategori</th>
                        <th style="text-align:center" colspan="2">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        {{-- @foreach ($data as $item) --}}
                        <td>K0001</td>
                        <td>Produk Makanan</td>
                        <td style="text-align:center"><a href="/admin/kategori"><button type="button" class="btn btn-warning">Edit</button></a></td>
                        <td style="text-align:center"><a href="/admin/listkategori"><button type="button" class="btn btn-danger">Hapus</button></a></td>
                        {{-- @endforeach --}}
                    </tr>
                </tbody>
            </table>
    </div>
@endsection
