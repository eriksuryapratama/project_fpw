@extends('template_admin')

{{-- Judul Halaman --}}
@section('judul')
<div class="container" style="border: 3px solid white;padding:20px;background-color:#2b4251">
    <h1 style="text-align: center;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:white;">Data Barang</h1>
</div>
@endsection

{{-- Isi Halaman --}}
@section('konten')
    <div class="container" style="background-color: white; padding:20px;">

            {{-- PESAN ERROR --}}
            @if (Session::has('message'))
                {{ Session::get('message') }}
            @endif

            {{-- JUDUL --}}
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <h4 style="text-align: left;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;">List Barang</h4>
                    </div>
                </div>
            </div>

            <br>

            {{-- FORM SEARCH --}}
            <form action="/admin/caribarangpemesanan" method="GET">
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

            {{-- TABEL BARANG DIPESAN --}}
            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align:center">No.</th>
                        <th style="text-align:center">Kode</th>
                        <th style="text-align:center">Nama</th>
                        <th style="text-align:center">Kategori</th>
                        <th style="text-align:center">Satuan</th>
                        <th style="text-align:center">Stok</th>
                        <th style="text-align:center">Harga</th>
                        <th style="text-align:center">Gambar</th>
                        <th style="text-align:center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @if (null != $result)
                        @foreach ($result as $item)
                            <tr>
                                <td style="text-align:center">{{$loop ->index + 1}}</td>
                                <td style="text-align:center">{{ $item->kode_barang }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{$item->daftarkategori->nama_kategori}}</td>
                                <td>{{ $item->satuan_barang }}</td>
                                <td style="text-align:center">{{ $item->stok_barang }}</td>
                                <td style="text-align:right">Rp. {{ $item->harga_barang }}, -</td>
                                <td style=" text-align:center">
                                    <img class="img-fluid" style="width:100px; height:100px;" src="{{ asset('/img_barang/'.$item->gambar) }}" alt="">
                                </td>
                                <td style="text-align:center"><a href="{{ url("/admin/pemesanan/tambah/$item->id") }}"><button type="button" class="btn btn-success">Pesan</button></a></td>
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
