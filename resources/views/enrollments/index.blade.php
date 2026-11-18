@extends('layouts.app')

@section('title', 'Laporan Enrollment - KursusKu')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1 text-white">Laporan Enrollment KursusKu</h2>
        <p class="text-light opacity-75 mb-0">Daftar gabungan peserta dan kursus yang diikuti.</p>
    </div>
    <a href="{{ route('enrollments.create') }}" class="btn btn-primary fw-bold px-3 py-2">
        + Tambah Enrollment
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success border-0 shadow-sm mb-4">{{ session('success') }}</div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="py-3 ps-4">PARTICIPANT</th>
                        <th class="py-3">COURSE</th>
                        <th class="py-3">START DATE</th>
                        <th class="text-center py-3">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($enrollments as $enrollment)
                        <tr>
                            <td class="ps-4 fw-bold">{{ $enrollment->participant->name }}</td>
                            <td>{{ $enrollment->course->name }}</td>
                            <td>{{ $enrollment->course->start_date->format('d M Y') }}</td>
                            <td class="text-center">
                                <span class="badge bg-success px-3 py-2">{{ ucfirst($enrollment->status) }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">Belum ada enrollment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection