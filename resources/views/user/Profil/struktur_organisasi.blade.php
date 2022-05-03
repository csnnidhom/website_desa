@extends('user/layout/master')

@section('content')
<div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-3">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h1 class="mb-0">Struktur Organisasi</h1>
        </div>
        <div class="row">
            <div class="col wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                <div class="position-relative">
                    <img class="rounded wow zoomIn w-100 h-100 img-thumbnail" data-wow-delay="0.1s" src="{{asset('user/img/bagan.jpg')}}" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection