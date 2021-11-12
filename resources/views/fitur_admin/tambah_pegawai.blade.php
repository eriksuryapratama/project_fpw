@extends('template_admin')

{{-- Form Halaman --}}
@section('konten')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5" style="background-color:white">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5" style="font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:black;">Tambah Pegawai</h5>

                    <form action="/admin/pegawai" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="">

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Nama Pegawai</label>
                            <input type="text" name="nama_pegawai" class="form-control" value="" placeholder="Masukkan nama pegawai...">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Telepon pegawai</label>
                            <input type="text" name="telepon" class="form-control" value="" placeholder="Masukkan telepon pegawai...">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Username</label>
                            <input type="text" name="username" class="form-control" value="" placeholder="Masukkan username...">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Password</label>
                            <input type="password" name="password" class="form-control" value="" placeholder="Masukkan password...">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" value="" placeholder="Konfirmasi Password...">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="submit" name="btn_regis" style="width: 350px;" class="btn btn-primary btn-login text-uppercase fw-bold" value="Tambah pegawai">
                        </div>

                        <div class="form-floating mb-3">
                            <a href="/admin/listpegawai">
                                <button type="button" style="width: 350px;" class="btn btn-primary">LIST PEGAWAI</button>
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
