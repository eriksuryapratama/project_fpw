@extends('template_pegawai')


@section('judul')
<div class="container" style="border: 3px solid white;padding:20px;background-color:#2b4251">
    <h1 style="text-align: center;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:white;">Data Penjualan</h1>
</div>
@endsection

@section('konten')
    <div class="container" style="background-color: white; padding:20px;">
            @if (Session::has('message'))
                {{ Session::get('message') }}
            @endif

            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <h4 style="text-align: left;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;">Tambah Penjualan</h4>
                    </div>
                    {{-- <div class="col-2">
                        <a href="/pegawai/penjualan"><button type="button" class="btn btn-success">Tambah Data</button></a>
                    </div> --}}
                </div>
            </div>

            <br>

            {{-- FORM SEARCH --}}
            <form action="/pegawai/caribarangpenjualan" method="GET">
                <select name="kategori">
                    <option value="" disabled selected>-- Cari menurut --</option>
                    <option value="snama">Nama Barang</option>
                    <option value="sharga">Harga Barang</option>
                    <option value="ssatuan">Satuan Barang</option>
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
                        <th style="">Gambar</th>
                        <th style="text-align:center" colspan="2">Aksi</th>
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
                                <td style=" text-align:center">
                                    <img class="img-fluid" style="width:100px; height:100px;" src="{{ asset('/img_barang/'.$item->gambar) }}" alt="">
                                </td>
                                <form action="" method="post">
                                    @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <td style="text-align:center"><input type="number" name="jumlah_beli" style="width: 50px"></td>
                                <td style="text-align:center"><input type="submit" name="btn_beli" class="btn btn-success" value="BELI"></td>
                                </form>
                            </tr>
                        @endforeach

                    @else
                            <tr>
                                <td colspan="6">Tidak ada daftar Penjualan Barang</td>
                            </tr>
                    @endif
                </tbody>
            </table>

    </div>
@endsection

