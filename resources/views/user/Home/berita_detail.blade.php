@extends ('user/layout/master')

@section('content')
<!-- Header -->
<div class="container-fluid position-relative p-0">
    <div class="container-fluid bg-primary py-5 bg-header">
    </div>
</div>

<!-- Blog Start -->
<div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-3">
        <div class="row g-5">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="py-2">
                    <nav class="breadcrumbs col-12">
                        <small class="trail-begin"><a href="/" rel="home" class="trail-begin">Beranda</a></small>
                        <small class="sep">»</small>
                        <small class="trail-end"><a href="{{route('berita_kartar')}}">Berita Karang Taruna</a></small>
                        <small class="sep">»</small>
                        <small class="trail-end">{{$detail->title}}</small>
                    </nav>
                </div>

                <h1 class="mb-2 mt-3">{{$detail->title}}</h1>
                <p>{{ $detail->created_at }}</p>
                <img class="img-fluid w-100 img-thumbnail" src="{{ Storage::url($detail->image) }}" alt="image berita detail">
                <figcaption style="font-size: small;font-style: italic;" class="text-center mb-4 mt-1">{{$detail->caption}}</figcaption>
                <p>{!! $detail->content !!}</p>
                <!-- Blog Detail End -->
            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4">
                <!-- Kalender -->
                <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="mb-0">Kalender</h3>
                    </div>
                    <iframe src="https://calendar.google.com/calendar/embed?height=300&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FJakarta&showTitle=0&showNav=1&showDate=1&showPrint=0&showTabs=0&showCalendars=1&showTz=0&hl=id&src=aWQuaW5kb25lc2lhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%230B8043" width="350" height="300" frameborder="0" scrolling="no"></iframe>
                </div>
                <!-- end kalender -->

                <!-- Category Start -->
                <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="mb-0">Kategori</h3>
                    </div>
                    <form class="row" action="/" method="GET">
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <select name="category" class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" onchange="this.form.submit();">
                                <option value="" selected>-- Pilih Kategori --</option>
                                @foreach ($name_category as $item)
                                <option value="{{ $item->name }}" {{ request('category') === $item->name ? 'selected' : null }}>
                                    {{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- <div class="link-animated d-flex flex-column justify-content-start ">
                            <div class="input-group">
                                <input class="form-control" type="search" name="keyword" value="{{ request('keyword') }}" placeholder="S">
                            </div>
                        </div> -->
                    </form>
                </div>
                <!-- Category End -->

                <!-- Recent Post Start -->
                <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="mb-0">Berita Terbaru</h3>
                    </div>
                    @foreach($berita_terbaru as $item)
                    <div class="d-flex rounded overflow-hidden mb-3">
                        <img class="img-fluid" src="{{ Storage::url($item->image) }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                        <a href="/berita/detail/{{ $item->id }}" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">{{Str::limit($item->title, 40)}}
                        </a>
                    </div>
                    @endforeach
                </div>
                <!-- Recent Post End -->

                <!-- Image Start -->
                <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                    <img src="img/blog-1.jpg" alt="" class="img-fluid rounded">
                </div>
                <!-- Image End -->

            </div>
            <!-- Sidebar End -->
        </div>
    </div>
</div>
<!-- Blog End -->
@endsection