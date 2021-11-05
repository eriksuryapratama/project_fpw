@extends('template_admin')

{{-- Judul Halaman --}}
@section('judul')
<div class="container" style="border: 3px solid white;padding:20px;background-color:#2b4251">
    <h1 style="text-align: center;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:white;">Data Pegawai</h1>
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
                        <h4 style="text-align: left;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;">List Pegawai</h4>
                    </div>
                    <div class="col-2">
                        <a href="/admin/user"><button type="button" class="btn btn-success">Tambah Pegawai</button></a>
                    </div>
                </div>
            </div>

            <br>

            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align:center;">Kode</th>
                        <th style="text-align:center;">Nama</th>
                        <th style="text-align:center;">Alamat</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">Username</th>
                        <th style="text-align:center;" colspan="2">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @if (null != $result)
                        @foreach ($result as $item)
                            <tr>
                                <td>{{ $item->kode_user }}</td>
                                <td>{{ $item->nama_user }}</td>
                                <td>{{ $item->alamat_user }}</td>
                                <td>{{ $item->status_user }}</td>
                                <td>{{ $item->username }}</td>
                                <td style="text-align:center"><a href="#"><button type="button" class="btn btn-warning">Edit</button></a></td>
                                <td style="text-align:center"><a href="#"><button type="button" class="btn btn-danger">Hapus</button></a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">Tidak ada daftar User</td>
                        </tr>
                    @endif
                </tbody>
            </table>
    </div>
@endsection
