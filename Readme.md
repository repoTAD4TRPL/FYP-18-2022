1. Clone project dari github.
2. Import database `centproDB.sql` pada phpmyadmin.
3. Copy file `env.example` dan diberi nama `.env`.
4. Pada file `.env`, isikan konfigurasi database (username, password, nama database) sesuai dengan yang telah di import.
5. Jalankan perintah `composer update`.
6. Jika terdapat error, jalankan perintah `composer install --ignore-platform-reqs`.
7. Pastikan terdapat folder vendor pada project.
8. Jalankan perintah `php artisan key:generate`.
9. Jalankan perintah `php artisan serve`.
10. Kemudian buka sistem dengan mengakses localhost:8000.


Credential

-Admin
email: admin@mail.com
password: pass123

-user
email: johndoe@mail.com
password: pass123
