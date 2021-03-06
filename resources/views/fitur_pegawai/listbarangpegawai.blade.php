@extends('template_pegawai')

{{-- Judul Halaman --}}
@section('judul')
<div class="container" style="border: 3px solid white;padding:20px;background-color:#2b4251">
    <h1 style="text-align: center;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:white;">Data Barang</h1>
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
                        <h4 style="text-align: left;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;">List Barang</h4>
                    </div>
                </div>
            </div>

            <form action="/pegawai/caribarangpegawai" method="GET">
                <select name="kategori">
                    <option value="" disabled selected>-- Cari menurut --</option>
                    <option value="snama">Nama Barang</option>
                    <option value="ssatuan">Satuan Barang</option>
                    <option value="sharga">Harga Barang</option>
                </select>

                <br><br>

                <input type="text" name="cari" placeholder="Search.." value="{{ old('cari') }}">
                <input type="submit" class="btn btn-info" value="Cari">
            </form>

            <br>

            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align:center">No.</th>
                        <th>Kode</th>
                        <th style="">Nama</th>
                        <th style="">Kategori</th>
                        <th style="">Satuan</th>
                        <th style="">Stok</th>
                        <th style="">Harga</th>
                    </tr>
                </thead>

                <tbody>
                    @if (null != $result)
                        @foreach ($result as $item)
                            <tr>
                                <td style="text-align:center">{{$loop ->index + 1}}</td>
                                <td>{{ $item->kode_barang }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{$item->daftarkategori->nama_kategori}}</td>
                                <td>{{ $item->satuan_barang }}</td>
                                <td>{{ $item->stok_barang }}</td>
                                <td>Rp. {{ $item->harga_barang }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">Tidak ada daftar Barang</td>
                        </tr>
                    @endif
                </tbody>
            </table>
    </div>
@endsection
