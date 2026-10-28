<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursusku - Beranda</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #bfe0f8; /* Background Biru Muda */
            color: #1e293b;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        /* Header / Navbar Biru Tua */
        header {
            background-color: #0c66a6;
            border-bottom: 3px solid #f59e0b; /* Garis Oranye/Kuning */
            padding: 16px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.3rem;
            font-weight: 800;
            color: #ffffff;
            text-decoration: none;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 600;
            font-size: 0.95rem;
        }

        /* Container Beranda */
        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* Hero Section Split Layout */
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            margin-bottom: 50px;
        }

        .hero-text {
            flex: 1;
        }

        .tagline {
            color: #0c66a6;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        h1 {
            font-size: 2.2rem;
            color: #0c66a6;
            font-weight: 800;
            line-height: 1.25;
            margin: 12px 0 16px 0;
        }

        .hero-text p {
            color: #334155;
            font-size: 0.95rem;
            line-height: 1.5;
            margin: 0;
        }

        .hero-image {
            flex: 1;
            text-align: right;
        }

        .hero-image img {
            width: 100%;
            max-width: 420px;
            border-radius: 12px;
            border: 3px solid #f59e0b; /* Border Oranye Gambar */
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            object-fit: cover;
        }

        /* Section Title dengan Garis Oranye Samping */
        .section-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: #0c66a6;
            border-left: 4px solid #f59e0b;
            padding-left: 10px;
            margin-bottom: 20px;
        }

        /* Grid Cards Kursus Pilihan */
        .course-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .course-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            border-top: 4px solid #f59e0b;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .badge {
            display: inline-block;
            background-color: #0c66a6;
            color: white;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            margin-bottom: 12px;
        }

        .course-card h3 {
            margin: 0 0 10px 0;
            color: #0c66a6;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .course-card p {
            color: #64748b;
            font-size: 0.88rem;
            line-height: 1.4;
            margin: 0;
        }
    </style>
</head>
<body>

    <header>
        <a href="/" class="logo">Kursusku</a>
        <nav>
            <a href="/">Beranda</a>
            <a href="/register-course">Pendaftaran</a>
        </nav>
    </header>

    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
            <div class="hero-text">
                <div class="tagline">BELAJAR WEB SECARA BERTAHAP</div>
                <h1>Bangun kemampuan web dari PHP sampai Laravel.</h1>
                <p>Kursusku menyediakan latihan terarah untuk pemula.</p>
            </div>
            <div class="hero-image">
                <img src="{{ asset('images/olahraga.jpg') }}" alt="Hero Kursusku" onerror="this.src='https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=800'">
            </div>
        </div>

        <!-- Section Kursus Pilihan -->
        <div class="section-title">Kursus Pilihan</div>
        
        <div class="course-grid">
            <div class="course-card">
                <span class="badge">WEB-01</span>
                <h3>Web Dasar</h3>
                <p>Belajar struktur HTML dan CSS dasar.</p>
            </div>

            <div class="course-card">
                <span class="badge">PHP-01</span>
                <h3>PHP Dasar</h3>
                <p>Belajar variabel, function, form, dan logika PHP.</p>
            </div>

            <div class="course-card">
                <span class="badge">LAR-01</span>
                <h3>Laravel Fundamental</h3>
                <p>Belajar route, controller, Blade, dan MVC.</p>
            </div>
        </div>
    </div>

</body>
</html>