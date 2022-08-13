<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname'=>'Admin 1',
            'email'=>'admin@mail.com',
            'password'=>'pass123',
            'gender'=>'',
            'age'=>'',
            'status'=>'1',
            'role'=>'1',
        ]);

        DB::table('promo')->insert([
            'id_website'=> 1,
            'name'=>'Nikmati diskon untuk semua produk mulai dari Rp77Rb untuk bisa liburan yang lebih hemat!',
            'img'=> 'https://www.pegipegi.com/promo/pegipegitime_double/flat/img/APP_1200x660.jpg',
            'end_date'=> '2022-07-12',
            'description'=> 'Ini dia promo yang bisa bikin liburanmu lebih hemat! Pegipegi Time 7.7 kasih kamu diskon untuk semua produk mulai dari Rp77Rb. Syarat & ketentuan berlaku.',
            'link'=> 'https://www.pegipegi.com/promo/pegipegitime_double/',
            'category'=> '',
            'discount' => '',
        ]);

        DB::table('promo')->insert([
            'id_website'=> 1,
            'name'=>'Dapatkan diskon hingga setengah harga sampai seminggu ke depan untuk menginap di berbagai hotel pilihan dari OYO.',
            'img'=> 'https://www.pegipegi.com/promo/oyo_deals/flat/img/E_00284_APP_1200x660.jpg',
            'end_date'=> '2022-07-14',
            'description'=> 'Untuk kamu yang ingin menginap tapi masih mau hemat, berarti kamu harus cek ini! Karena selama seminggu kamu bisa dapetin diskon hingga setengah harga untuk berbagai hotel pilihan dari OYO. Syarat & ketentuan berlaku.Pegipegi Lagi, Yuk!',
            'link'=> 'https://www.pegipegi.com/promo/oyo_deals/',
            'category'=> 'hotel',
            'discount' => '55%',
        ]);

        DB::table('promo')->insert([
            'id_website'=> 2,
            'name'=>'',
            'img'=> 'https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfill19296gsm/promo/2022/07/01/19784194-92e7-4fba-b48d-3115c9daaad6-1656646833841-9f015426312ca20a3178531447a8c909.png',
            'end_date'=> '2022-07-14',
            'description'=> '',
            'link'=> 'https://www.tiket.com/promo/pesawat/holideals-pesawat-internasional',
            'category'=> 'flight',
            'discount' => '200.000',
        ]);

        DB::table('promo')->insert([
            'id_website'=> 2,
            'name'=>'',
            'img'=> 'https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfill19296gsm/promo/2022/05/24/26361581-605d-4dbb-9c7e-135296dd41c6-1653381375783-ef703c138c5c35285b617f889b9dda84.png',
            'end_date'=> '2022-07-14',
            'description'=> '',
            'link'=> 'https://www.tiket.com/promo/sewa-mobil/sewa-mobil-antar-kota',
            'category'=> 'akomodasi',
            'discount' => '250.000',
        ]);

        DB::table('promo')->insert([
            'id_website'=> 4,
            'name'=>'        Keuntungan OCBC NISP PayDay',
            'img'=> 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRSCJcmW8o--f8RjjBGP964tWN6NY9RBw4ww&usqp=CAU',
            'end_date'=> '2022-07-14',
            'description'=> '
            PAYDAYFL
          ',
            'link'=> 'https://www.airpaz.com/id/promo/view/ocbc-flight-payday',
            'category'=> 'flight',
            'discount' => '25%',
        ]);
    }
}
