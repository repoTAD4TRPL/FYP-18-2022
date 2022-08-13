@extends('layouts.frontOfficeLayout')

@section('title')
<title>Promo</title>
@endsection

@section('main-content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Promo</h2>
                <ol>
                    <li><a href="{{url('/')}}">Beranda</a></li>
                    <li>Promo</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
             <div class="filter-container">
                 <div class="siteFilterTitle">
                     <p>Filter berdasarkan web penyedia promo</p>
                 </div>
                 <div class="{{(request()->path() == 'promoUser/traveloka' ? 'filterActive' : 'siteFilter ')}}">
                     <p>
                        <a href="{{(request()->path() == 'promoUser/traveloka' ? '/promoUser/index' : '/promoUser/traveloka')}}">Traveloka</a>
                      </p>
                 </div>

                 <div class="{{(request()->path() == 'promoUser/pegipegi' ? 'filterActive' : 'siteFilter')}}">
                     <p>
                        <a href="{{(request()->path() == 'promoUser/pegipegi') ? '/promoUser/index' : '/promoUser/pegipegi'}}">PegiPegi</a>
                     </p>
                 </div>

                 <div class="{{(request()->path() == 'promoUser/tiket' ? 'filtererActive' : 'siteFilter')}}">
                     <p>
                        <a href="{{(request()->path() == 'promoUser/tiket' ? '/promoUser/index' : '/promoUser/tiket')}}">tiket.com</a>
                     </p>
                 </div>
                 <div class="{{(request()->path() == 'promoUser/airpaz' ? 'filterActive' : 'siteFilter')}}">
                    <p>
                        <a href="{{(request()->path() == 'promoUser/airpaz' ? '/promoUser/index' : '/promoUser/airpaz')}}">Airpaz</a>
                    </p>
                 </div>
                 <div class="{{(request()->path() == 'promoUser/nusa' ? 'filterActive' : 'siteFilter')}}">
                    <p>
                        <a href="{{(request()->path() == 'promoUser/nusa' ? '/promoUser/index' : '/promoUser/nusa')}}">NusaTrip</a>
                    </p>
                 </div>
                 <div class="{{(request()->path() == 'promoUser/garuda' ? 'filterActive' : 'siteFilter')}}">
                    <p>
                        <a href="{{(request()->path() == 'promoUser/garuda' ? '/promoUser/index' : '/promoUser/garuda')}}">Garuda Indonesia</a>
                    </p>
                 </div>
                 <div class="{{(request()->path() == 'promoUser/citi' ? 'filterActive' : 'siteFilter')}}">
                    <p>
                        <a href="{{(request()->path() == 'promoUser/citi' ? '/promoUser/index' : '/promoUser/citi')}}">Citilink</a>
                    </p>
                 </div>
              </div>

            <!-- ======= Team Section ======= -->
            <section id="team" class="detailPromo">
                <div class="container" data-aos="fade-up">

                    <div class="row">

                        @foreach($promoData as $key)

                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
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
