@extends('user/layout/master')

@section('content')
<!-- Header -->
<div class="container-fluid position-relative p-0">
    <div class="container-fluid bg-primary py-5 bg-header">
    </div>
</div>

<!-- Visi Misi Start -->
<div class="container-fluid py-3">
    <div class="container py-3">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-0">Visi dan Misi</h1>
        </div>
        <div class="row g-3">
            <div class="col-lg-5 wow zoomIn" data-wow-delay="1s" style="min-height: 350px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded wow zoomIn img-thumbnail" data-wow-delay="0.s" src="{{asset('user/img/feature.jpg')}}" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class=" wow zoomIn" data-wow-delay="0.1s">
                    <h4>VISI :</h4>
                    <p class="mb-2">Visi Desa Ciburial adalah “TERWUJUDNYA CIBURIAL JUARA DENGAN GERAKAN MAJU SABILULUNGAN DAN GIAT YANG BERLANDASKAN RELIGIUS DAN BUDAYA”.</p>
                </div>
                <div class=" wow zoomIn" data-wow-delay="0.4s">
                    <h4>MISI :</h4>
                    <p class="mb-0">Untuk terwujudnya visi tersebut ditetapkan lima upaya/cara atau misi yang akan mendukung pencapaian visi yaitu:</p>
                    <p>1. MEWUJUDKAN TATA KELOLA PEMERINTAHAN YANG BAIK, SOLID DAN INOVATIF</p>
                    <p>2. MENINGKATKAN KUALITAS SUMBER DAYA MANUSIA (SDM) BERLANDASKAN TAKWA, PANCASILA DAN BUDAYA</p>
                    <p>3. MENINGKATKAN PRODUKTIVITAS DAN DAYA SAING EKONOMI MASYARAKAT</p>
                    <p>4. PEMERATAAN PEMBANGUNAN INFRASTRUKTUR DENGAN MENGEDEPANKAN PRIORITAS BERBASIS LINGKUNGAN DAN TATA RUANG YANG BERKELANJUTAN</p>
                    <p>5. MENINGKATKAN PELAYANAN PUBLIK YANG LEBIH INOVATIF.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection