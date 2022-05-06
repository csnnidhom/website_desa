@extends('user/layout/master')

@section('content')
<!-- Header -->
<div class="container-fluid position-relative p-0">
    <div class="container-fluid bg-primary py-5 bg-header">
    </div>
</div>

<!-- Menu Start -->
<div class="container-fluid py-3">
    <div class="container py-3">
        <nav class="breadcrumbs mb-5 wow zoomIn" data-wow-delay="2s">
            <small class="trail-begin"><a href="/organisasi" rel="home" class="trail-begin">Organisasi</a></small>
            <small class="sep">»</small>
            <small class="trail-end">{{$title}}</small>
        </nav>
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-0">{{$title}}</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.5s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <a href="{{route('struktur_organisasi_kartar')}}">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('user/img/logo-struktur-organisasi.jpg')}}" style="height: 300px;" alt="">
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Struktur Organisasi</h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 wow zoomIn" data-wow-delay="1s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <a href="{{route('berita_kartar')}}">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('user/img/logo-berita.jpg')}}" style="height: 300px;" alt="">
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Berita</h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 wow zoomIn" data-wow-delay="1.5s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <a href="{{route('galeri_kartar')}}">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('user/img/logo-galeri.jpg')}}" style="height: 300px;" alt="">
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Galeri</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection