# Panduan Deploy di STB (Termux)

Laravel 12 bisa berjalan di STB (Set Top Box) Android menggunakan Termux, selama STB kamu memiliki spesifikasi yang cukup (RAM minimal 2GB disarankan).

Karena keterbatasan resource di STB, sangat disarankan menggunakan **SQLite** daripada MySQL agar lebih ringan.

## Langkah-langkah

### 1. Persiapan Termux
Buka Termux di STB kamu dan jalankan perintah berikut untuk update dan install paket yang dibutuhkan:

```bash
pkg update && pkg upgrade
pkg install php composer git nano unzip sqlite
```

Pastikan versi PHP adalah 8.2 atau lebih baru:
```bash
php -v
```

### 2. Clone Project
Clone repository GitHub kamu ke penyimpanan Termux:

```bash
git clone https://github.com/FAJRIAG/Laravel12_portofolio_project.git
cd Laravel12_portofolio_project
```

### 3. Install Dependencies
Install library PHP menggunakan Composer. Ini mungkin memakan waktu agak lama di STB.

```bash
composer install --optimize-autoloader --no-dev
```
*Jika gagal karena memory limit, coba tambahkan swap atau restart Termux.*

### 4. Konfigurasi Environment (Penting: Ganti ke SQLite)
Salin file `.env.example` ke `.env`:

```bash
cp .env.example .env
```

Edit file `.env` menggunakan `nano`:
```bash
nano .env
```

**Ubah konfigurasi Database menjadi SQLite:**
Hapus atau beri komentar (`#`) pada baris `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.
Ganti/Pastikan `DB_CONNECTION` menjadi:

```ini
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# ...
```

Simpan (Ctrl+O, Enter) dan Keluar (Ctrl+X).

### 5. Buat Database SQLite & Generate Key
Buat file database kosong:

```bash
touch database/database.sqlite
```

Generate App Key:
```bash
php artisan key:generate
```

### 6. Migrasi Database
Jalankan migrasi untuk membuat tabel:

```bash
php artisan migrate --force
```

### 7. Jalankan Server
Jalankan aplikasi Laravel:

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

### 8. Akses
Sekarang kamu bisa akses webnya dari browser di:
-   **Di STB itu sendiri**: `http://localhost:8000`
-   **Dari HP/Laptop lain (satu WiFi)**: `http://<IP-STB-KAMU>:8000` (Cek IP STB dengan perintah `ifconfig`).

## Tips Tambahan untuk STB
-   **Auto-Translate**: Fitur auto-translate tetap berjalan, tapi pastikan STB terkoneksi internet.
-   **Performa**: Halaman pertama kali load mungkin agak lambat karena STB harus compile view, tapi selanjutnya akan lebih cepat.
