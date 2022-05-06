@extends('user.layout.master')

@section('content')
<!-- Header -->
<div class="container-fluid position-relative p-0">
    <div class="container-fluid bg-primary py-5 bg-header">
    </div>
</div>

<!-- Berita Start -->
<div class="container-fluid py-3">
    <div class="container py-3">
        <nav class="breadcrumbs mb-5 wow zoomIn" data-wow-delay="2s">
            <small class="trail-begin"><a href="/organisasi" rel="home" class="trail-begin">Organisasi</a></small>
            <small class="sep">»</small>
            <small class="trail-end"><a href="{{route('asm_putra')}}" class="trail-begin">ASM Putra</a></small>
            <small class="sep">»</small>
            <small class="trail-end">{{$title}}</small>
        </nav>
        <div class="section-title text-center position-relative pb-3 mt-5 mb-4 mx-auto wow zoomIn" data-wow-delay="0.5s" style="max-width: 600px;">
            <h1 class="mb-0">Berita</h1>
        </div>
    </div>
</div>

@forelse ($berita_asm_putra as $item)
<div class="container-fluid py-0">
    <div class="container py-3">
        <div class="card team-item wow zoomIn" data-wow-delay="0.4s">
            <div class="card-body">
                <div class="row g-5">
                    <div class="col-lg-5 wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded wow zoomIn img-thumbnail" data-wow-delay="1.5s" src="{{ Storage::url($item->image) }}" style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-7 ">
                        <div class=" position-relative pb-0 mb-0 wow zoomIn" data-wow-delay="1s">
                            <h1 class=" wow zoomIn">{{$item->title}}</h1>
                        </div>
                        <div class="d-flex mb-3 wow zoomIn" data-wow-delay="1.2s">
                            <small style="font-style: italic;"><i class="far fa-calendar-alt text-primary me-2"></i>{{ $item->created_at }}</small>
                        </div>
                        <div class=" wow zoomIn" data-wow-delay="1.3s">
                            <p>{!! Str::limit($item->content,200) !!}</p>
                        </div>
                        <a href="/berita/detail/{{ $item->id }}" class="btn btn-primary py-2 px-2 mt-1 wow zoomIn rounded" data-wow-delay="1.4s">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@empty
<div class="justify-content-center text-center wow zoomIn" data-wow-delay="1s">
    <h8 style="font-style: italic;">Belum ada berita</h8>
</div>

@endforelse

<!-- Pagination -->
<div class="container py-2">
    @if ($berita_asm_putra->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($berita_asm_putra->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span class="page-link" aria-hidden="true">&lsaquo;</span>
        </li>
        @else
        <li class="page-item">
            <a class="page-link" href="{{ $berita_asm_putra->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
        </li>
        @endif

        <?php
        $start = $berita_asm_putra->currentPage() - 2; // show 3 pagination links before current
        $end = $berita_asm_putra->currentPage() + 2; // show 3 pagination links after current
        if ($start < 1) {
            $start = 1; // reset start to 1
            $end += 1;
        }
        if ($end >= $berita_asm_putra->lastPage()) $end = $berita_asm_putra->lastPage(); // reset end to last page
        ?>

        @if($start > 1)
        <li class="page-item">
            <a class="page-link" href="{{ $berita_asm_putra->url(1) }}">{{1}}</a>
        </li>
        @if($berita_asm_putra->currentPage() != 4)
        {{-- "Three Dots" Separator --}}
        <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
        @endif
        @endif
        @for ($i = $start; $i <= $end; $i++) <li class="page-item {{ ($berita_asm_putra->currentPage() == $i) ? ' active' : '' }}">
            <a class="page-link" href="{{ $berita_asm_putra->url($i) }}">{{$i}}</a>
            </li>
            @endfor
            @if($end < $berita_asm_putra->lastPage())
                @if($berita_asm_putra->currentPage() + 3 != $berita_asm_putra->lastPage())
                {{-- "Three Dots" Separator --}}
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                @endif
                <li class="page-item">
                    <a class="page-link" href="{{ $berita_asm_putra->url($berita_asm_putra->lastPage()) }}">{{$berita_asm_putra->lastPage()}}</a>
                </li>
                @endif

                {{-- Next Page Link --}}
                @if ($berita_asm_putra->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $berita_asm_putra->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
                @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
                @endif
    </ul>
    @endif
</div>

@endsection