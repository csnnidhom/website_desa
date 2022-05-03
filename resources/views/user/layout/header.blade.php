    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="/" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>Sememi Kidul</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
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

                    <a href="/organisasi" class="nav-item nav-link {{ (request()->is('organisasi')) ? 'active' : '' }}">Organisasi</a>

                    <a href="/kontak" class="nav-item nav-link {{ (request()->is('kontak')) ? 'active' : '' }}">Kontak</a>
                </div>
            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('user/img/sememi-kidul.jpg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Sememi Kidul</h1>
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Surabaya</h5>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('user/img/masjid-babul-jannah.jpg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Creative & Innovative Digital Solution</h1>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->