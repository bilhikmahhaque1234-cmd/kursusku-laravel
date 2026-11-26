@extends('layouts.app')

@section('title', 'Profil Saya & Dashboard - KursusKu')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1 text-white">Profil Saya & Dashboard</h2>
        <p class="text-light opacity-75 mb-0">Informasi akun aktif dan ringkasan data sistem KursusKu.</p>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger fw-bold px-4 py-2">
            Logout
        </button>
    </form>
</div>

@if (session('success'))
    <div class="alert alert-success border-0 shadow-sm mb-4">{{ session('success') }}</div>
@endif

<div class="row g-4">
    <div class="col-md-5">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3">Informasi Profil Pengguna</h5>
                <table class="table table-borderless mb-0">
                    <tr>
                        <th class="ps-0 text-muted" style="width: 130px;">Nama</th>
                        <td class="fw-bold">: {{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th class="ps-0 text-muted">Email</th>
                        <td>: {{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th class="ps-0 text-muted">Status Akun</th>
                        <td>: <span class="badge bg-success">Aktif (Terautentikasi)</span></td>
                    </tr>
                    <tr>
                        <th class="ps-0 text-muted">Terdaftar Sejak</th>
                        <td>: {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3">Ringkasan Data KursusKu</h5>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="p-3 rounded bg-light border">
                            <small class="text-muted d-block">Total Kursus</small>
                            <h3 class="fw-bold mb-0 text-primary">{{ $stats['total_courses'] }}</h3>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 rounded bg-light border">
                            <small class="text-muted d-block">Kursus Open</small>
                            <h3 class="fw-bold mb-0 text-success">{{ $stats['open_courses'] }}</h3>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 rounded bg-light border">
                            <small class="text-muted d-block">Total Peserta</small>
                            <h3 class="fw-bold mb-0 text-dark">{{ $stats['total_participants'] }}</h3>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 rounded bg-light border">
                            <small class="text-muted d-block">Total Enrollment</small>
                            <h3 class="fw-bold mb-0 text-info">{{ $stats['total_enrollments'] }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection