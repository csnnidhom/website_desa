@extends('user/layout/master')

@section('content')
<!-- Slider -->
<div class="container-fluid position-relative p-0">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <video autoplay muted loop class="w-100" src="{{asset('user/video/pemandangan.mp4')}}">
                </video>
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h1 class="display-1 animated wow zoomIn" data-wow-delay="0.5s">
                            <a class="caption-slider" title="Website Sememi Kidul" style="font-family: serif;">Desa Sememi Kidul</a>
                        </h1>
                        <h1 class="animated wow zoomIn" data-wow-delay="0.9s">
                            <a class="caption-slider" style="font-size: 80%;">Kec. Benowo Kota Surabaya</a>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Beranda Start -->
<div class="container-fluid py-3">
    <div class="container py-3">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-0">Berita Terkini</h1>
        </div>

        <!-- Blog list Start -->
        <div class="row g-5">
            @php
            $delay=0.1;
            @endphp
            @forelse($data as $item)
            <div class="col-md-4 wow zoomIn" data-wow-delay="{{$delay+=0.2}}s">
                <div class="blog-item bg-light rounded overflow-hidden team-item">
                    <div class="blog-img position-relative overflow-hidden">
                        <a href="/berita/detail/{{ $item->id }}">
                            <img class="card-img-top img-thumbnail" src="{{ Storage::url($item->image) }}" alt="image" style="height: 200px; weight:200px">
                        </a>
                    </div>
                    <div class="p-4">
                        <div class="d-flex mb-3">
                            <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ $item->created_at }}</small>
                        </div>
                        <a href="/berita/detail/{{ $item->id }}">
                            <h4 class="mb-3">{{ Str::limit($item->title,50) }}</h4>
                        </a>
                        <p>{!! Str::limit($item->content,80) !!}</p>
                        <a class="text-uppercase" href="/berita/detail/{{ $item->id }}">Baca Selengkapnya<i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @empty
            <div colspan="100%" class="text-center">
                Data not found
            </div>
            @endforelse

            <div class="mt-4 wow zoomIn" data-wow-delay="{{$delay+=0.2}}s">
                @if ($data->hasPages())
                <ul class=" pagination" role="navigation">
                    {{-- Previous Page Link --}}
                    @if ($data->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $data->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                    @endif

                    <?php
                    $start = $data->currentPage() - 2; // show 3 pagination links before current
                    $end = $data->currentPage() + 2; // show 3 pagination links after current
                    if ($start < 1) {
                        $start = 1; // reset start to 1
                        $end += 1;
                    }
                    if ($end >= $data->lastPage()) $end = $data->lastPage(); // reset end to last page
                    ?>

                    @if($start > 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ $data->url(1) }}">{{1}}</a>
                    </li>
                    @if($data->currentPage() != 4)
                    {{-- "Three Dots" Separator --}}
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                    @endif
                    @endif
                    @for ($i = $start; $i <= $end; $i++) <li class="page-item {{ ($data->currentPage() == $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{ $data->url($i) }}">{{$i}}</a>
                        </li>
                        @endfor
                        @if($end < $data->lastPage())
                            @if($data->currentPage() + 3 != $data->lastPage())
                            {{-- "Three Dots" Separator --}}
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                            @endif
                            <li class="page-item">
                                <a class="page-link" href="{{ $data->url($data->lastPage()) }}">{{$data->lastPage()}}</a>
                            </li>
                            @endif

                            {{-- Next Page Link --}}
                            @if ($data->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $data->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                            </li>
                            @else
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                            </li>
                            @endif
                </ul>
                @endif
            </div>
        </div>
        <!-- Blog list End -->
    </div>
</div>
<!-- Blog End -->
@endsection