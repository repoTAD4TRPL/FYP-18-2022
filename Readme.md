**CentPro**
CentPro merupakan sistem informasi yang berfungsi sebagai sentralisasi promo. Pada sistem disediakan informasi tentang promo penerbangan, promo hotel, promo layanan kesehatan, serta promo transportasi darat seperti kereta api, bus, serta rental mobil.

Langkah untuk instalasi CentPro

1. Clone project atau download dalam bentuk zip dari repository github.
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
Mengelola data promo serta data akun.
email: admin@mail.com
password: pass123

-member
Melihat dan menyimpan promo.
email: johndoe@mail.com
password: pass123
