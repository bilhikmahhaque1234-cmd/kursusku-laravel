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

                <form action="{{ route('pendaftaran.store') }}" method="POST">
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
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ old('kursus') == $course->id ? 'selected' : '' }}>{{ $course->code }} — {{ $course->name }}</option>
                            @endforeach
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
        const courseId = this.value;
        const box = document.getElementById('quota-box');

        if (!courseId) {
            box.style.display = 'none';
            return;
        }

        fetch(`{{ route('course.availability') }}?course=${encodeURIComponent(courseId)}`, { headers: { 'Accept': 'application/json' } })
            .then(response => {
                if (!response.ok) throw new Error('HTTP ' + response.status);
                return response.json();
            })
            .then(data => {
                box.innerHTML = `<strong>${data.course}</strong> — Tersisa <strong>${data.remaining} kursi</strong>.`;
                box.style.display = 'block';
            })
            .catch(error => {
                console.error('Error fetching quota:', error);
                box.textContent = 'Gagal memuat sisa kuota.';
                box.style.display = 'block';
            });
    });

    if (document.getElementById('kursus').value) {
        document.getElementById('kursus').dispatchEvent(new Event('change'));
    }
</script>
@endsection