@extends('template_admin')

{{-- Judul Halaman --}}
@section('judul')
<div class="container" style="border: 3px solid white;padding:20px;background-color:#2b4251">
    <h1 style="text-align: center;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:white;">Data Pesanan Barang</h1>
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
                        <h4 style="text-align: left;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;">List Pesanan</h4>
                    </div>
                    <div class="col-2">
                        <a href="/admin/pemesanan"><button type="button" class="btn btn-success">Tambah Pesanan</button></a>
                    </div>
                </div>
            </div>

            <br>

            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align:center;">Kode Pesanan</th>
                        <th style="text-align:center;">Nama Barang</th>
                        <th style="text-align:center;">Satuan Barang</th>
                        <th style="text-align:center;">Jumlah Barang</th>
                        <th style="text-align:center;">Supplier</th>
                    </tr>
                </thead>

                <tbody>
                    @if (null != $result)
                        @foreach ($result as $item)
                            <tr>
                                <td>{{ $item->kode_pemesanan }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td style="text-align: center">{{ $item->satuan_barang }}</td>
                                <td style="text-align: center">{{ $item->jumlah }}</td>
                                <td>{{ $item->daftarsupplier->nama_supplier }}</td>
                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <td colspan="6">Tidak ada daftar Pesanan Barang</td>
                            </tr>
                    @endif
                </tbody>
            </table>
    </div>
@endsection
