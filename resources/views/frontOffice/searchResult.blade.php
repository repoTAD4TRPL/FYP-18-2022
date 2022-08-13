@extends('layouts.frontOfficeLayout')

@section('title')
    <title>Hasil Pencarian</title>
@endsection

@section('main-content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Menampilakn hasil pencarian berdasarkan "{{$valMsg}}"</h2>
                    <ol>
                        <li><a href="{{url('/')}}">Beranda</a></li>
                        <li>Hasil Pencarian</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">

                @if($valMsg == 'Promo Transportasi' || $valMsg == 'Akomodasi Kereta Api' || $valMsg == 'Akomodasi Mobil' || $valMsg == 'Akomodasi Transportasi Bandara')
                    <div class="filter-container">
                        <div class="siteFilterTitle">
                            <p>Filter berdasarkan web penyedia promo</p>
                        </div>
                        <div class="{{(request()->path() == 'searchBasedOn/car' ? 'filterActive' : 'siteFilter ')}}">
                            <p>
                                <a href="{{(request()->path() == 'searchBasedOn/car' ? '/searchBasedOn/akomodasi' : '/searchBasedOn/car')}}">Mobil</a>
                            </p>
                        </div>
                        <div class="{{(request()->path() == 'searchBasedOn/train' ? 'filterActive' : 'siteFilter ')}}">
                            <p>
                                <a href="{{(request()->path() == 'searchBasedOn/train' ? '/searchBasedOn/akomodasi' : '/searchBasedOn/train')}}">Kereta Api</a>
                            </p>
                        </div>
                        <div class="{{(request()->path() == 'searchBasedOn/jemput' ? 'filterActive' : 'siteFilter ')}}">
                            <p>
                                <a href="{{(request()->path() == 'searchBasedOn/jemput' ? '/searchBasedOn/akomodasi' : '/searchBasedOn/jemput')}}">Transportasi Bandara</a>
                            </p>
                        </div>
                    </div>
                @endif

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
                                                    <h4>
                                                        Kategori Promo: {{$key->category != '' ? ucfirst($key->category) : 'Tidak Ditentukan'}}
                                                    </h4>
                                                    <h4>Maskapai: {{$key->maskapai != '' ? ucfirst($key->maskapai) : 'Tidak Ditentukan'}}</h4>
                                                    <h4>
                                                        Potensi Potongan:
                                                        @if($key->discount == '')
                                                            Tidak Ditentukan
                                                        @else
                                                            {{$key->discount}}
                                                        @endif
                                                    </h4>

                                                @elseif($key->category == 'hotel')
                                                    <h4>
                                                        Kategori Promo: {{$key->category != '' ? ucfirst($key->category) : 'Tidak Ditentukan'}}
                                                    </h4>
                                                    <h4>Lokasi: {{$key->lokasi_hotel != '' ? ucfirst($key->lokasi_hotel) : 'Tidak Ditentukan'}}</h4>
                                                    <h4>
                                                        Potensi Potongan:
                                                        @if($key->discount == '')
                                                            Tidak Ditentukan
                                                        @else
                                                            {{$key->discount}}
                                                        @endif
                                                    </h4>

                                                @elseif($key->category == 'flight hotel')
                                                    <h4>
                                                        Kategori Promo: {{$key->category != '' ? ucfirst($key->category) : 'Tidak Ditentukan'}}
                                                    </h4>
                                                    <h4>Maskapai: {{$key->maskapai != '' ? ucfirst($key->maskapai) : 'Tidak Ditentukan'}}</h4>
                                                    <h4>Lokasi: {{$key->location != '' ? ucfirst($key->location) : 'Tidak Ditentukan'}}</h4>
                                                    <h4>
                                                        Potensi Potongan:
                                                        @if($key->discount == '')
                                                            Tidak Ditentukan
                                                        @else
                                                            {{$key->discount}}
                                                        @endif
                                                    </h4>

                                                @elseif($key->category == 'health')
                                                    <h4>
                                                        Kategori Promo: {{$key->category != '' ? ucfirst($key->category) : 'Tidak Ditentukan'}}
                                                    </h4>
                                                    <h4>
                                                        Potensi Potongan:
                                                        @if($key->discount == '')
                                                            Tidak Ditentukan
                                                        @else
                                                            {{$key->discount}}
                                                        @endif
                                                    </h4>

                                                @elseif($key->category == 'akomodasi')
                                                    <h4>
                                                        Kategori Promo: {{$key->category != '' ? ucfirst($key->category) : 'Tidak Ditentukan'}}
                                                    </h4>
                                                    <h4>Jenis Layanan:
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
                                                            Tidak Ditentukan
                                                        @else
                                                            {{$key->discount}}
                                                        @endif
                                                    </h4>
                                                @elseif($valMsg == 'Promo dengan potongan persentase' || $valMsg == 'Promo dengan kisaran potongan harga')
                                                    <h4>
                                                        Kategori Promo: {{$key->category != '' ? ucfirst($key->category) : 'Tidak Ditentukan'}}
                                                    </h4>
                                                    <h4>
                                                        Potensi Potongan:
                                                        @if($key->discount == '')
                                                            Tidak Ditentukan
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
