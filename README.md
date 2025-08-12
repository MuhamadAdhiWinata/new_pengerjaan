<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

1. Overview


    *RestfulApi Generator By Adhinath adalah CRUD generator berbasis Laravel yang otomatis:*
-   Membuat Controller (Create, Read, Update, Delete) lengkap.
-   Membuat Routes API.
-   Membuat Migration + Model.
-   Membuat Form Validation otomatis dari struktur tabel database (via ValidationHelper).
-   Mendukung validasi otomatis sesuai tipe data.

2. Instalasi

-   Clone RestfulApi Generator By Adhinath.
-   Jalankan Perintah Berikut : 
```bash
    composer install
    php artisan storage:link
    php artisan install:api
```

3. Cara Penggunaan
   Tentukan nama Entitas yang ingin anda buat. disini kita gunakan "Barang".

    NOTE: Perintah bisa berubah karena masih dalam tahap pengembangan. untuk selalu update pastikan mengecek list nathgen.
-   Jalankan Perintah Berikut:
```bash
    php artisan list | grep nathgen

    php artisan make:rest Barang
```
-   Maka Akan Muncul Response Berikut :
    <img width="1395" height="389" alt="image" src="https://github.com/user-attachments/assets/847aaca3-00fc-4454-a927-0c08542ce3de" />
    Selamat RestfullApi Pertama Anda hampir selesai dibuat! Lanjutkan agar selesai.
    
-   Selanjutnya buatlah field dari migrations yg sudah kita generate :
    <img width="554" height="28" alt="image" src="https://github.com/user-attachments/assets/f6ad2e83-e08c-42be-95d3-5ff6913ab0ac" />
    <img width="610" height="228" alt="image" src="https://github.com/user-attachments/assets/9b850791-56cf-403c-8bca-5abe10653bc8" />
    disini kita tambahkan nama dan harga sebagai contoh.
```bash
    $table->id();
    $table->string('name');
    $table->integer('harga');
    $table->timestamps();
```
-   Lalu Jalankan Migrations :
```bash
    php artisan migrate
```
  <img width="1350" height="161" alt="image" src="https://github.com/user-attachments/assets/37c3a881-9724-48a6-9b66-95dac5d19b4f" />

-   Terakhir kita buat modelnya, kalau buat model aja masih nggak bisa mending pulang sana wkwk. Bercanda :) nih contohnya :
```bash
    <?php

    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class Barang extends Model
    {
        use HasFactory;
    
        protected $fillable = [
            'name',
            'harga',
        ];
    }

```

4. Hasil

-  Running menggunakan artisan
```bash
    php artisan serve
```
-  Testing API menggunakan tools kecintaan anda. disini saya pakai laravel scrambler dan berikut hasilnya :
    <img width="360" height="436" alt="image" src="https://github.com/user-attachments/assets/ce48314e-c6fb-4051-b160-8fc6d9bc36f8" />

SELAMAT RestfullApi dengan CRUD generator pertama anda sudah dibuat!🥳. 

📌 Requirements
Sebelum menggunakan Adhinath Generator, WAJIB paham hal-hal berikut:
- Laravel
- Struktur folder (app, routes, database, dll)
- Cara kerja artisan command
- Konsep Model, Migration, Controller, dan Resource
- Konsep RESTful API
- HTTP Method (GET, POST, PUT, DELETE)
- Konvensi endpoint RESTful (/api/users, /api/users/{id})
- Response format JSON (success, message, data)
- Database & Eloquent ORM
- fillable
- Query dasar dengan Eloquent
- Basic Request Validation
- Aturan validasi Laravel (required, numeric, date, dll)
## License

The software licensed under the [MIT license](https://opensource.org/licenses/MIT).
