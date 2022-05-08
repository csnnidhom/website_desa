    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <div class="col ">
                <a href="/" class="navbar-brand ">
                    <img src="{{asset('user/img/nu.png')}}" style=" width: 50%;" alt="Image">
                </a>
            </div>

            <div class="col d-flex justify-content-end">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="/" class="nav-item nav-link {{ (request()->is('/')) ? 'active' : '' }}">Beranda</a>

                    <div class="nav-item dropdown ">
                        <a href="#" class="nav-link dropdown-toggle {{ (request()->is('visi_misi')) || (request()->is('struktur_organisasi')) ? 'active' : ' ' }}" data-bs-toggle="dropdown">Profil Desa</a>
                        <div class="dropdown-menu m-0">
                            <a href="/visi_misi" class="dropdown-item {{ (request()->is('visi_misi')) ? 'active' : ' ' }}">Visi Misi</a>
                            <a href="/struktur_organisasi" class="dropdown-item {{ (request()->is('struktur_organisasi')) ? 'active' : ' ' }}">Struktur Organisasi</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown ">
                        <a href="#" class="nav-link dropdown-toggle {{ (request()->is('organisasi/kartar')) || (request()->is('organisasi/remas')) || (request()->is('organisasi/asm_putra')) ? 'active' : ' ' }}" data-bs-toggle="dropdown">Organisasi</a>
                        <div class="dropdown-menu m-0">
                            <a href="/organisasi/kartar" class="dropdown-item {{ (request()->is('organisasi/kartar')) ? 'active' : ' ' }}">Karang Taruna</a>
                            <a href="/organisasi/remas" class="dropdown-item {{ (request()->is('organisasi/remas')) ? 'active' : ' ' }}">Remaja Masjid</a>
                            <a href="/organisasi/asm_putra" class="dropdown-item {{ (request()->is('organisasi/asm_putra')) ? 'active' : ' ' }}">ASM Putra</a>
                        </div>
                    </div>

                    <a href="/kontak" class="nav-item nav-link {{ (request()->is('kontak')) ? 'active' : '' }}">Kontak</a>
                </div>
            </div>
        </nav>
    </div>

    <!-- Navbar & Carousel End -->