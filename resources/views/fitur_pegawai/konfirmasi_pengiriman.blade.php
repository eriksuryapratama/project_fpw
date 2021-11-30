@extends('template_pegawai')

{{-- Form Halaman --}}
@section('konten')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5" style="background-color:white">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5" style="font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:black;">Konfirmasi Pengiriman</h5>

                    <form action="/pegawai/send" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$result->id}}">

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Kode Pesanan</label>
                            <input type="text" name="kode_pesanan" class="form-control" id="" value="{{$result->kode_pemesanan}}" readonly>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="" value="{{$result->nama_barang}}" readonly>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Satuan Barang</label>
                            <input type="text" name="satuan_barang" class="form-control" id="" value="{{$result->satuan_barang}}" readonly>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Jumlah Barang</label>
                            <input type="text" name="jumlah_barang" class="form-control" id="" value="{{$result->jumlah}}" readonly>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="submit" name="btn_konfirmasi" style="width: 350px;" class="btn btn-success btn-login text-uppercase fw-bold" value="Konfirmasi">
                        </div>
                        <div class="form-floating mb-3">
                            <a href="/pegawai/">
                                <button type="button" name="btn_cancel" style="width: 350px;" class="btn btn-danger btn-login text-uppercase fw-bold">Cancel</button>
                            </a>
                        </div>

                    </form>

                    <br>
                    {{-- Pesan eror --}}
                    @if ($errors->any())
                    <ul style="color:red;">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
