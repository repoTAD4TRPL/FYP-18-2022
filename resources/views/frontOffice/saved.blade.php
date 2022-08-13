@extends('layouts.frontOfficeLayout')

@section('title')
    <title>Promo yang disimpan</title>
@endsection

@section('main-content')
    @if(\Illuminate\Support\Facades\Session::get('role') == '')
        <script>
            window.location.href="/login";
        </script>
    @endif
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Promo yang disimpan</h2>
                    <ol>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Promo yang disimpan</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">

                <!-- ======= Team Section ======= -->
                <section id="team" class="detailPromo">
                    <div class="container" data-aos="fade-up">

                        <div class="row">

                            @foreach($promoData as $key)

                                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                                    <div class="member">
                                        <div class="member-img">
                                            <img src="{{$key->img}}" class="img-fluid" alt="">
                                            <div class="social">
                                                <a href="{{url('/unsavedPromo/' . $key->id)}}"><i class="bi bi-bookmark-check-fill"></i></a>
                                            </div>
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

                                                    <h4>
                                                        Potensi Potongan:
                                                        @if($key->discount == '')
                                                            Tidak Tersedia
                                                        @else
                                                            {{$key->discount}}
                                                        @endif
                                                    </h4>

                                                @elseif($key->category == 'akomodasi')
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

                            @endforeach

                        </div>

                        <br>
                        <div class="d-flex justify-content-center">
                            {{$promoData->links()}}
                        </div>
                    </div>
                </section><!-- End Team Section -->
            </div>
        </section>

    </main>

@endsection
