@extends('template_pegawai')


@section('judul')
<div class="container" style="border: 3px solid white;padding:20px;background-color:#2b4251">
    <h1 style="text-align: center;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:white;">Data Retur</h1>
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
                        <h4 style="text-align: left;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;">List Retur</h4>
                    </div>

                </div>
            </div>

            <br>

            {{-- FORM SEARCH --}}
            <form action="/pegawai/cariretur" method="GET">
                <select name="kategori">
                    <option value="" disabled selected>-- Cari menurut --</option>
                    <option value="snama">Nama Barang</option>
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
                        <th style="text-align:center;">Kode Retur</th>
                        <th style="text-align:center;">Nama Barang</th>
                        <th style="text-align:center;">Satuan</th>
                        <th style="text-align:center;">Jumlah</th>
                        <th style="text-align:center;">Supplier</th>
                        <th style="text-align:center;">Pegawai</th>
                        <th style="text-align:center;">Alasan</th>
                    </tr>
                </thead>

                <tbody>
                    @if (null != $result)
                        @foreach ($result as $item)
                            <tr>
                                <td>{{ $item->kode_retur }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td style="text-align: center">{{ $item->satuan_barang }}</td>
                                <td style="text-align: center">{{ $item->jumlah }}</td>
                                <td>{{ $item->daftarSupplier->nama_supplier }}</td>
                                <td>{{ $item->daftarPegawai->nama_pegawai }}</td>
                                <td>{{ $item->alasan }}</td>
                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <td colspan="6">Tidak ada daftar Retur Barang</td>
                            </tr>
                    @endif
                </tbody>
            </table>
    </div>
@endsection

