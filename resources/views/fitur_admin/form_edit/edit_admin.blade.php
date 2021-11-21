@extends('template_admin')

{{-- Form Halaman --}}
@section('konten')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5" style="background-color:white">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5" style="font-family: 'Langar', cursive;font-family: 'Russo One', sans-serif;color:black;">Edit Kategori</h5>

                    <form action="/admin/admin/update" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$result->id}}">

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Nama Admin</label>
                            <input type="text" name="nama_admin" class="form-control" id="" value="{{$result->nama_admin}}" placeholder="Masukkan nama admin...">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="" style="color: black">Telepon admin</label>
                            <input type="text" name="telepon" class="form-control" id="" value="{{$result->telepon}}" placeholder="Masukkan telepon admin...">
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
