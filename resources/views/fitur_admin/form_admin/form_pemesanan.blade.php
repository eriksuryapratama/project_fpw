@extends('template_admin')

{{-- Form Halaman --}}
@section('konten')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5" style="background-color:white">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5" style="font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:black;">Pemesanan Barang</h5>

                    <form action="/admin/tambahpemesanan" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id ?? "" }}">

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Kode Barang</label>
                            <input type="text" name="kode_barang" class="form-control" id="" value="{{ $data->kode_barang ?? "" }}" readonly>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="" value="{{ $data->nama_barang ?? "" }}" readonly>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Satuan Barang</label>
                            <input type="text" name="satuan_barang" class="form-control" id="" value="{{ $data->satuan_barang ?? "" }}" readonly>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Jumlah Barang</label>
                            <input type="number" name="jumlah" class="form-control" id="" value="">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" class="form-label">Supplier</label>
                            <select class="form-control" name= "kode_supplier" id="" aria-label="Default select example">
                                @foreach ($supplier as $item)
                                    <option value="{{ $item->kode_supplier }}">{{ $item->nama_supplier }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-floating mb-3">
                            <input type="submit" name="btn_regis" style="width: 350px;" class="btn btn-primary btn-login text-uppercase fw-bold" value="Konfirmasi Pemesanan">
                        </div>

                        <div class="form-floating mb-3">
                            <a href="/admin/pemesanan">
                                <button type="button" style="width: 350px;" class="btn btn-primary">LIST BARANG</button>
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
