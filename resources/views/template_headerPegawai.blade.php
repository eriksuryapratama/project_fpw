{{-- Ini adalah template header pada saat login pegawai --}}
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
                    <a class="nav-link" href="#">{{ Auth::guard('pegawai_guard')->user()->nama_pegawai }}</a>

                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/pegawai/">Pengecekan Barang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/pegawai/listbarang">Data Barang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/pegawai/listretur">Data Retur</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Penjualan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/logout">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
