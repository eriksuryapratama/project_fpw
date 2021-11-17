@extends('template_admin')

{{-- Form Halaman --}}
@section('konten')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5" style="background-color:white">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5" style="font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:black;">Edit Kategori</h5>

                    <form action="/admin/barang/update" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$result->id}}">

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="" value="" placeholder="Masukkan nama barang...">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Satuan Barang</label>
                            <input type="text" name="satuan_barang" class="form-control" id="" value="" placeholder="Masukkan satuan barang...">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Stok Barang</label>
                            <input type="number" name="stok_barang" class="form-control" id="" value="" placeholder="Masukkan stok barang...">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Harga Barang</label>
                            <input type="number" name="harga_barang" class="form-control" id="" value="" placeholder="Masukkan harga barang...">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="submit" name="btn_regis" style="width: 350px;" class="btn btn-primary btn-login text-uppercase fw-bold" value="Edit Kategori">
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
