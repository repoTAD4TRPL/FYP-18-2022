@extends('layouts.layout')

@section('title')
    Promo
@endsection

@section('main-content')

    <div class="card shadow mb-4">
        @if($message = \Illuminate\Support\Facades\Session::get('success'))
            <div class="alert alert-success">
                <p>
                    {{$message}}
                </p>
            </div>
        @endif
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Promo</h1>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="width: 550px">Nama</th>
                            <th>Web Penyedia</th>
                            <th style="width: 350px">Berlaku Hingga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($promoData as $item)
                            <tr>
                                <td>{{ $loop -> iteration }}</td>
                                <td>{{ $item -> name }}</td>
                                <td>{{ $item -> webName }}</td>
                                <td>{{ $item -> end_date }}</td>
                                <td>
                                    <a href="/deletePromo/{{ $item->id }}" class="btn btn-danger">
                                        <i class="fas fa-fw fa-trash"></i>
                                    </a> ||
                                    <a href="/promo/editPromo/{{ $item -> id }}" class="btn btn-success">
                                        <i class="fas fa-fw fa-pen"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
