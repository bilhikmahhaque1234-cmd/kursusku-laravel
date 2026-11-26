@extends('layouts.app')

@section('title', 'Forgot Password - KursusKu')

@section('content')
<div class="row justify-content-center my-4">
    <div class="col-md-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h3 class="fw-bold mb-1">Forgot Password</h3>
                <p class="text-muted mb-4">Masukkan email akun Anda untuk mengatur ulang password.</p>

                @if ($errors->any())
                    <div class="alert alert-danger border-0">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email Terdaftar</label>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="form-control"
                               placeholder="admin@kursusku.test"
                               required
                               autofocus>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2 mb-3">
                        Lanjutkan Reset Password
                    </button>

                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-decoration-none small">Kembali ke halaman Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection