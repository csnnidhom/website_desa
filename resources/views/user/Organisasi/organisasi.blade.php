@extends('user/layout/master')

@section('content')
<!-- Header -->
<div class="container-fluid position-relative p-0">
    <div class="container-fluid bg-primary py-5 bg-header">
    </div>
</div>

<!-- Organisasi Start -->
<div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-3">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h1 class="mb-0">Organisasi</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <a href="{{route('kartar')}}">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('user/img/kartar.png')}}" style="height: 300px;" alt="">
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Karang Taruna</h4>
                        </div>
                    </a>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a class="btn btn-lg btn-primary btn-lg-square rounded mx-2  wow zoomIn" data-wow-delay="1s" href="https://twitter.com/ChusnunNidhom" target="_blank">
                        <i class="fab fa-twitter fw-normal"></i>
                    </a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded mx-2  wow zoomIn" data-wow-delay="2s" href="https://www.facebook.com/csn.nidhom" target="_blank"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded mx-2  wow zoomIn" data-wow-delay="1.5s" href="https://www.instagram.com/dhom_aja/" target="_blank"><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded mx-2  wow zoomIn" data-wow-delay="2.5s" href="https://www.youtube.com/channel/UCzqGFfW-Th2KGkQurdcme6A" target="_blank"><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <a href="{{route('remas')}}">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('user/img/remas.jpg')}}" style="height: 300px;" alt="">
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Remaja Masjid</h4>
                        </div>
                    </a>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a class="btn btn-lg btn-primary btn-lg-square rounded mx-2  wow zoomIn" data-wow-delay="2.5s" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded mx-2  wow zoomIn" data-wow-delay="1.5s" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded mx-2  wow zoomIn" data-wow-delay="2s" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded mx-2  wow zoomIn" data-wow-delay="1s" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                </div>
            </div>
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <a href="/organisasi/asm_putra">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('user/img/asm.jpg')}}" style="height: 300px;" alt="">
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">ASM Putra</h4>
                        </div>
                    </a>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a class="btn btn-lg btn-primary btn-lg-square rounded mx-2  wow zoomIn" data-wow-delay="1s" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded mx-2  wow zoomIn" data-wow-delay="1.5s" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded mx-2  wow zoomIn" data-wow-delay="2.5s" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded mx-2  wow zoomIn" data-wow-delay="2s" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection