<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KursusKu')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- CSS Utama Aplikasi (Oceanic Theme) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        /* Fallback Tema Oceanic jika style.css eksternal belum termuat */
        body {
            background-color: #e0f2fe; /* Background biru muda soft khas laut */
            color: #0f172a;
            font-family: system-ui, -apple-system, sans-serif;
        }
        .navbar-custom {
            background-color: #0284c7 !important; /* Warna biru samudra utama */
            padding: 0.75rem 0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff !important;
        }
        .navbar-custom .nav-link.active {
            font-weight: bold;
            border-bottom: 2px solid #38bdf8;
        }
    </style>
</head>
<body>

    <!-- Manggil Navbar Utama -->
    @include('partials.navbar')

    <!-- Konten Halaman -->
    <main class="container my-4">
        @yield('content')
    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>