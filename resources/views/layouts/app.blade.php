<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'KursusKu')</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Custom (style.css di folder public/css/) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
</head>
<body>
    <!-- NAV BAR LANGSUNG DI SINI -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="/">KursusKu</a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#menuUtama"
                    aria-controls="menuUtama" aria-expanded="false" aria-label="Buka menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuUtama">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('courses*') ? 'active' : '' }}" href="{{ route('courses.index') }}">Daftar Kursus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('pendaftaran*') ? 'active' : '' }}"
                           href="{{ url('/pendaftaran') }}">Pendaftaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>