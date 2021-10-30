{{-- Ini adalah template header pada saat login admin --}}
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        {{-- Navbar --}}


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="{{ asset('images/undraw_profile.svg') }}" width="30" height="30" alt="">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Admin</a>

                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/kategori">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/barang">Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/supplier">Supplier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pegawai">Pegawai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pembelian">Pembelian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/laporan">Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
