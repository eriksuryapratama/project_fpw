@extends('template_admin')

{{-- Judul Halaman --}}
@section('judul')
<div class="container" style="border: 3px solid white;padding:20px;background-color:#2b4251">
    <h1 style="text-align: center;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:white;">Data Supplier</h1>
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
                        <h4 style="text-align: left;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;">List Supplier</h4>
                    </div>
                    <div class="col-2">
                        <a href="/admin/supplier"><button type="button" class="btn btn-success">Tambah Supplier</button></a>
                    </div>
                </div>
            </div>

            <br>

            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="">Kode</th>
                        <th style="">Nama</th>
                        <th style="">Alamat</th>
                        <th style="">Telepon</th>
                        <th style="">Email</th>
                        <th style="">Username</th>
                        <th style="text-align:center" colspan="2">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @if (null != $result)
                        @foreach ($result as $item)
                            <tr>
                                <td>{{ $item->kode_supplier }}</td>
                                <td>{{ $item->nama_supplier }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->telepon }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->username }}</td>
                                <td style="text-align:center"><a href="{{ url("/admin/supplier/update/$item->id") }}"><button type="button" class="btn btn-warning">Edit</button></a></td>
                                <td style="text-align:center"><a href="{{ url("/admin/supplier/delete/$item->id") }}"><button type="button" class="btn btn-danger">Hapus</button></a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">Tidak ada daftar Supplier</td>
                        </tr>
                    @endif
                </tbody>
            </table>
    </div>
@endsection