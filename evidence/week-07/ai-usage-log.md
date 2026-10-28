# AI Usage Log - Pertemuan 7 (Milestone Week-07)

Dokumentasi konsultasi dan kolaborasi dengan AI Assistant selama penyelesaian tugas praktikum Pemrograman Web III (Laravel).

| Waktu | Masalah / Tujuan | Prompt Singkat | Apa yang Diterima / Ditolak |
| :--- | :--- | :--- | :--- |
| **19:15 WIB** | Refactoring struktur Route & Controller khusus Pertemuan 7 | "Isi routes/web.php dan HomeController.php murni Week 7 tanpa route pendaftaran" | **Diterima:** Pemisahan route `home` ke `HomeController@index` dan penyediaan array `$featured` untuk ditampilkan di Blade.<br>**Ditolak:** Menyampur route pendaftaran dan Ajax (Week 9) sebelum waktunya. |
| **19:40 WIB** | Implementasi styling kustom UI halaman utama | "Buatkan style.css tema GitHub Dark Mode dengan elemen card dan navbar yang responsif" | **Diterima:** Penggunaan variabel CSS warna gelap GitHub (`#0d1117`, `#161b22`), layout grid untuk kartu kursus, dan `@media` query mobile.<br>**Ditolak:** Menggunakan framework eksternal seperti Bootstrap atau Tailwind. |
| **20:10 WIB** | Penyiapan dan verifikasi berkas screenshot evidence | "Apa saja 5 screenshot utama yang wajib di-generate untuk pengumpulan Week 7 di GitHub?" | **Diterima:** Urutan 5 file screenshot (`01-tools.png`, `02-laravel-home.png`, `03-route-list.png`, `04-mobile-view.png`, `05-git-log.png`).<br>**Ditolak:** Menambah script generator HTML eksternal yang tidak diperlukan. |
| **20:35 WIB** | Troubleshooting terminal Cmder dan verifikasi Git Log | "Cara membersihkan terminal Cmder agar tampilan screenshot route:list dan git log rapi" | **Diterima:** Perintah `cls` sebelum mengeksekusi `php artisan route:list` dan `git log --oneline -5`.<br>**Ditolak:** Melakukan reset atau rebase commit history yang sudah ada. |