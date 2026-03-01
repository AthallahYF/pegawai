# INFORMASI PEGAWAI (PEGAWAI)

Sistem Informasi Pegawai adalah aplikasi manajemen data pegawai berbasis web yang dibangun menggunakan **Laravel 12** dan **Bootstrap 5**.  
Aplikasi ini digunakan untuk mengelola data pegawai, jabatan, unit kerja, mencetak laporan, serta menampilkan dashboard statistik.

---

## 📌 Fitur Utama

### 👤 Manajemen Pegawai

- Tambah, edit, hapus data pegawai
- Upload foto pegawai
- Relasi dengan jabatan, agama, unit kerja
- Filter pegawai berdasarkan unit kerja
- Pencarian pegawai
- Cetak daftar pegawai

### 📊 Dashboard Statistik

- Pegawai terbaru
- Total pegawai
- Unit kerja dengan pegawai terbanyak
- Grafik pertumbuhan pegawai per bulan

### 🔐 Sistem Login

- Login & logout
- Akses dashboard setelah login

---

## 📦 Prerequisites

Pastikan lingkungan berikut sudah terinstall:

- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Node.js >= 16.x
- NPM / Yarn

---

## 🚀 Instalasi & Menjalankan Aplikasi

### 1️⃣ Clone Repository

```bash
git clone <https://github.com/AthallahYF/pegawai.git>
cd sipegawai
```

### 2️⃣ Copy file .env.example menjadi .env

Laravel memerlukan file `.env` untuk konfigurasi aplikasi.

```bash
cp .env.example .env
```

### 3️⃣ Sesuaikan Konfigurasi Database

Buka file .env lalu ubah sesuai database lokal kamu:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pegawai
DB_USERNAME=root
DB_PASSWORD=
```

⚠️ Jangan lupa buat database bernama pegawai di MySQL.

### 4️⃣ Install Dependency Backend (Laravel)

```bash
composer install
```

### 5️⃣ Generate App Key

```bash
php artisan key:generate
```

### 6️⃣ Jalankan Migrasi + Seeder

Command ini akan:

membuat seluruh tabel secara otomatis

mengisi data awal (unit kerja, jabatan, user admin)

```bash
php artisan migrate:fresh --seed
```

### 7️⃣ Buat Storage Link

Agar foto pegawai bisa tampil di website:

```bash
php artisan storage:link
```

### 8️⃣ alankan Server Laravel

```bash
php artisan serve
```

Buka aplikasi di browser:

http://127.0.0.1:8000
