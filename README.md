# Panduan Instalasi Proyek Laravel

Ikuti langkah-langkah di bawah ini untuk mengatur dan menjalankan proyek Laravel:

## Prasyarat

Pastikan hal-hal berikut sudah terinstal di sistem Anda:

-   PHP >= 8.0
-   Composer
-   Node.js & npm
-   Basis data (misalnya, MySQL)

## Langkah Instalasi

1. **Kloning Repository**

    ```bash
    git clone <repository-url>
    cd <repository-folder>
    ```

2. **Instal Dependensi PHP**

    ```bash
    composer install
    ```

3. **Instal Dependensi JavaScript**

    ```bash
    npm install
    ```

4. **Konfigurasi File Lingkungan (.env)**

    - Salin file `.env.example` menjadi `.env`:
        ```bash
        cp .env.example .env
        ```
    - Perbarui file `.env` dengan kredensial basis data Anda dan konfigurasi lain yang diperlukan.

5. **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

6. **Jalankan Migrasi dan Seeder Basis Data**

    ```bash
    php artisan migrate --seed
    ```

7. **Mulai Server Pengembangan**

    ```bash
    php artisan serve
    ```

8. **Akses Aplikasi**
   Buka browser Anda dan navigasikan ke `http://localhost:8000`.

## Akun Admin

Gunakan kredensial berikut untuk masuk sebagai admin:

-   **Email:** test@example.com
-   **Password:** password

---

Jika Anda mengalami masalah, silakan merujuk ke dokumentasi Laravel atau hubungi pemelihara proyek.
