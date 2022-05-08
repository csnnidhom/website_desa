@extends('user.layout.master')

@section('content')
<!-- Header -->
<div class="container-fluid position-relative p-0">
    <div class="container-fluid bg-primary py-5 bg-header">
    </div>
</div>

<!-- Struktur Organisasi Start -->
<div class="container-fluid py-3">
    <div class="container py-3">
        <nav class="breadcrumbs mb-5 wow zoomIn" data-wow-delay="2s">
            <small class="trail-begin"><a href="/organisasi" rel="home" class="trail-begin">Organisasi</a></small>
            <small class="sep">»</small>
            <small class="trail-end"><a href="{{route('kartar')}}" class="trail-begin">Karang Taruna</a></small>
            <small class="sep">»</small>
            <small class="trail-end">{{$title}}</small>
        </nav>
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto wow zoomIn" data-wow-delay="0.5s" style="max-width: 600px;">
            <h1 class="mb-0">Struktur Organisasi</h1>
            <h1 class="mb-0">"Karang Taruna"</h1>
        </div>
        <div class="wow zoomIn" data-wow-delay="0.9s">
            <div class="position-relative">
                <img class="rounded wow zoomIn w-100 h-100 team-item" data-wow-delay="0.1s" src="{{asset('user/img/struktur-organisasi-kartar.jpg')}}" style="object-fit: cover;">
            </div>
        </div>
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                @foreach($data as $item)
                <div class="testimonial-item bg-light my-4 " style="height: 20em;">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{ Storage::url($item->image) }}" style="width: 60px; height: 60px;">
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">{{$item->name}}</h4>
                            <small class="text-uppercase">{{$item->jabatan}}</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">{{$item->bio}}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection