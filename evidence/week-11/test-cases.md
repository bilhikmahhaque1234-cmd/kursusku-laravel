# Test Cases Pertemuan 11 — Course CRUD II

Dokumentasi pengujian manual dan automated test fitur CRUD Course lanjutan (Show, Form Request, Edit, Update, dan Delete) pada aplikasi **KursusKu** sesuai spesifikasi tugas Pertemuan 11.

---

## 1. Matriks Pengujian Fitur Course

| No | Skenario Pengujian | Target Endpoint/Method | Payload / Input Data | Hasil yang Diharapkan | Hasil Pengujian | Status |
| :---: | :--- | :--- | :--- | :--- | :--- | :---: |
| **1** | Akses halaman detail Course | `GET /courses/{id}` | Pilih Course valid di database (misal: ID 1) | Status HTTP 200; Tampil halaman detail lengkap dengan kode, nama, deskripsi, fee, kuota, tanggal, dan status. | Tampil halaman detail lengkap dengan data sesuai database. | **PASS** |
| **2** | Akses ID Course tidak ada (404) | `GET /courses/999999` | ID 999999 (tidak ada di DB) | Status HTTP 404 Not Found; Laravel melempar `ModelNotFoundException`. | Diarahkan ke halaman error 404 bawaan Laravel. | **PASS** |
| **3** | Duplicate code saat create | `POST /courses` | Payload dengan `code` yang sudah dipakai Course lain | Status HTTP 422 Unprocessable Content; Ditolak validasi `unique`; Pesan error di bawah field `code`. | Berhasil menolak; Muncul pesan error di dekat field `code`. | **PASS** |
| **4** | Nama kosong | `POST /courses` | Payload dengan `name` kosong | Status HTTP 422; Ditolak validasi `required`; Pesan error di dekat field `name`. | Error `The name field is required` muncul di bawah field `name`. | **PASS** |
| **5** | Nama terlalu pendek | `POST /courses` | Payload dengan `name` = "AI" (2 karakter) | Status HTTP 422; Ditolak validasi `min:3`; Pesan error muncul di bawah field `name`. | Error `The name field must be at least 3 characters` muncul. | **PASS** |
| **6** | Boundary quota 0 (Di bawah batas) | `POST /courses` | Payload dengan `quota` = 0 | Status HTTP 422; Ditolak validasi `between:1,500`; Error di field `quota`. | Ditolak server; Error kuota minimal 1 peserta tampil. | **PASS** |
| **7** | Boundary quota 501 (Di atas batas) | `POST /courses` | Payload dengan `quota` = 501 | Status HTTP 422; Ditolak validasi `between:1,500`; Error di field `quota`. | Ditolak server; Error kuota maksimal 500 peserta tampil. | **PASS** |
| **8** | Boundary quota 1 (Minimum valid) | `POST /courses` | Payload valid dengan `quota` = 1 | Status HTTP 302 Redirect ke index; Data tersimpan di database. | Berhasil disimpan; Kuota 1 orang tersimpan di database. | **PASS** |
| **9** | Boundary quota 500 (Maksimum valid) | `POST /courses` | Payload valid dengan `quota` = 500 | Status HTTP 302 Redirect ke index; Data tersimpan di database. | Berhasil disimpan; Kuota 500 orang tersimpan di database. | **PASS** |
| **10** | Tanggal invalid | `POST /courses` | Payload dengan `start_date` = "bukan-tanggal" | Status HTTP 422; Ditolak rule `date`; Error di dekat field `start_date`. | Ditolak server; Error format tanggal tidak valid tampil. | **PASS** |
| **11** | Status invalid | `POST /courses` | Payload dengan `status` = "active" | Status HTTP 422; Ditolak rule `in:draft,open,closed`; Error di field `status`. | Ditolak server; Hanya menerima status draft, open, atau closed. | **PASS** |
| **12** | Update dengan code sendiri | `PUT /courses/{id}` | Edit Course tanpa mengubah `code` miliknya | Status HTTP 302; Berhasil di-update; Rule `unique` mengabaikan record sendiri. | Berhasil di-update tanpa memicu error duplicate code. | **PASS** |
| **13** | Update ke code Course lain | `PUT /courses/{id}` | Ubah `code` menjadi `code` milik Course lain | Status HTTP 422; Ditolak validasi `unique` ignore rule. | Ditolak server; Menampilkan error kode sudah digunakan. | **PASS** |
| **14** | Update normal | `PUT /courses/{id}` | Ubah nama, fee, quota, atau status dengan nilai valid | Status HTTP 302 Redirect ke detail; Flash message sukses muncul. | Berhasil update; Detail menampilkan data baru & flash message. | **PASS** |
| **15** | Delete Course dummy | `DELETE /courses/{id}` | Submit form DELETE dengan CSRF + confirm | Status HTTP 302 Redirect ke index; Data terhapus dari DB; Flash message tampil. | Data terhapus dari tabel index & muncul flash message sukses. | **PASS** |

---

## 2. Rekap Hasil Automated Test

Perintah eksekusi:
```bash
php artisan test