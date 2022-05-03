@extends('user/layout/master')

@section('content')
<!-- Blog Start -->
<br>
<div class="d-flex justify-content-center">
    <h1>Berita Terkini</h1>
</div>
<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">

        <!-- Blog list Start -->
        <div class="row g-5">
            @php
            $delay=0.1;
            @endphp
            @forelse($data as $item)
            <div class="col-md-4 wow slideInUp" data-wow-duration="{{$delay+=2}}s">
                <div class="blog-item bg-light rounded overflow-hidden">
                    <div class="blog-img position-relative overflow-hidden">
                        <img class="card-img-top img-thumbnail" src="{{ Storage::url($item->image) }}" alt="image" style="height: 200px; weight:200px">
                    </div>
                    <div class="p-4">
                        <div class="d-flex mb-3">
                            <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ $item->created_at }}</small>
                        </div>
                        <a href="/berita/detail/{{ $item->id }}">
                            <h4 class="mb-3">{{ Str::limit($item->title,50) }}</h4>
                        </a>
                        <p>{!! Str::limit($item->content,80) !!}</p>
                        <a class=" text-uppercase" href="/berita/detail/{{ $item->id }}">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @empty
            <div colspan="100%" class="text-center">
                Data not found
            </div>

            @endforelse
            @if ($data->hasPages())
            <div class="row">
                <div class="col mt-4">
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
            </div>
            @endif
        </div>

        <!-- Blog list End -->


    </div>
</div>
<!-- Blog End -->
@endsection