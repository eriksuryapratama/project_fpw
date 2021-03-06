@extends('template_login')


{{-- Isi Halaman --}}
@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5" style="background-color:#2b4251">
                    <div class="card-body p-4 p-sm-5">

                        {{-- PESAN ERROR --}}
                        <div style="background-color: red; color:black; text-align:center;">
                            @if (Session::has('message'))
                                {{ Session::get('message') }}
                            @endif
                        </div>

                        <br>

                        <h5 class="card-title text-center mb-5 fw-light fs-5" style="font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:white;">Log In</h5>
                        <form action="/login" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <label for="" style="color: white">Username</label>
                                <input type="text" name="username" class="form-control" id="" placeholder="Enter your username...">
                            </div>

                            <div class="form-floating mb-3">
                                <label for="" style="color: white">Password</label>
                                <input type="password" name="password" class="form-control" id="" placeholder="Enter your password...">
                            </div>

                            <div class="form-floating mb-3">
                                <label for="" style="color: white">Role</label>
                                <select name="role" class="form-control">
                                    <option value="" disabled selected>-- Pilih Role --</option>
                                    <option value="admin">Admin</option>
                                    <option value="pegawai">Pegawai</option>
                                    <option value="supplier">Supplier</option>
                                </select>
                            </div>

                            <div class="d-grid">
                                <input type="submit" name="btn_login" class="btn btn-primary btn-login text-uppercase fw-bold" value="Login">
                            </div>
                        </form>
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
