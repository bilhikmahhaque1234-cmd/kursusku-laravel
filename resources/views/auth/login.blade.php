@extends('layouts.app')

@section('title', 'Login - KursusKu')

@section('content')
<div class="row justify-content-center my-4">
    <div class="col-md-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h3 class="fw-bold mb-1">Login KursusKu</h3>
                <p class="text-muted mb-4">Masuk untuk mengakses halaman profil dan dashboard.</p>

                @if (session('success'))
                    <div class="alert alert-success border-0">{{ session('success') }}</div>
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

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="form-control"
                               placeholder="admin@kursusku.test"
                               required
                               autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <input type="password"
                                   id="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Masukkan password"
                                   required>
                            <button type="button"
                                    class="btn btn-outline-secondary"
                                    onclick="togglePassword('password', this)"
                                    title="Tampilkan / Sembunyikan Password">
                                👁
                            </button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Remember Password
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-decoration-none small fw-semibold">
                            Forgot Password?
                        </a>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword(inputId, btn) {
    const input = document.getElementById(inputId);
    if (input.type === 'password') {
        input.type = 'text';
        btn.classList.replace('btn-outline-secondary', 'btn-secondary');
    } else {
        input.type = 'password';
        btn.classList.replace('btn-secondary', 'btn-outline-secondary');
    }
}
</script>
@endsection