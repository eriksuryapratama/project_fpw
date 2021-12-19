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
        <div style="background-color: red; color:white; text-align:center">
        {{-- PESAN ERROR     --}}
        @if (Session::has('message'))
            {{ Session::get('message') }}
        @endif
    </div>
    <br>
        {{-- BUTTON TAMBAH --}}
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-4">
                    <h4 style="text-align: left;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;">List Pegawai</h4>
                </div>
                <div class="col-2">
                    <a href="/admin/pegawai"><button type="button" class="btn btn-success">Tambah Pegawai</button></a>
                </div>
            </div>
        </div>

        <br>

        {{-- FORM SEARCH --}}
        <form action="/admin/caripegawai" method="GET">
            <select name="kategori">
                <option value="" disabled selected>-- Cari menurut --</option>
                <option value="snama">Nama Pegawai</option>
                <option value="stelepon">Nomor Telepon</option>
            </select>

            <br><br>

            <input type="text" name="cari" placeholder="Search.." value="{{ old('cari') }}">
            <input type="submit" class="btn btn-info" value="Cari">
        </form>

        <br>

        {{-- TABEL PEGAWAI --}}
        <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th style="text-align:center">No.</th>
                    <th style="text-align:center;">Kode</th>
                    <th style="text-align:center;">Nama</th>
                    <th style="text-align:center;">Telepon</th>
                    <th style="text-align:center;">Username</th>
                    <th style="text-align:center;" colspan="2">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @if (null != $result)
                    @foreach ($result as $item)
                        <tr>
                            <td style="text-align:center">{{$loop ->index + 1}}</td>
                            <td style="text-align:center">{{ $item->kode_pegawai }}</td>
                            <td>{{ $item->nama_pegawai }}</td>
                            <td style="text-align:center">{{ $item->telepon }}</td>
                            <td>{{ $item->username }}</td>
                            <td style="text-align:center"><a href="{{ url("/admin/pegawai/update/$item->id") }}"><button type="button" class="btn btn-warning">Edit</button></a></td>
                            <td style="text-align:center"><a href="{{ url("/admin/pegawai/delete/$item->id") }}"><button type="button" class="btn btn-danger">Hapus</button></a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">Tidak ada daftar Pegawai</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
