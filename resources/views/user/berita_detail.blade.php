@extends('layout.master_user')

@section('tittle')
{{ $berita->judul }}
@endsection

@section('konten')

<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-8 entries">

                <article class="entry entry-single">

                    <div class="entry-img">
                        <img src="https://atlantictravelsusa.com/wp-content/uploads/2016/04/dummy-post-horisontal-thegem-blog-default.jpg" alt="" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                        <a>{{ $berita->judul }}</a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        <p class="mt-5">{{ $berita->deskripsi }}</p>
                    </div>

                </article><!-- End blog entry -->

            </div><!-- End blog entries list -->

        </div>

    </div>
</section>
<!-- End Blog Single Section -->
@endsection