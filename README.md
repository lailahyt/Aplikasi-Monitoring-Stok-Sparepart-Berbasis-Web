# Aplikasi Monitoring Stok Sparepart Berbasis Web

Aplikasi web untuk memantau stok sparepart mesin ATM, mencatat pengiriman dan pemakaian sparepart, serta merekap seluruh data dalam satu tempat. Dibuat selama magang sebagai Web Developer, menggantikan pencatatan stok yang sebelumnya dilakukan manual.

## Fitur

**Admin**
- Rekap seluruh data sparepart dari semua lokasi
- Kelola master ATM dan master sparepart
- Kelola stok sparepart per lokasi (tambah, ubah, hapus)
- Catat dan pantau pengiriman sparepart
- Catat pemakaian sparepart (nomor tiket, mesin, teknisi, nomor seri part baik dan rusak, detail kerusakan)
- Kelola data pengguna

**Teknisi dan workshop**
- Login dengan akun masing-masing, lalu masuk ke halaman sesuai lokasi
- Melihat stok sparepart di lokasinya
- Mencatat pengiriman dan pemakaian sparepart

**Umum**
- Pencarian dan penyaringan data di tabel (DataTables)
- Isian otomatis lokasi dan nama sparepart saat memilih ID ATM atau part number
- Halaman dibatasi berdasarkan sesi login

## Teknologi

- PHP Native (tanpa framework)
- MySQL, diakses dengan `mysqli`
- Bootstrap 4 dan DataTables
- HTML, CSS, JavaScript

## Cara menjalankan di komputer sendiri

Yang dibutuhkan: PHP, MySQL, dan web server lokal seperti XAMPP atau Laragon.

1. Salin folder project ini ke folder web server (misalnya `htdocs` di XAMPP atau `www` di Laragon).
2. Buat database baru bernama `sparepart` di MySQL (lewat phpMyAdmin atau terminal).
3. Impor file `sparepart.sql` ke database tersebut.
4. Cek pengaturan koneksi di `Connections/koneksi.php`. Bawaannya `localhost`, user `root`, tanpa password, database `sparepart`. Sesuaikan kalau berbeda.
5. Jalankan Apache dan MySQL, lalu buka `http://localhost/<nama-folder>/` di browser.

## Struktur folder

```
index.php            Halaman login
admin/               Halaman admin (rekap, master, stok, pengiriman, pemakaian, user)
teknisi/             Halaman teknisi dan workshop
crud_all/            Proses tambah, ubah, dan hapus data
function_all/        Fungsi pendukung (login, query, pengambilan data)
Connections/         Pengaturan koneksi database
css/                 Gaya tambahan
sparepart.sql        Struktur dan data database
```

## Rencana perbaikan

- Menyimpan password dengan `password_hash` dan `password_verify`
- Memakai prepared statement untuk semua query
- Memeriksa hak akses di setiap halaman dan proses hapus
- Memindahkan pengaturan database ke file konfigurasi yang tidak ikut di-commit

## Penulis

Laila Hayati — [GitHub](https://github.com/lailahyt)
