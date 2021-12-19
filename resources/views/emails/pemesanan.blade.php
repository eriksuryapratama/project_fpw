@extends('template_email')

@section('judul')
<div class="container" style="border: 3px solid white;padding:20px;background-color:#2b4251">
    <h1 style="text-align: center;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:white;">Data Pemesanan</h1>
</div>
@endsection

@section('konten')
<h1>Daftar Pesanan</h1>
<p>Ini adalah list barang-barang yang ingin dipesan oleh minimarket kami</p>
    <table border="3" id="table" class="table table-striped table-bordered" style="width:100%">
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
                @foreach ($pemesanan as $item)
                <tr>
                    <td style="text-align:center">{{ $item->kode_pemesanan }}</td>
                    <td style="text-align:center">{{ $item->nama_barang }}</td>
                    <td style="text-align:center">{{ $item->satuan_barang }}</td>
                    <td style="text-align:center">{{ $item->jumlah }}</td>
                    <td style="text-align:center">{{ $item->daftarSupplier->nama_supplier }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

@endsection


