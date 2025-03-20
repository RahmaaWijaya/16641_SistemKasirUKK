<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# 16641_SistemKasirUKK

Tentang Sistem Kasir

16641_SistemKasirUKK adalah sistem kasir berbasis web yang dikembangkan menggunakan Laravel 11 sebagai tugas Ujian Kompetensi Keahlian (UKK) jurusan Rekayasa Perangkat Lunak (RPL). Sistem ini dirancang untuk membantu pengelolaan transaksi penjualan dengan fitur lengkap dan user-friendly.

# Fitur Utama

Manajemen ProdukTambah, edit, hapus, dan kelola data produk yang tersedia di toko.

Manajemen PelangganMenyimpan informasi pelanggan untuk kemudahan transaksi dan pemberian diskon.

Proses TransaksiMencatat transaksi penjualan, menghitung total harga, diskon, pembayaran, dan kembalian.

Riwayat PenjualanMelihat laporan transaksi yang telah terjadi berdasarkan tanggal.

Manajemen PenggunaSistem login dan manajemen hak akses untuk admin dan kasir.

Cetak StrukMencetak struk transaksi setelah pembayaran berhasil.

# Teknologi yang Digunakan

Laravel 11 - Framework utama untuk backend.

MySQL - Database untuk menyimpan data produk, pelanggan, dan transaksi.

Tailwind - Framework CSS untuk tampilan yang responsif.

JavaScript & jQuery - Interaksi dinamis pada halaman.

phpMyAdmin - Pengelolaan database MySQL.

## Instalasi

Clone Repository

Install Dependency

Buat File Konfigurasi .env

Generate Key Aplikasi

Konfigurasi Database
Edit file .env dan sesuaikan bagian berikut:

Migrasi Database

Jalankan Server

Akses aplikasi di: http://127.0.0.1:8000

Pengguna Default

Role

Email

Password

Admin

admin@example.com

password

Kasir

kasir@example.com

password
