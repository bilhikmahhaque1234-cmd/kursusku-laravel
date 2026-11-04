@extends('layouts.app')

@section('title', $siteName ?? 'Kursusku - Beranda')

@section('content')
<section class="hero d-flex align-items-center justify-content-between gap-4 mb-5">
    <div>
        <p class="text-uppercase fw-bold text-info mb-1" style="letter-spacing: 1px;">Belajar Web Secara Bertahap</p>
        <h1 class="display-5 fw-bold mb-3 text-white">Bangun kemampuan web dari PHP sampai Laravel.</h1>
        <p class="lead text-light opacity-75">Kursusku menyediakan latihan terarah untuk pemula.</p>
    </div>
    <div class="text-end">
        <img src="{{ asset('images/olahraga.jpg') }}" 
             alt="Ilustrasi kelas Kursusku" 
             class="img-fluid rounded-3 border border-2 border-info shadow-lg" 
             style="max-width: 400px; height: auto;"
             onerror="this.src='https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=800'">
    </div>
</section>

<section class="mt-5">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-warning me-3" style="width: 5px; height: 28px;"></div>
        <h2 class="fw-bold mb-0 text-white" style="font-family: 'Orbitron', sans-serif;">Kursus Pilihan</h2>
    </div>

    <div class="row g-4 course-grid">
        @foreach ($featured as $course)
            <div class="col-md-4">
                <article class="card h-100 p-3">
                    <div class="card-body">
                        <span class="badge bg-secondary mb-3">{{ $course['code'] }}</span>
                        <h3 class="card-title text-info fw-bold mb-2 fs-4">{{ $course['name'] }}</h3>
                        <p class="card-text text-light opacity-75 fs-6">{{ $course['description'] }}</p>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
</section>
@endsection