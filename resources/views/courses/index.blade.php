@extends('layouts.app')

@section('title', 'Daftar Kursus - KursusKu')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1 text-white">Daftar Kursus</h2>
        <p class="text-light opacity-75 mb-0">Kelola dan lihat semua daftar kursus yang tersedia di sistem KursusKu.</p>
    </div>
    <div class="d-flex align-items-center gap-3">
        <span class="badge bg-secondary fs-6">
            Total Kursus: <strong>{{ $courses->count() }}</strong>
        </span>
        <a href="{{ route('courses.create') }}" class="btn btn-primary fw-bold px-3 py-2">
            + Tambah Kursus
        </a>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="text-center py-3" style="width: 50px;">NO</th>
                        <th class="py-3">KODE</th>
                        <th class="py-3">NAMA KURSUS</th>
                        <th class="py-3">BIAYA</th>
                        <th class="text-center py-3">KUOTA</th>
                        <th class="py-3">TANGGAL MULAI</th>
                        <th class="text-center py-3">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $index => $course)
                        <tr>
                            <td class="text-center fw-bold">{{ $index + 1 }}</td>
                            <td>
                                <span class="badge bg-light text-dark border font-monospace fs-6">
                                    {{ $course->code }}
                                </span>
                            </td>
                            <td>
                                <div class="fw-bold">{{ $course->name }}</div>
                                @if($course->description)
                                    <small class="text-muted d-block">{{ Str::limit($course->description, 50) }}</small>
                                @endif
                            </td>
                            <td class="fw-bold text-danger">
                                {{-- DIPERBAIKI: Menggunakan $course->fee (bukan $course->price) --}}
                                Rp {{ number_format($course->fee, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                <span class="fw-bold">{{ $course->quota }}</span>
                                <small class="text-muted d-block">orang</small>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($course->start_date)->format('d M Y') }}
                            </td>
                            <td class="text-center">
                                @if(strtolower($course->status) == 'open' || strtolower($course->status) == 'published')
                                    <span class="badge bg-success px-3 py-2">Open</span>
                                @elseif(strtolower($course->status) == 'draft')
                                    <span class="badge bg-warning text-dark px-3 py-2">Draft</span>
                                @else
                                    <span class="badge bg-secondary px-3 py-2">{{ ucfirst($course->status) }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                Belum ada data kursus yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection