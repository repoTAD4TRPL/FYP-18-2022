@extends('layouts.frontOfficeLayout')

@section('title')
{{$dataPromo->name}}
@endsection

@section('main-content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Detail Promo</h2>
                    <ol>
                        <li><a href="{{url('/')}}">Beranda</a></li>
                        <li>Detail Promo</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">

                                <div class="swiper-slide">
                                    <img src="{{$dataPromo->img}}" alt="">
                                </div>

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Informasi Promo</h3>
                            <ul>
                                <li><strong>Judul</strong>: {{$dataPromo->name}}</li>
                                <li><strong>Potensi Potongan</strong>:
                                    @if($dataPromo->discount == '')
                                        Tidak Tersedia
                                    @else
                                        {{$dataPromo->discount}}
                                    @endif
                                </li>
                                @if($dataPromo->category == 'flight')

                                    <li><strong>Maskapai</strong>: {{$dataPromo->maskapai != '' ? ucfirst($dataPromo->maskapai) : 'Tidak Ditentukan'}}

                                @elseif($dataPromo->category == 'hotel')

                                    <li><strong>Lokasi</strong>: {{$dataPromo->lokasi_hotel != '' ? ucfirst($dataPromo->lokasi_hotel) : 'Tidak Ditentukan'}}

                                @elseif($dataPromo->category == 'flight hotel')

                                    <li><strong>Maskapai</strong>: {{$dataPromo->maskapai != '' ? ucfirst($dataPromo->maskapai) : 'Tidak Ditentukan'}}
                                    <li><strong>Lokasi</strong>: {{$dataPromo->location != '' ? ucfirst($dataPromo->location) : 'Tidak Ditentukan'}}
                                @endif
                                <li>
                                    <strong>Penyedia</strong>:
                                    @if($dataPromo->id_website == 1)
                                        PegiPegi
                                    @elseif($dataPromo->id_website == 2)
                                        tiket.com
                                    @elseif($dataPromo->id_website == 3)
                                        Traveloka
                                    @elseif($dataPromo->id_website == 4)
                                        Airpaz
                                    @elseif($dataPromo->id_website == 5)
                                        NusaTrip
                                    @elseif($dataPromo->id_website == 6)
                                        Garuda Indonesia
                                    @elseif($dataPromo->id_website == 7)
                                        Citilink
                                    @endif
                                </li>
                                <li><strong>Berlaku hingga</strong>: {{($dataPromo->end_date != '' ? $dataPromo->end_date : 'Waktu yang belum ditentukan')}}</li>
                                <li>
                                    <a class="goToPage" href="{{$dataPromo->link}}" target="_blank">Klik disini untuk melihat cara pemakaian</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <p>
                                {{$dataPromo->description}}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->
@endsection
