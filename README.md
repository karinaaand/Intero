<h2 align="center">Integrasi Portal Akademik dengan Google Classroom</h2>

Platform ini merupakan sistem terintegrasi yang menggabungkan layanan Google Classroom dengan Sistem Portal Akademik Perguruan Tinggi. Tujuannya adalah untuk meningkatkan efisiensi dan efektivitas proses belajar mengajar daring, serta memungkinkan institusi pendidikan memantau aktivitas pembelajaran di Google Classroom secara langsung melalui Portal Akademik.

## 📌 Fitur Utama

-   **Integrasi Google Classroom**: Menyatukan layanan Google Classroom dengan Sistem Portal Akademik internal.
-   **Tampilan Daftar Kelas**: Menampilkan daftar kelas dari Google Classroom secara langsung di antarmuka Sistem Portal Akademik.
-   **Pengelolaan Konten Pembelajaran**: Mendukung pengelolaan pengumuman dan tugas langsung dari Portal Akademik.
-   **Sinkronisasi Data Otomatis**: Mengurangi redundansi data melalui sinkronisasi otomatis antara kedua sistem.
-   **Akses Terpusat**: Memungkinkan guru dan siswa mengakses seluruh informasi pembelajaran melalui satu platform terintegrasi.
-   **Pemantauan Aktivitas Belajar**: Mempermudah guru dalam memantau proses belajar dan membantu sekolah memantau aktivitas pembelajaran daring.
-   **Autentikasi Aman**: Menggunakan protokol OAuth 2.0 dari Google untuk autentikasi pengguna dan penarikan data kelas yang aman.

## 📦 Teknologi yang Digunakan
<p align="center">
  <img src="https://img.shields.io/badge/JSON-000000?style=for-the-badge&logo=json&logoColor=white" alt="JSON Badge">
  <img src="https://img.shields.io/badge/npm-CB3837?style=for-the-badge&logo=npm&logoColor=white" alt="NPM Badge">
  <img src="https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white" alt="Composer Badge">
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript Badge">
  <img src="https://img.shields.io/badge/XML-000000?style=for-the-badge&logo=xml&logoColor=white" alt="XML Badge">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP Badge">
  <img src="https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite Badge">
  <img src="https://img.shields.io/badge/Axios-5A29E4?style=for-the-badge&logo=axios&logoColor=white" alt="Axios Badge">
</p>


## Penggunaan

### Mendaftar dan Login
1.  Buka halaman login sistem Portal Akademik.
2.  Lakukan login dengan akun Anda.
3.  Sistem akan menampilkan halaman Dashboard E-Learning Portal Akademik setelah autentikasi berhasil.

### Mengelola Kelas
1.  Setelah login, Anda dapat melihat daftar kelas dari Google Classroom yang ditampilkan secara otomatis di Dashboard E-Learning.
2.  Anda dapat membuat kelas baru, melihat daftar tugas, dan menambahkan tugas ke dalam kelas.
3.  Anda juga dapat mengundang siswa ke kelas dan memantau tugas yang diserahkan.

## Rencana Pengembangan Mendatang

-   Integrasi dengan layanan notifikasi To Do
-   Fitur unggah gambar pendukung untuk kebutuhan
-   Dashboard admin untuk manajemen kebutuhan
-   Sistem pelacakan progres penyelesaian kebutuhan yang lebih detail




## ⚙️ Instalasi

1.  **Clone Repository**

    ```bash
    [https://github.com/karinaaand/Intero.git](https://github.com/karinaaand/Intero.git)
    cd Intero
    ```

2.  **Instalasi Dependency**

    ```bash
    npm install
    ```

    ```bash
    composer install
    ```

3.  **Salin File `.env` dan Konfigurasi**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Konfigurasi Database dan Google API**
    Atur file `.env` Anda seperti berikut:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    GOOGLE_CLIENT_ID=554051466577-eab3aqphgrqhup31o5rkmbnfdnitlo6c.apps.googleusercontent.com
    GOOGLE_CLIENT_SECRET=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
    GOOGLE_REDIRECT_URI=http://localhost:8000/api/google/callback
    VITE_APP_NAME="${APP_NAME}"
    VITE_API_BASE_URL=[http://127.0.0.1:8000/api](http://127.0.0.1:8000/api)
    ```

5.  **Migrasi Database**

    ```bash
    php artisan migrate:fresh
    ```

6.  **Jalankan FE**

    ```bash
    php artisan serve --host=localhost --port=8001
    ```bash
    npm run dev
    ```
7.  **Jalankan Server BE (pindah ke bagian cd intero_be)**

    ```bash
    php artisan serve
    ```

## 🤵 Sampel akun (untuk testing)

### Akun pemilik proyek / Sample Teacher

- **email** : [`theprocrastinatorman@gmail.com`](theprocrastinatorman@gmail.com)
- **password google account** :   `andromeda445`
- **default password lms**   :   `lavachicken`


### Akun Sample Student

- **email** : [`ibnumknd@gmail.com`](ibnumknd@gmail.com)
- **password google account** :   `exagon.enter`
- **default password lms**   :   `lavachicken`

### Keterangan Password

- **password lms** adalah password untuk akun LMS yang dibuat ketika register, bisa disesuaikan ketika melakukan regiter melalui LMS dan berlaku untuk login melalui LMS.

- **password google account** adalah password akun google, yaitu akun yang terdaftar di dengan google bukan LMS.    

- **Untuk lebih detailnya bisa melihat di README.md https://github.com/WahyuAgg/intero_be**

## Kontak

Teknologi Rekaysa Perankat Lunak, Departemen Teknik Elekro dan Informatika, Universitas Gadjah Mada.
