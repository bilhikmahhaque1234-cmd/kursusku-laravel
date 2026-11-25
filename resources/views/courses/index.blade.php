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
            Total Kursus: <strong>{{ $courses->total() }}</strong>
        </span>
        <a href="{{ route('courses.create') }}" class="btn btn-primary fw-bold px-3 py-2">
            + Tambah Kursus
        </a>
    </div>
</div>

{{-- Pesan Sukses (Flash Message) setelah Tambah, Edit, atau Hapus --}}
@if (session('success'))
    <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show mb-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Form Search & Filter Status (Method GET) --}}
<div class="card shadow-sm border-0 mb-3">
    <div class="card-body">
        <form method="GET" action="{{ route('courses.index') }}" class="row g-2">
            <div class="col-md-6">
                <input type="search"
                       name="q"
                       value="{{ $search ?? '' }}"
                       class="form-control"
                       placeholder="Cari kode atau nama kursus">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">Semua status</option>
                    <option value="open" @selected(($status ?? '') === 'open')>Open</option>
                    <option value="closed" @selected(($status ?? '') === 'closed')>Closed</option>
                    <option value="draft" @selected(($status ?? '') === 'draft')>Draft</option>
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
                <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
            </div>
        </form>
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
                        <th class="text-center py-3" style="width: 180px;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $index => $course)
                        <tr>
                            <td class="text-center fw-bold">{{ $courses->firstItem() + $index }}</td>
                            <td>
                                <span class="badge-code">
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
                            <td class="text-center">
                                <div class="d-flex gap-1 justify-content-center flex-wrap">
                                    <a href="{{ route('courses.show', $course) }}" class="btn btn-sm btn-outline-primary">
                                        Detail
                                    </a>
                                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-outline-warning">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('courses.destroy', $course) }}" onsubmit="return confirm('Hapus kursus ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                Tidak ada kursus yang sesuai pencarian/filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if ($courses->hasPages())
        <div class="card-footer d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <small class="pagination-info">
                Menampilkan {{ $courses->firstItem() }}–{{ $courses->lastItem() }} dari {{ $courses->total() }} kursus
            </small>
            {{ $courses->links() }}
        </div>
    @endif
</div>
@endsection