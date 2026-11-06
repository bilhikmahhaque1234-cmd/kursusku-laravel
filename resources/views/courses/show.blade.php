@extends('layouts.app')

@section('title', 'Detail Kursus - KursusKu')

@section('content')
<div class="container py-3">

    {{-- Alert Success --}}
    @if (session('success'))
        <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Navigation & Header Bar --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('courses.index') }}" class="btn btn-outline-light d-inline-flex align-items-center gap-2 px-3 py-2 fw-semibold">
            <span>←</span> Kembali ke Daftar
        </a>
        <div class="d-flex gap-2">
            <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning font-weight-bold px-3 py-2 shadow-sm text-dark">
                ✏️ Edit Kursus
            </a>
            <form method="POST" action="{{ route('courses.destroy', $course) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kursus ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger px-3 py-2 shadow-sm">
                    🗑️ Hapus
                </button>
            </form>
        </div>
    </div>

    {{-- Main Detail Card --}}
    <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 16px;">
        {{-- Card Banner Top --}}
        <div class="card-header border-0 py-4 px-4 px-md-5" style="background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <span class="badge bg-light text-primary font-monospace px-3 py-2 fs-6 mb-2 shadow-sm">
                        {{ $course->code }}
                    </span>
                    <h2 class="fw-bold text-white mb-1">{{ $course->name }}</h2>
                </div>
                <div>
                    @if(strtolower($course->status) == 'open')
                        <span class="badge bg-success px-4 py-2 fs-6 shadow-sm">● Open / Buka</span>
                    @elseif(strtolower($course->status) == 'draft')
                        <span class="badge bg-warning text-dark px-4 py-2 fs-6 shadow-sm">● Draft</span>
                    @else
                        <span class="badge bg-secondary px-4 py-2 fs-6 shadow-sm">● {{ ucfirst($course->status) }}</span>
                    @endif
                </div>
            </div>
        </div>

        {{-- Card Body Content --}}
        <div class="card-body p-4 p-md-5">
            {{-- Description Section --}}
            <div class="mb-5">
                <h5 class="fw-bold text-primary mb-2">Deskripsi Kursus</h5>
                <p class="text-secondary fs-6 leading-relaxed mb-0">
                    {{ $course->description ?: 'Tidak ada deskripsi tambahan untuk kursus ini.' }}
                </p>
            </div>

            <hr class="my-4 opacity-10">

            {{-- Grid Info Details --}}
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-3 rounded-3 bg-light border border-light">
                        <small class="text-muted d-block fw-semibold text-uppercase fs-7 mb-1">Biaya Pendaftaran</small>
                        <h4 class="fw-bold text-success mb-0">
                            Rp {{ number_format($course->fee, 0, ',', '.') }}
                        </h4>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-3 rounded-3 bg-light border border-light">
                        <small class="text-muted d-block fw-semibold text-uppercase fs-7 mb-1">Kuota Peserta</small>
                        <h4 class="fw-bold text-dark mb-0">
                            {{ $course->quota }} <span class="fs-6 fw-normal text-muted">Peserta</span>
                        </h4>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-3 rounded-3 bg-light border border-light">
                        <small class="text-muted d-block fw-semibold text-uppercase fs-7 mb-1">Tanggal Pelaksanaan</small>
                        <h4 class="fw-bold text-dark mb-0">
                            {{ \Carbon\Carbon::parse($course->start_date)->format('d M Y') }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection