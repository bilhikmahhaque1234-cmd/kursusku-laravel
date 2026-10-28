<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kursus - Tema Laut</title>
    <style>
        body { 
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%); 
            color: #f8fafc; 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; 
            padding: 40px 20px; 
            margin: 0;
            min-height: 100vh;
        }
        .container { 
            max-width: 480px; 
            margin: 0 auto; 
            background: rgba(30, 41, 59, 0.85); 
            backdrop-filter: blur(10px);
            padding: 30px; 
            border-radius: 12px; 
            border: 1px solid #334155; 
            box-shadow: 0 10px 25px -5px rgba(2, 132, 199, 0.25); 
        }
        h2 { 
            margin-top: 0; 
            color: #38bdf8; /* Warna Biru Laut Cerah */
            border-bottom: 2px solid #0284c7; 
            padding-bottom: 12px; 
            font-size: 1.4rem; 
            font-weight: 600;
        }
        .form-group { 
            margin-bottom: 18px; 
        }
        label { 
            display: block; 
            margin-bottom: 6px; 
            font-weight: 600; 
            font-size: 0.9rem; 
            color: #94a3b8;
        }
        input, select { 
            width: 100%; 
            padding: 11px 14px; 
            background: #0f172a; 
            border: 1px solid #334155; 
            color: #f8fafc; 
            border-radius: 8px; 
            box-sizing: border-box; 
            font-size: 0.95rem; 
            transition: all 0.3s ease;
        }
        input:focus, select:focus { 
            border-color: #38bdf8; 
            outline: none; 
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.25);
        }
        button { 
            width: 100%; 
            padding: 12px; 
            background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%); 
            border: none; 
            color: #ffffff; 
            font-weight: 600; 
            border-radius: 8px; 
            cursor: pointer; 
            margin-top: 10px; 
            font-size: 0.95rem; 
            transition: transform 0.2s, box-shadow 0.2s;
        }
        button:hover { 
            background: linear-gradient(135deg, #38bdf8 0%, #0284c7 100%); 
            box-shadow: 0 4px 12px rgba(56, 189, 248, 0.4);
        }
        .alert-success { 
            background: rgba(14, 165, 233, 0.15); 
            border: 1px solid #38bdf8; 
            color: #38bdf8; 
            padding: 12px; 
            border-radius: 8px; 
            margin-bottom: 20px; 
            font-size: 0.9rem; 
        }
        .error-text { 
            color: #f43f5e; 
            font-size: 0.82rem; 
            margin-top: 5px; 
            display: block; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pendaftaran Kursus (Week 09)</h2>

        {{-- Flash Message Sukses --}}
        @if(session('success'))
            <div class="alert-success">
                🌊 {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('course.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama Anda">
                @error('nama')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@domain.com">
                @error('email')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kursus">Pilihan Kursus</label>
                <select id="kursus" name="kursus">
                    <option value="">-- Pilih Program Kursus --</option>
                    <option value="Laravel Framework" {{ old('kursus') == 'Laravel Framework' ? 'selected' : '' }}>Laravel Framework</option>
                    <option value="PHP Native Fundamentals" {{ old('kursus') == 'PHP Native Fundamentals' ? 'selected' : '' }}>PHP Native Fundamentals</option>
                    <option value="Web Design & UI/UX" {{ old('kursus') == 'Web Design & UI/UX' ? 'selected' : '' }}>Web Design & UI/UX</option>
                </select>
                @error('kursus')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit">Kirim Pendaftaran</button>
        </form>
    </div>
</body>
</html>