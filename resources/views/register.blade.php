@extends('layouts.app')

@section('title', 'Pendaftaran - KursusKu')

@section('content')
<div class="row justify-content-center my-4">
    <div class="col-md-6 col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white font-weight-bold fs-5">
                Form Pendaftaran Kursus
            </div>
            <div class="card-body p-4">
                @if(session('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>✓ {{ session('success') }}</div>
                    </div>
                @endif

                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-bold">Nama Lengkap *</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama Anda">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Alamat Email *</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="nama@domain.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kursus" class="form-label fw-bold">Pilihan Kursus *</label>
                        <select class="form-select @error('kursus') is-invalid @enderror" id="kursus" name="kursus">
                            <option value="">-- Pilih Program Kursus --</option>
                            <option value="Laravel Fundamental" {{ old('kursus') == 'Laravel Fundamental' ? 'selected' : '' }}>LAR-01 — Laravel Fundamental</option>
                            <option value="PHP Dasar" {{ old('kursus') == 'PHP Dasar' ? 'selected' : '' }}>PHP-01 — PHP Dasar</option>
                            <option value="Web Dasar" {{ old('kursus') == 'Web Dasar' ? 'selected' : '' }}>WEB-01 — Web Dasar</option>
                        </select>
                        @error('kursus')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Box penampung sisa kuota kursus --}}
                        <div id="quota-box" class="alert alert-info mt-3 py-2 px-3" style="display: none;"></div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2 mt-2">Daftar Sekarang</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Script Ajax/Fetch Kuota --}}
<script>
    document.getElementById('kursus').addEventListener('change', function () {
        const courseName = this.value;
        const box = document.getElementById('quota-box');

        if (!courseName) {
            box.style.display = 'none';
            return;
        }

        fetch(`/api/course-availability?course=${encodeURIComponent(courseName)}`)
            .then(response => response.json())
            .then(data => {
                box.innerHTML = `<strong>${data.course}</strong> — Tersisa <strong>${data.remaining} kursi</strong>.`;
                box.style.display = 'block';
            })
            .catch(error => {
                console.error('Error fetching quota:', error);
            });
    });
</script>
@endsection