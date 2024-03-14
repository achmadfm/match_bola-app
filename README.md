<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tentang Match APP

Aplikasi ini adalah Aplikasi penginputan Data Klasmen Sepak Bola yang diadakan oleh Perusahaan APTAVIS untuk test Web Developer menggunakan Laravel 9 + Jquery + MySQL (PHP 8)

## Cara Instalasi

1. Copy file .env.example
2. Ubah Konfigurasi Database menjadi seperti dibawah ini :
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=match_bola
   DB_USERNAME=root
   DB_PASSWORD=
3. Buat Database dengan nama match_bola
4. lakukan migrasi melalui php artisan migrate

## Menu

Menu-menu yang tersedia :

1.  Dashboard -> menampilkan Data Klasmen setiap Club
2.  Klub -> Menampilkan Data Klub, serta melakukan input data Klub (hanya memiliki fitur delete)
3.  Score -> Menampilkan Data Klub-klub yang bertanding serta score dari setiap klub, melalui Single Insert Data
4.  Multiple Score -> Menampilkan Data Klub-klub yang bertanding serta score dari setiap klub, melalui Multiple Insert Data

## License

Open Source, silahkan yang ingin mendownload sebagai referensi kedepannya
