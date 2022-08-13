1. Clone project dari github.
2. Import database `centproDB.sql` pada phpmyadmin.
3. Copy file `env.example` dan diberi nama `.env`.
4. Pada file `.env`, isikan konfigurasi database sesuai dengan yang telah di import.
5. Jalankan perintah `composer update`.
6. Jika terdapat error, jalankan perintah `composer install --ignore-platform-reqs`.
7. Pastikan terdapat folder vendor pada project.
8. Jalankan perintah `php artisan serve`.
9. Kemudian buka sistem dengan mengakses localhost:8000.
