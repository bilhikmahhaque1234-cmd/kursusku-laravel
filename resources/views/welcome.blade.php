@extends('layouts.app')

@section('title', 'Beranda - KursusKu')

@section('content')
<div class="row align-items-center my-5 py-3">
    <div class="col-lg-7 mb-4 mb-lg-0">
        <span class="badge bg-secondary text-primary font-monospace px-3 py-2 mb-3">
            BELAJAR WEB SECARA BERTAHAP
        </span>
        <h1 class="display-4 fw-extrabold text-white mb-3">
            Bangun kemampuan web dari PHP sampai Laravel.
        </h1>
        <p class="lead text-light opacity-75 mb-4">
            KursusKu menyediakan latihan terarah untuk pemula.
        </p>
        <div class="d-flex gap-3">
            <a href="{{ route('courses.index') }}" class="btn btn-primary fw-bold px-4 py-2 fs-6">
                Lihat Daftar Kursus
            </a>
            <a href="{{ route('pendaftaran') }}" class="btn btn-outline-light fw-bold px-4 py-2 fs-6">
                Daftar Sekarang
            </a>
        </div>
    </div>
    <div class="col-lg-5 text-center">
        <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 20px;">
            <img src="{{ asset('images/olahraga.jpg') }}" class="img-fluid" alt="Olahraga" style="object-fit: cover; height: 320px; width: 100%;">
        </div>
    </div>
</div>

<div class="mt-5 pt-4">
    <div class="d-flex align-items-center mb-4">
        <div style="width: 5px; height: 28px; background-color: #38bdf8; border-radius: 4px; margin-right: 12px;"></div>
        <h3 class="fw-bold mb-0 text-white">Kursus Pilihan</h3>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <span class="badge bg-secondary text-primary font-monospace mb-3">WEB-01</span>
                    <h5 class="fw-bold mb-2">Web Dasar</h5>
                    <p class="text-muted fs-6 mb-0">Belajar struktur HTML dan CSS dasar.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <span class="badge bg-secondary text-primary font-monospace mb-3">PHP-01</span>
                    <h5 class="fw-bold mb-2">PHP Dasar</h5>
                    <p class="text-muted fs-6 mb-0">Belajar variabel, function, form, dan logika PHP.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <span class="badge bg-secondary text-primary font-monospace mb-3">LAR-01</span>
                    <h5 class="fw-bold mb-2">Laravel Fundamental</h5>
                    <p class="text-muted fs-6 mb-0">Belajar route, controller, Blade, dan MVC.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection