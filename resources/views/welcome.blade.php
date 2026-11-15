@extends('layouts.app')

@section('title', 'Beranda - KursusKu')

@section('content')
{{-- 2. HERO SECTION --}}
<div class="row align-items-center my-5 py-2">
    <!-- Bagian Kiri: Banner Utama -->
    <div class="col-lg-7 mb-4 mb-lg-0">
        <div class="cyber-card p-4 p-md-5">
            <span class="badge bg-dark text-success border border-success font-monospace px-3 py-2 mb-3">
                PERTEMUAN 11 • CRUD COURSE LENGKAP
            </span>
            <h1 class="display-5 fw-bold text-white mb-3 cyber-font">
                BANGUN KEMAMPUAN WEB DARI PHP SAMPAI LARAVEL.
            </h1>
            <p class="lead text-light opacity-75 mb-4 fs-6">
                KursusKu menyediakan latihan terarah untuk pemula. Data latihan tersimpan di database dengan aturan Form Request Laravel.
            </p>
            <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('courses.index') }}" class="btn-cyber-primary">
                    <span>LIHAT DAFTAR KURSUS</span>
                </a>
                <a href="{{ url('/pendaftaran') }}" class="btn-cyber-outline">
                    <span>DAFTAR SEKARANG</span>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Bagian Kanan: Box Statistik Skew Miring -->
    <div class="col-lg-5">
        <div class="d-flex flex-column gap-3">
            <div class="cyber-stat-box text-center">
                <div class="cyber-stat-content">
                    <small class="text-muted fw-bold d-block">MODUL LATIHAN</small>
                    <h2 class="display-6 fw-bold text-white mb-0 cyber-font">8 MODUL</h2>
                </div>
            </div>
            <div class="cyber-stat-box text-center">
                <div class="cyber-stat-content">
                    <small class="text-muted fw-bold d-block">STATUS API / SYSTEM</small>
                    <h2 class="display-6 fw-bold text-success mb-0 cyber-font">ONLINE</h2>
                </div>
            </div>
            <div class="cyber-stat-box text-center">
                <div class="cyber-stat-content">
                    <small class="text-muted fw-bold d-block">KASUS UJI PRAKTIKUM</small>
                    <h2 class="display-6 fw-bold text-warning mb-0 cyber-font">15 CASES</h2>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- 3. KURSUS PILIHAN SECTION --}}
<div class="mt-5 pt-3">
    <div class="d-flex align-items-center mb-4">
        <div class="title-bar"></div>
        <h3 class="fw-bold mb-0 text-white cyber-font">KURSUS PILIHAN</h3>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 course-card-cyber">
                <div class="card-body p-4 text-white">
                    <span class="badge bg-dark text-success border border-success font-monospace mb-3">WEB-01</span>
                    <h5 class="fw-bold mb-2 cyber-font">Web Dasar</h5>
                    <p class="text-secondary fs-6 mb-0">Belajar struktur HTML dan CSS dasar.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 course-card-cyber">
                <div class="card-body p-4 text-white">
                    <span class="badge bg-dark text-success border border-success font-monospace mb-3">PHP-01</span>
                    <h5 class="fw-bold mb-2 cyber-font">PHP Dasar</h5>
                    <p class="text-secondary fs-6 mb-0">Belajar variabel, function, form, dan logika PHP.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 course-card-cyber">
                <div class="card-body p-4 text-white">
                    <span class="badge bg-dark text-success border border-success font-monospace mb-3">LAR-01</span>
                    <h5 class="fw-bold mb-2 cyber-font">Laravel Fundamental</h5>
                    <p class="text-secondary fs-6 mb-0">Belajar route, controller, Blade, dan MVC.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection