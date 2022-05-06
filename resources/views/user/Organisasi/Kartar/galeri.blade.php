@extends('user.layout.master')

@section('content')
<!-- Header -->
<div class="container-fluid position-relative p-0">
    <div class="container-fluid bg-primary py-5 bg-header">
    </div>
</div>

<!-- Galeri Start -->
<div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.3s">
    <div class="container py-3">
        <nav class="breadcrumbs mb-5">
            <small class="trail-begin"><a href="/organisasi" rel="home" class="trail-begin">Organisasi</a></small>
            <small class="sep">»</small>
            <small class="trail-end"><a href="{{route('kartar')}}" class="trail-begin">Karang Taruna</a></small>
            <small class="sep">»</small>
            <small class="trail-end">{{$title}}</small>
        </nav>
        <div class="section-title text-center position-relative pb-3 mt-5 mb-4 mx-auto" style="max-width: 600px;">
            <h1 class="mb-0">Galeri</h1>
        </div>
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-65a1da0f-074d-414a-acc5-3fa6883b8ba9"></div>
    </div>
</div>
@endsection