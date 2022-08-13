@extends('layouts.layout')

@section('title')
    Akun
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
                <h1 class="h3 mb-0 text-gray-800">Akun</h1>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Nama</th>
                            <th>Tanggal Aktif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userData as $item)

                            <tr>
                                <td>{{$loop -> iteration}}</td>
                                <td>{{$item -> email}}</td>
                                <td>{{$item -> fullname}}</td>
                                <td>04 March 2021</td>
                                <td>
                                    <a href="/deleteUser/{{$item->id}}" class="btn btn-danger">
                                        <i class="fas fa-fw fa-trash"></i>
                                    </a> ||
                                    <a href="/akun/edit/{{ $item -> id }}" class="btn btn-success">
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
