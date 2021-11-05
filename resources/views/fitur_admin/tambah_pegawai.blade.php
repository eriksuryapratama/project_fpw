@extends('template_admin')

{{-- Form Halaman --}}
@section('konten')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5" style="background-color:white">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5" style="font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:black;">Tambah User</h5>

                    <form action="/admin/user" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="">

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Nama User</label>
                            <input type="text" name="nama_user" class="form-control" id="" value="" placeholder="Masukkan nama user...">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Alamat User</label>
                            <input type="text" name="alamat_user" class="form-control" id="" value="" placeholder="Masukkan alamat user...">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Status User </label>
                            <select name="status_user" class="form-control" id="">
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                            </select>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Username</label>
                            <input type="text" name="username" class="form-control" id="" value="" placeholder="Masukkan username...">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Password</label>
                            <input type="text" name="password" class="form-control" id="" value="" placeholder="Masukkan password...">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="submit" name="btn_regis" style="width: 350px;" class="btn btn-primary btn-login text-uppercase fw-bold" value="Tambah User">
                        </div>

                        <div class="form-floating mb-3">
                            <a href="/admin/listuser">
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
