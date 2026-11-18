@extends('layouts.app')

@section('title', 'Tambah Enrollment - KursusKu')

@section('content')
<div class="row justify-content-center my-4">
    <div class="col-md-8 col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white fw-bold fs-5">
                Tambah Enrollment
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('enrollments.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="participant_id" class="form-label fw-bold">Participant *</label>
                        <select name="participant_id" id="participant_id" class="form-select @error('participant_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Participant --</option>
                            @foreach ($participants as $participant)
                                <option value="{{ $participant->id }}" @selected(old('participant_id') == $participant->id)>
                                    {{ $participant->name }} ({{ $participant->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('participant_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="course_id" class="form-label fw-bold">Course *</label>
                        <select name="course_id" id="course_id" class="form-select @error('course_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Course --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" @selected(old('course_id') == $course->id)>
                                    {{ $course->code }} - {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Box penampung sisa kuota kursus --}}
                        <div id="quota-box" class="alert alert-info mt-3 mb-0 py-2 px-3" style="display: none;"></div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2">Simpan Enrollment</button>
                    <a href="{{ route('enrollments.index') }}" class="btn btn-link text-decoration-none w-100 text-center mt-2">Lihat Laporan Enrollment</a>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Script Fetch Kuota --}}
<script>
    const courseSelect = document.getElementById('course_id');
    const quotaBox = document.getElementById('quota-box');

    function loadQuota() {
        const courseId = courseSelect.value;

        if (!courseId) {
            quotaBox.style.display = 'none';
            return;
        }

        fetch(`{{ route('course.availability') }}?course=${encodeURIComponent(courseId)}`, { headers: { 'Accept': 'application/json' } })
            .then(response => {
                if (!response.ok) throw new Error('HTTP ' + response.status);
                return response.json();
            })
            .then(data => {
                quotaBox.innerHTML = `<strong>${data.course}</strong> — Tersisa <strong>${data.remaining} kursi</strong> dari ${data.quota}.`;
                quotaBox.style.display = 'block';
            })
            .catch(error => {
                console.error('Error fetching quota:', error);
                quotaBox.textContent = 'Gagal memuat sisa kuota.';
                quotaBox.style.display = 'block';
            });
    }

    courseSelect.addEventListener('change', loadQuota);
    loadQuota();
</script>
@endsection