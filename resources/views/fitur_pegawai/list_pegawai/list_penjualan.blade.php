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
                        <h4 style="text-align: left;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;">List Penjualan</h4>
                    </div>
                    <div class="col-2">
                        <a href="/pegawai/penjualan"><button type="button" class="btn btn-success">Tambah Data</button></a>
                    </div>
                </div>
            </div>

            <br>

            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align:center;">No.</th>
                        <th style="text-align:center;">Nomor Nota</th>
                        <th style="text-align:center;">Pegawai</th>
                        <th style="text-align:center;">Subtotal</th>
                        <th style="text-align:center;">Tanggal</th>
                        <th style="text-align:center;">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if (null != $result)
                        @foreach ($result as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->no_nota }}</td>
                                <td>{{ $item->daftarPegawai2->kode_pegawai }}</td>
                                <td>{{ $item->subtotal }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td style="text-align:center"><a href="{{ url("/pegawai/detail/$item->no_nota") }}"><button type="button" class="btn btn-primary">Detail</button></a></td>
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

