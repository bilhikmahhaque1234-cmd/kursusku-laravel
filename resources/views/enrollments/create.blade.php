@extends('layouts.app')

@section('title', 'Pendaftaran Kursus - KursusKu')

@section('content')
<div class="row justify-content-center my-4">
    <div class="col-md-8 col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header">
                Pendaftaran Kursus (Week 09)
            </div>
            <div class="card-body p-4">
                {{-- Flash Message Sukses --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        🌊 {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('course.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama') }}" placeholder="Masukkan nama Anda">
                        @error('nama')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="nama@domain.com">
                        @error('email')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kursus" class="form-label">Pilihan Kursus</label>
                        <select id="kursus" name="kursus" class="form-select">
                            <option value="">-- Pilih Program Kursus --</option>
                            <option value="Laravel Framework" {{ old('kursus') == 'Laravel Framework' ? 'selected' : '' }}>Laravel Framework</option>
                            <option value="PHP Native Fundamentals" {{ old('kursus') == 'PHP Native Fundamentals' ? 'selected' : '' }}>PHP Native Fundamentals</option>
                            <option value="Web Design & UI/UX" {{ old('kursus') == 'Web Design & UI/UX' ? 'selected' : '' }}>Web Design & UI/UX</option>
                        </select>
                        @error('kursus')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 mt-2">Kirim Pendaftaran</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
