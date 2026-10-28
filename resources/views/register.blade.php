<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran - KursusKu</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #bfe0f8; /* Background Biru Muda Week 7 */
            color: #1e293b;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        /* Header / Navbar Biru Tua Week 7 */
        header {
            background-color: #0c66a6;
            border-bottom: 3px solid #f59e0b; /* Garis oranye/kuning khas */
            padding: 16px 40px;
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

        nav a.active {
            border-bottom: 2px solid #ffffff;
            padding-bottom: 2px;
        }

        /* Container Card Putih Bersih */
        .main-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .card {
            background: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            border-top: 4px solid #f59e0b; /* Aksen Oranye di Atas Card */
        }

        h2 {
            margin-top: 0;
            color: #0c66a6;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 0.9rem;
            color: #334155;
        }

        input, select {
            width: 100%;
            padding: 11px 14px;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            color: #1e293b;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        input:focus, select:focus {
            border-color: #0c66a6;
            outline: none;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(12, 102, 166, 0.15);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #0c66a6;
            border: none;
            color: #ffffff;
            font-weight: 700;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 1rem;
            transition: background 0.2s;
        }

        button:hover {
            background-color: #094e80;
        }

        .alert-success {
            background: #dcfce7;
            border: 1px solid #22c55e;
            color: #15803d;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .error-text {
            color: #ef4444;
            font-size: 0.83rem;
            margin-top: 5px;
            display: block;
        }
    </style>
</head>
<body>

    <header>
        <a href="/" class="logo">KursusKu</a>
        <nav>
            <a href="/">Beranda</a>
            <a href="/register-course" class="active">Pendaftaran</a>
        </nav>
    </header>

    <div class="main-container">
        <div class="card">
            <h2>Pendaftaran Kursus</h2>

            @if(session('success'))
                <div class="alert-success">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('course.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="nama">Nama Lengkap *</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama Anda">
                    @error('nama')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Alamat Email *</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@domain.com">
                    @error('email')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kursus">Pilihan Kursus *</label>
                    <select id="kursus" name="kursus">
                        <option value="">-- Pilih Program Kursus --</option>
                        <option value="Laravel Fundamental" {{ old('kursus') == 'Laravel Fundamental' ? 'selected' : '' }}>LAR-01 — Laravel Fundamental</option>
                        <option value="PHP Dasar" {{ old('kursus') == 'PHP Dasar' ? 'selected' : '' }}>PHP-01 — PHP Dasar</option>
                        <option value="Web Dasar" {{ old('kursus') == 'Web Dasar' ? 'selected' : '' }}>WEB-01 — Web Dasar</option>
                    </select>
                    @error('kursus')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit">Daftar Sekarang</button>
            </form>
        </div>
    </div>

</body>
</html>