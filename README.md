# Simple Library API

Proyek sederhana untuk membuat RESTful API CRUD (Create, Read, Update, Delete) untuk manajemen data buku menggunakan Laravel dan MySQL.

## Prasyarat

* PHP (versi 8.2 atau lebih baru)
* Composer
* MySQL Server
* Postman/Insomnia (untuk pengujian API)

---

## 🛠️ Setup Project

1.  **Clone Repositori:**
    ```bash
    git clone [LINK_REPOSITORY_ANDA] SimpleLibrary
    cd SimpleLibrary
    ```

2.  **Instal Dependensi:**
    ```bash
    composer install
    ```

3.  **Konfigurasi Environment:**
    Salin file `.env.example` menjadi `.env` dan buat kunci aplikasi.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Konfigurasi Database (MySQL):**
    Buka file `.env` dan sesuaikan pengaturan koneksi Anda:
    
    ***PENTING: Pastikan Anda telah membuat database kosong (misalnya `simple_library`) di server MySQL Anda.***
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=simple_library # Ganti dengan nama database Anda
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5.  **Siapkan Skema dan Data Awal:**
    Pilih salah satu dari dua opsi berikut untuk menyiapkan database:

    ### Opsi A: Menggunakan Migrasi dan Seeder (Direkomendasikan Laravel)
    Perintah ini akan membuat tabel `books` dan mengisi minimal 5 data buku yang sudah disiapkan di *seeder* (`DatabaseSeeder.php`).
    ```bash
    php artisan migrate --seed
    ```
    
    ### Opsi B: Import Database yang Sudah Siap (Opsional)
    Jika Anda membutuhkan database yang sudah siap, *dump file* database (`simple_library.sql`) telah disediakan di folder `database/`. Anda dapat mengimpornya langsung menggunakan tools seperti phpMyAdmin, Sequel Pro, atau command line:
    ```bash
    # (Contoh jika menggunakan command line, ganti sesuai nama file dan database Anda)
    mysql -u [DB_USERNAME] -p [DB_DATABASE] < database/simple_library.sql
    ```

---

## ▶️ Cara Menjalankan Project

1.  **Jalankan Server Laravel:**
    ```bash
    php artisan serve
    ```
2.  Server API akan berjalan di **`http://127.0.0.1:8000`**.

---

## 📌 Pengujian API Endpoint

Gunakan Postman atau *tool* lain untuk menguji API di URL dasar **`http://127.0.0.1:8000/api`**.

| Metode | Endpoint | Keterangan | Contoh Body (POST/PUT) |
| :--- | :--- | :--- | :--- |
| `GET` | `/api/books` | List semua buku. | N/A |
| `POST` | `/api/books` | Tambah buku. | `{"title": "Judul Baru", "author": "Penulis", "year": 2024}` |
| `GET` | `/api/books/1` | Detail buku dengan ID 1. | N/A |
| `PUT` | `/api/books/1` | Update data buku ID 1. | `{"title": "Judul Diubah", "author": "Penulis Baru"}` |
| `DELETE` | `/api/books/1` | Hapus buku ID 1. | N/A |

---
