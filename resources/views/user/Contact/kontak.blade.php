@extends('user/layout/master')

@section('content')
<!-- Header -->
<div class="container-fluid position-relative p-0">
    <div class="container-fluid bg-primary py-5 bg-header">
    </div>
</div>

<!-- Kontak Start -->
<div class="container-fluid py-3">
    <div class="container py-3">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto">
            <h1 class="mb-0">Kontak</h1>
        </div>
        <div class="row g-5 mb-5 wow zoomIn" data-wow-delay="0.1s">
            <div class="col-lg-4">
                <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                    <a href="https://api.whatsapp.com/send?phone=6285231084726&text=Halo%20Admin%20,saya%20ingin%20menyampaikan%20sesuatu.%20" target="_blank">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                    </a>
                    <div class="ps-4">
                        <h5 class="mb-2">Telepon</h5>
                        <h4 class="text-primary mb-0" style="font-size: larger;">083849921699</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.2s">
                <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                    <a href="mailto:chusnunnidhom@gmail.com">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                    </a>
                    <div class="ps-4">
                        <h5 class="mb-2">Email</h5>
                        <h4 class="text-primary mb-0" style="font-size: larger;">sememi-kidul@gmail.com</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                    <a href="https://goo.gl/maps/3B6gj4GCkvZXPnBJA" target="_blank">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                    </a>
                    <div class="ps-4">
                        <h5 class="mb-2">Alamat</h5>
                        <h4 class="text-primary mb-0" style="font-size: larger;">Jl. Sememi Kidul</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-lg-6 wow ">
                @if ($message = Session::get('success'))
                <div class="alert alert-success wow zoomIn" data-wow-delay="0.2s">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <form action="{{ route('kirim_pesan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control border-0 bg-light px-4 wow zoomIn" data-wow-delay="0.5s" placeholder="Nama" style="height: 55px;">
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control border-0 bg-light px-4 wow zoomIn" data-wow-delay="0.7s" placeholder="Email" style="height: 55px;">
                        </div>
                        <div class="col-12">
                            <input type="text" name="perihal" class="form-control border-0 bg-light px-4 wow zoomIn" data-wow-delay="0.9s" placeholder="Perihal" style="height: 55px;">
                        </div>
                        <div class="col-12">
                            <textarea name="pesan" class="form-control border-0 bg-light px-4 py-3 wow zoomIn" data-wow-delay="1.1s" rows="4" placeholder="Pesan"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 py-3 wow zoomIn" type="submit" data-wow-delay="1.3s">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 wow zoomIn" data-wow-delay="1.5s">
                <iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.5067099548132!2d112.6366195291781!3d-7.237777799673452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe7ae5214b558b172!2zN8KwMTQnMTYuMCJTIDExMsKwMzgnMTMuOCJF!5e0!3m2!1sid!2sid!4v1650389232533!5m2!1sid!2sid" frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection