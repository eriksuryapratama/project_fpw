{{-- Ini adalah template header pada saat login admin --}}
<header>
    <nav class="navbar navbar fixed-top navbar-expand-lg navbar-light bg-light">
        {{-- Navbar --}}


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="{{ asset('images/undraw_profile.svg') }}" width="30" height="30" alt="">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ Auth::guard('admin_guard')->user()->nama_admin }}</a>

                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/listadmin">Admin</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/listpegawai">Pegawai</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/listsupplier">Supplier</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/listkategori">Kategori</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/listbarang">Barang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/listpemesanan">Pemesanan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/logout">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
