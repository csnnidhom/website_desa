@extends('layout.master_user')

@section('tittle', 'Berita')

@section('konten')

<!-- ======= Berita Section ======= -->
@foreach ($berita as $value)
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-8 entries">
                <article class="entry">
                    <div class="entry-img">
                        <img src="user_moderna/assets/img/blog/blog-1.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $value->judul }}</h5>
                        <a href="/berita_detail/{{ $value->id }}" class="btn btn-primary">Baca Artikel</a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
@endforeach

@endsection