@extends('layouts.frontOfficeLayout')

@section('title')
    <title>CentPro - We have the promo that you looking for!</title>
@endsection

@section('main-content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9 text-center">
                <h1>CentPro</h1>
                <h2>Kami memiliki promo yang anda cari!</h2>
            </div>
        </div>
        <br>
        <div class="text-center" id="searchField">
            <form action="{{url('/searchResult')}}" method="get" enctype="multipart/form-data">
                @csrf
                <input type="text" name="search">
                <button type="submit">Cari</button>
            </form>
        </div>

        <div class="row icon-boxes">

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon-box">
                    <div class="icon"><i class="ri-coupon-3-line"></i></div>
                    <h4 class="title">Cari berdasarkan kategori promo</h4>
                    <li class="dropdown"><a href="#"><span>Kategori Promo . . .</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{url('/searchBasedOn/flight')}}">Promo Penerbangan</a></li>
                            <li><a href="{{url('/searchBasedOn/hotel')}}">Promo Hotel</a></li>
                            <li><a href="{{url('/searchBasedOn/flight hotel')}}">Promo Penerbangan dan Hotel</a></li>
                            <li><a href="{{url('/searchBasedOn/health')}}">Promo Layanan Kesehatan</a></li>
                            <li><a href="{{url('/searchBasedOn/akomodasi')}}">Promo Transportasi Darat</a></li>
                        </ul>
                    </li>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon-box">
                    <div class="icon"><i class="ri-history-line"></i></div>
                    <h4 class="title">Cari berdasarkan durasi promo</h4>
                    <li class="dropdown"><a href="#"><span>Durasi Promo . . .</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{url('/searchBasedOn/mostRecent')}}">Promo Terbaru</a></li>
                            <li><a href="{{url('/searchBasedOn/mostRecent')}}">Promo yang akan datang</a></li>
                            <li><a href="{{url('/searchBasedOn/willEnd')}}">Promo yang akan berakhir</a></li>
                            <li><a href="{{url('/searchBasedOn/neverEnd')}}">Promo yang belum ditentukan berakhirnya</a></li>
                        </ul>
                    </li>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon-box">
                    <div class="icon"><i class="ri-hand-coin-line"></i></div>
                    <h4 class="title">Cari berdasarkan potongan harga</h4>
                    <li class="dropdown"><a href="#"><span>Potongan Promo . . .</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{url('/searchBasedOn/percentage')}}">Promo dengan potongan persentase</a></li>
                            <li><a href="{{url('/searchBasedOn/priceCut')}}">Promo dengan kisaran potongan harga</a></li>
                        </ul>
                    </li>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon-box">
                    <div class="icon"><i class="ri-open-source-line"></i></div>
                    <h4 class="title">Cari berdasarkan web penyedia promo</h4>
                    <li class="dropdown"><a href="#"><span>Web Penyedia Promo . . .</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{url('/searchBasedOn/pegipegi')}}">Pegipegi</a></li>
                            <li><a href="{{url('/searchBasedOn/tiket')}}">Tiket.com</a></li>
                            <li><a href="{{url('/searchBasedOn/traveloka')}}">Traveloka</a></li>
                            <li><a href="{{url('/searchBasedOn/airpaz')}}">Airpaz</a></li>
                            <li><a href="{{url('/searchBasedOn/nusa')}}">NusaTrip</a></li>
                            <li><a href="{{url('/searchBasedOn/garuda')}}">Garuda Indonesia</a></li>
                            <li><a href="{{url('/searchBasedOn/citi')}}">Citilink</a></li>
                        </ul>
                    </li>
                </div>
            </div>

        </div>
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Promo Penerbangan Terbaru</h2>
                <p>Lihat promo terbaru untuk penerbangan mu.</p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    @foreach($promoData as $key)

                    <div class="swiper-slide">
                        <div class="testimonial-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="member">
                                <div class="member-img">
                                    <img src="{{$key->img}}" class="img-fluid" alt="">
                                    @if(\Illuminate\Support\Facades\Session::get('role') == 2)
                                        <?php
                                        $tempSaved = \Illuminate\Support\Facades\DB::table('saved')->select('id', 'id_promo')->where('id_promo', '=', $key->id)->where('id_user', '=', \Illuminate\Support\Facades\Session::get('id'))->get()
                                        ?>
                                        @if(isset($tempSaved[0]->id_promo))
                                            <div class="social">
                                                <a href="{{url('/unsavedPromo/' . $tempSaved[0]->id)}}"><i class="bi bi-bookmark-check-fill"></i></a>
                                            </div>
                                        @else
                                            <div class="social">
                                                <a href="{{url('/savedPromo/' . $key->id)}}"><i class="bi bi-bookmark"></i></a>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                <div class="member-info">

                                    <a href="{{url('/detailPromo/' . $key->id)}}">
                                        @if($key->category == 'flight')

                                            <h4>Maskapai: {{$key->maskapai != '' ? ucfirst($key->maskapai) : 'Tidak Ditentukan'}}</h4>
                                            <h4>
                                                Potensi Potongan:
                                                @if($key->discount == '')
                                                    Tidak Tersedia
                                                @else
                                                    {{$key->discount}}
                                                @endif
                                            </h4>

                                        @elseif($key->category == 'hotel')

                                            <h4>Lokasi: {{$key->lokasi_hotel != '' ? ucfirst($key->lokasi_hotel) : 'Tidak Ditentukan'}}</h4>
                                            <h4>
                                                Potensi Potongan:
                                                @if($key->discount == '')
                                                    Tidak Tersedia
                                                @else
                                                    {{$key->discount}}
                                                @endif
                                            </h4>

                                        @elseif($key->category == 'flight hotel')

                                            <h4>Maskapai: {{$key->maskapai != '' ? ucfirst($key->maskapai) : 'Tidak Ditentukan'}}</h4>
                                            <h4>Lokasi: {{$key->location != '' ? ucfirst($key->location) : 'Tidak Ditentukan'}}</h4>
                                            <h4>
                                                Potensi Potongan:
                                                @if($key->discount == '')
                                                    Tidak Tersedia
                                                @else
                                                    {{$key->discount}}
                                                @endif
                                            </h4>

                                        @elseif($key->category == 'health')

                                            <h4>Jenis Layanan: -</h4>
                                            <h4>
                                                Potensi Potongan:
                                                @if($key->discount == '')
                                                    Tidak Tersedia
                                                @else
                                                    {{$key->discount}}
                                                @endif
                                            </h4>

                                        @elseif($key->category == 'akomodasi')
                                            <h4>Jenis Layanan: -</h4>
                                            <h4>
                                                Potensi Potongan:
                                                @if($key->discount == '')
                                                    Tidak Tersedia
                                                @else
                                                    {{$key->discount}}
                                                @endif
                                            </h4>

                                        @endif
                                        <h4>
                                            Penyedia:
                                            @if($key->id_website == 1)
                                                PegiPegi
                                            @elseif($key->id_website == 2)
                                                tiket.com
                                            @elseif($key->id_website == 3)
                                                Traveloka
                                            @elseif($key->id_website == 4)
                                                Airpaz
                                            @elseif($key->id_website == 5)
                                                NusaTrip
                                            @elseif($key->id_website == 6)
                                                Garuda Indonesia
                                            @elseif($key->id_website == 7)
                                                Citilink
                                            @endif
                                        </h4>
                                    </a>
                                    <span>Berlaku hingga: {{($key->end_date != '' ? $key->end_date : 'Periode yang belum ditentukan')}}</span>

                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->
                    @endforeach


                </div>
                <div class="swiper-pagination"></div>
                <br>
                <div class="moreContainer">
                    <div class="moreLink">
                        <a href="{{url('/searchBasedOn/flight')}}">Lihat lainnya</a>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

    @if(\Illuminate\Support\Facades\Session::get('role') == 2)
    @else

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">
            <div class="text-center">
                <h3>Mari bergabung</h3>
                <p>Mari bergabung agar kamu dapat menyimpan promo yang kamu inginkan!</p>
                <a class="cta-btn" href="{{url('/login')}}">Bergabung</a>
            </div>
        </div>
    </section><!-- End Cta Section -->
    @endif

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Potongan Harga Teratas</h2>
                <p>Temukan potongan harga menarik untuk menjaga dompetmu!</p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    @foreach($promoDiscount as $key)

                        <div class="swiper-slide">
                            <div class="testimonial-item" data-aos="fade-up" data-aos-delay="100">
                                <div class="member">
                                    <div class="member-img">
                                        <img src="{{$key->img}}" class="img-fluid" alt="">
                                        @if(\Illuminate\Support\Facades\Session::get('role') == 2)
                                            <?php
                                            $tempSaved = \Illuminate\Support\Facades\DB::table('saved')->select('id', 'id_promo')->where('id_promo', '=', $key->id)->where('id_user', '=', \Illuminate\Support\Facades\Session::get('id'))->get()
                                            ?>
                                            @if(isset($tempSaved[0]->id_promo))
                                                <div class="social">
                                                    <a href="{{url('/unsavedPromo/' . $tempSaved[0]->id)}}"><i class="bi bi-bookmark-check-fill"></i></a>
                                                </div>
                                            @else
                                                <div class="social">
                                                    <a href="{{url('/savedPromo/' . $key->id)}}"><i class="bi bi-bookmark"></i></a>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="member-info">

                                        <a href="{{url('/detailPromo/' . $key->id)}}">
                                        @if($key->category == 'flight')
                                            <h4>Jenis Promo: Penerbangan</h4>
                                            <h4>Maskapai: {{$key->maskapai != '' ? ucfirst($key->maskapai) : 'Tidak Ditentukan'}}</h4>
                                            <h4>
                                                Potensi Potongan:
                                                @if($key->discount == '')
                                                    Tidak Tersedia
                                                @else
                                                    {{$key->discount}}
                                                @endif
                                            </h4>

                                        @elseif($key->category == 'hotel')
                                            <h4>Jenis Promo: Hotel</h4>
                                            <h4>Lokasi: {{$key->lokasi_hotel != '' ? ucfirst($key->lokasi_hotel) : 'Tidak Ditentukan'}}</h4>
                                            <h4>
                                                Potensi Potongan:
                                                @if($key->discount == '')
                                                    Tidak Tersedia
                                                @else
                                                    {{$key->discount}}
                                                @endif
                                            </h4>

                                        @elseif($key->category == 'flight hotel')
                                            <h4>Jenis Promo: Penerbangan + Hotel</h4>
                                            <h4>Maskapai: {{$key->maskapai != '' ? ucfirst($key->maskapai) : 'Tidak Ditentukan'}}</h4>
                                            <h4>Lokasi: {{$key->lokasi_hotel != '' ? ucfirst($key->lokasi_hotel) : 'Tidak Ditentukan'}}</h4>
                                            <h4>
                                                Potensi Potongan:
                                                @if($key->discount == '')
                                                    Tidak Tersedia
                                                @else
                                                    {{$key->discount}}
                                                @endif
                                            </h4>

                                        @elseif($key->category == 'health')
                                            <h4>Jenis Promo: Layanan Kesehatan</h4>
                                            <h4>
                                                Potensi Potongan:
                                                @if($key->discount == '')
                                                    Tidak Tersedia
                                                @else
                                                    {{$key->discount}}
                                                @endif
                                            </h4>

                                        @elseif($key->category == 'akomodasi')
                                            <h4>Jenis Promo: Transportasi</h4>
                                            <h4>Jenis Layanan: -</h4>
                                            <h4>
                                                Potensi Potongan:
                                                @if($key->discount == '')
                                                    Tidak Tersedia
                                                @else
                                                    {{$key->discount}}
                                                @endif
                                            </h4>

                                        @else

                                            <h4>
                                                Potensi Potongan:
                                                @if($key->discount == '')
                                                    Tidak Tersedia
                                                @else
                                                    {{$key->discount}}
                                                @endif
                                            </h4>

                                        @endif
                                        <h4>
                                            Penyedia:
                                            @if($key->id_website == 1)
                                                PegiPegi
                                            @elseif($key->id_website == 2)
                                                tiket.com
                                            @elseif($key->id_website == 3)
                                                Traveloka
                                            @elseif($key->id_website == 4)
                                                Airpaz
                                            @elseif($key->id_website == 5)
                                                NusaTrip
                                            @elseif($key->id_website == 6)
                                                Garuda Indonesia
                                            @elseif($key->id_website == 7)
                                                Citilink
                                            @endif
                                        </h4>
                                        </a>
                                        <span>Berlaku hingga: {{($key->end_date != '' ? $key->end_date : 'Periode yang belum ditentukan')}}</span>

                                    </div>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>

                <br>
                <div class="moreContainer">
                    <div class="moreLink">
                        <a href="{{url('/searchBasedOn/discount')}}">Lihat lainnya</a>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Promo Transportasi Darat</h2>
                <p>Temukan promo untuk perjalanan liburanmu!</p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    @foreach($transportPromo as $key)

                        <div class="swiper-slide">
                            <div class="testimonial-item" data-aos="fade-up" data-aos-delay="100">
                                <div class="member">
                                    <div class="member-img">
                                        <img src="{{$key->img}}" class="img-fluid" alt="">
                                        @if(\Illuminate\Support\Facades\Session::get('role') == 2)
                                            <?php
                                            $tempSaved = \Illuminate\Support\Facades\DB::table('saved')->select('id', 'id_promo')->where('id_promo', '=', $key->id)->where('id_user', '=', \Illuminate\Support\Facades\Session::get('id'))->get()
                                            ?>
                                            @if(isset($tempSaved[0]->id_promo))
                                                <div class="social">
                                                    <a href="{{url('/unsavedPromo/' . $tempSaved[0]->id)}}"><i class="bi bi-bookmark-check-fill"></i></a>
                                                </div>
                                            @else
                                                <div class="social">
                                                    <a href="{{url('/savedPromo/' . $key->id)}}"><i class="bi bi-bookmark"></i></a>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="member-info">
                                        <a href="{{url('/detailPromo/' . $key->id)}}">
                                            <h4>
                                                Jenis Layanan:
                                                @if($key->maskapai == 'car')
                                                    Mobil
                                                @elseif($key->maskapai == 'train')
                                                    Kereta Api
                                                @elseif($key->maskapai == 'jemput')
                                                    Transportasi Bandara
                                                @endif
                                            </h4>
                                            <h4>
                                                Potensi Potongan:
                                                @if($key->discount == '')
                                                    Tidak Tersedia
                                                @else
                                                    {{$key->discount}}
                                                @endif
                                            </h4>
                                            <h4>
                                                Penyedia:
                                                @if($key->id_website == 1)
                                                    PegiPegi
                                                @elseif($key->id_website == 2)
                                                    tiket.com
                                                @elseif($key->id_website == 3)
                                                    Traveloka
                                                @elseif($key->id_website == 4)
                                                    Airpaz
                                                @elseif($key->id_website == 5)
                                                    NusaTrip
                                                @elseif($key->id_website == 6)
                                                    Garuda Indonesia
                                                @elseif($key->id_website == 7)
                                                    Citilink
                                                @endif
                                            </h4>
                                        </a>
                                        <span>Berlaku hingga: {{($key->end_date != '' ? $key->end_date : 'Periode yang belum ditentukan')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>

                <br>
                <div class="moreContainer">
                    <div class="moreLink">
                        <a href="{{url('/searchBasedOn/akomodasi')}}">Lihat lainnya</a>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

</main><!-- End #main -->
@endsection


