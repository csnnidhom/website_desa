@extends('user/layout/master')

@section('content')
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h1 class="mb-0">Organisasi</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <a href="/organisasi/kartar">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('user/img/kartar.png')}}" style="height: 300px;" alt="">
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Karang Taruna</h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <a href="/organisasi/remas">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('user/img/remas.jpg')}}" style="height: 300px;" alt="">
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Remaja Masjid</h4>
                        </div>
                    </a>
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
            </div>
        </div>
    </div>
</div>

@endsection