@extends('user/layout/master')

@section('content')
<!-- Header -->
<div class="container-fluid position-relative p-0">
    <div class="container-fluid bg-primary py-5 bg-header">
    </div>
</div>

<!-- Struktur Organisasi Start -->
<div class="container-fluid py-3">
    <div class="container py-3">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-0">Struktur Organisasi</h1>
        </div>
        <div class="wow zoomIn" data-wow-delay="0.9s" ">
            <img class=" rounded wow zoomIn w-100 h-100 img-thumbnail team-item" data-wow-delay="0.1s" src="{{asset('user/img/bagan.jpg')}}" style="object-fit: cover;">
        </div>
    </div>
</div>
@endsection