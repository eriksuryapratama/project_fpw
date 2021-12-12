@extends('template_pegawai')


@section('judul')
<div class="container" style="border: 3px solid white;padding:20px;background-color:#2b4251">
    <h1 style="text-align: center;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:white;">Report Penjualan</h1>
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
                        <h4 style="text-align: left;font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;">Report Penjualan</h4>
                    </div>

                </div>
            </div>

            <br>

            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align:center;">No.</th>

                        <th style="text-align:center;">Nama Barang</th>


                        <th style="text-align:center;">Jumlah</th>
                        <th style="text-align:center;">Sub Total</th>

                    </tr>
                </thead>

                <tbody>
                    <form action="" method="POST">
                     @csrf
                    @if (null != $result)
                        @foreach ($result as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>

                                <td>{{ $item->nama_barang }}</td>


                                <td>{{ $item->jumlah }}</td>
                                <td>Rp. {{ $item->total }}</td>

                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <td colspan="6">Tidak ada daftar Penjualan Barang</td>
                            </tr>
                    @endif
                </tbody>
            </table>
            <h2>Subtotal : Rp. {{ $subtotal }},.</h3>
                <input type="hidden" name="subtotal" value="{{ $subtotal }}">
            <input type="submit" class="btn btn-success" value="Pay now">
        </form>
    </div>

@endsection

