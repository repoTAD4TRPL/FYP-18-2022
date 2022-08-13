@extends('layouts.layout')

@section('title')
    Scrape Option
@endsection

@section('main-content')

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Scrape Promo</h1>
            </div>
            <br><br>
            <div class="row justify-content-center">
                <a href="{{url('/scrape')}}" class="btn btn-warning">Scrape PegiPegi</a>
                &nbsp;
                <a href="" class="btn btn-primary">Scrape Tiket.com</a>
                &nbsp;

                <a href="" class="btn btn-info">Scrape Traveloka</a>
            </div>
            <br><br><br>
        </div>
    </div>

@endsection