<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kursus - KursusKu</title>
    <style>
        * { box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
        body { background-color: #bfe0f8; color: #1e293b; margin: 0; padding: 0; min-height: 100vh; }
        header { background-color: #0c66a6; border-bottom: 3px solid #f59e0b; padding: 16px 40px; display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 1.3rem; font-weight: 800; color: #ffffff; text-decoration: none; }
        nav a { color: #ffffff; text-decoration: none; margin-left: 20px; font-weight: 600; font-size: 0.95rem; }
        .main-container { max-width: 600px; margin: 40px auto; padding: 0 20px; }
        .card { background: #ffffff; border-radius: 12px; padding: 30px; box-shadow: 0 10px 25px rgba(0,0,0,0.08); border-top: 4px solid #f59e0b; }
        h2 { margin-top: 0; color: #0c66a6; font-size: 1.5rem; margin-bottom: 20px; }
        .form-group { margin-bottom: 16px; }
        .row { display: flex; gap: 15px; }
        .col { flex: 1; }
        label { display: block; margin-bottom: 6px; font-weight: 600; font-size: 0.9rem; color: #334155; }
        input, select, textarea { width: 100%; padding: 10px 12px; background: #f8fafc; border: 1px solid #cbd5e1; color: #1e293b; border-radius: 8px; font-size: 0.93rem; }
        input:focus, select:focus, textarea:focus { border-color: #0c66a6; outline: none; background: #ffffff; box-shadow: 0 0 0 3px rgba(12, 102, 166, 0.15); }
        .btn-submit { width: 100%; padding: 12px; background-color: #0c66a6; border: none; color: #ffffff; font-weight: 700; border-radius: 8px; cursor: pointer; margin-top: 10px; font-size: 1rem; }
        .btn-submit:hover { background-color: #094e80; }
        .btn-cancel { display: block; text-align: center; margin-top: 12px; color: #64748b; text-decoration: none; font-size: 0.9rem; }
        .error-text { color: #ef4444; font-size: 0.82rem; margin-top: 4px; display: block; }
    </style>
</head>
<body>
    <header>
        <a href="/" class="logo">KursusKu</a>
        <nav>
            <a href="/">Beranda</a>
            <a href="{{ route('courses.index') }}">Daftar Kursus</a>
        </nav>
    </header>

    <div class="main-container">
        <div class="card">
            <h2>Tambah Kursus Baru</h2>

            <form method="POST" action="{{ route('courses.store') }}">
                @csrf

                <div class="form-group">
                    <label for="code">Kode Kursus *</label>
                    <input type="text" id="code" name="code" value="{{ old('code') }}" placeholder="Contoh: WEB-101" required maxlength="20">
                    @error('code') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="name">Nama Kursus *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Web Dasar" required maxlength="120">
                    @error('name') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" rows="3" placeholder="Penjelasan singkat kursus">{{ old('description') }}</textarea>
                    @error('description') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="row">
                    <div class="col form-group">
                        <label for="fee">Biaya (Rp) *</label>
                        <input type="number" id="fee" name="fee" value="{{ old('fee', 0) }}" min="0" required>
                        @error('fee') <span class="error-text">{{ $message }}</span> @enderror
                    </div>
                    <div class="col form-group">
                        <label for="quota">Kuota *</label>
                        <input type="number" id="quota" name="quota" value="{{ old('quota', 20) }}" min="1" max="500" required>
                        @error('quota') <span class="error-text">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col form-group">
                        <label for="start_date">Tanggal Mulai *</label>
                        <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                        @error('start_date') <span class="error-text">{{ $message }}</span> @enderror
                    </div>
                    <div class="col form-group">
                        <label for="status">Status *</label>
                        <select id="status" name="status" required>
                            <option value="draft" @selected(old('status') === 'draft')>Draft</option>
                            <option value="open" @selected(old('status') === 'open')>Open</option>
                            <option value="closed" @selected(old('status') === 'closed')>Closed</option>
                        </select>
                        @error('status') <span class="error-text">{{ $message }}</span> @enderror
                    </div>
                </div>

                <button type="submit" class="btn-submit">Simpan Kursus</button>
                <a href="{{ route('courses.index') }}" class="btn-cancel">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>