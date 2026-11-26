@extends('layouts.app')

@section('title', 'Reset Password - KursusKu')

@section('content')
<div class="row justify-content-center my-4">
    <div class="col-md-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h3 class="fw-bold mb-1">Reset Password</h3>
                <p class="text-muted mb-4">Buat password baru untuk akun Anda.</p>

                @if (session('status'))
                    <div class="alert alert-info border-0">{{ session('status') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger border-0">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $email) }}" class="form-control" required readonly>
                    </div>

                    <div class="mb-3">
                        <label for="new_password" class="form-label fw-semibold">Password Baru (min. 6 karakter)</label>
                        <div class="input-group">
                            <input type="password" id="new_password" name="password" class="form-control" required>
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('new_password', this)">👁</button>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password Baru</label>
                        <div class="input-group">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password_confirmation', this)">👁</button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2">
                        Simpan Password Baru
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword(inputId, btn) {
    const input = document.getElementById(inputId);
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>
@endsection