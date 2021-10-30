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
                        <a href="#"><button type="button" class="btn btn-success">Tambah Pegawai</button></a>
                    </div>
                </div>
            </div>

            <br>

            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th style="">Nama</th>
                        <th style="">Alamat</th>
                        <th style="">Kota</th>
                        <th style="">Status</th>
                        <th style="">Username</th>
                        <th style="text-align:center" colspan="2">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        {{-- @foreach ($data as $item) --}}
                        <td>P0001</td>
                        <td>Alex</td>
                        <td>Jl. Mawar Merah No. 10</td>
                        <td>Surabaya</td>
                        <td>Kasir</td>
                        <td>alexiusarton</td>
                        <td style="text-align:center"><a href="#"><button type="button" class="btn btn-warning">Edit</button></a></td>
                        <td style="text-align:center"><a href="#"><button type="button" class="btn btn-danger">Hapus</button></a></td>
                        {{-- @endforeach --}}
                    </tr>
                </tbody>
            </table>
    </div>
@endsection
