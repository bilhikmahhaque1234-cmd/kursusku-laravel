@extends('layouts.app')

@section('title', 'Tambah Kursus - KursusKu')

@section('content')
<div class="row justify-content-center my-4">
    <div class="col-md-8 col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white font-weight-bold fs-5">
                Tambah Kursus Baru
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('courses.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="code" class="form-label fw-bold">Kode Kursus *</label>
                        <input type="text" id="code" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" placeholder="Contoh: WEB-101" required maxlength="20">
                        @error('code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nama Kursus *</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Contoh: Web Dasar" required maxlength="120">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Deskripsi</label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Penjelasan singkat kursus">{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="fee" class="form-label fw-bold">Biaya (Rp) *</label>
                            <input type="number" id="fee" name="fee" class="form-control @error('fee') is-invalid @enderror" value="{{ old('fee', 0) }}" min="0" required>
                            @error('fee') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="quota" class="form-label fw-bold">Kuota *</label>
                            <input type="number" id="quota" name="quota" class="form-control @error('quota') is-invalid @enderror" value="{{ old('quota', 20) }}" min="1" max="500" required>
                            @error('quota') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="start_date" class="form-label fw-bold">Tanggal Mulai *</label>
                            <input type="date" id="start_date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" required>
                            @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label fw-bold">Status *</label>
                            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="draft" @selected(old('status') === 'draft')>Draft</option>
                                <option value="open" @selected(old('status') === 'open')>Open</option>
                                <option value="closed" @selected(old('status') === 'closed')>Closed</option>
                            </select>
                            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2">Simpan Kursus</button>
                    <a href="{{ route('courses.index') }}" class="btn btn-link text-decoration-none w-100 text-center mt-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection