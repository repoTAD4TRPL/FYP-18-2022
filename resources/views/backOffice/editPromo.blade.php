@extends('layouts.layout')

@section('title')
    Edit Akun
@endsection

@section('main-content')

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Promo</h1>
            </div>

            <div class="row justify-content-center">
                <form class="user" method="post" action="{{url('/promo/editProcess/' . $dataPromo->id)}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" name="name"
                               placeholder="Name" value="{{$dataPromo->name}}">
                    </div>
                    <div class="form-group row">
                        <select style="width: 430px; margin-left: 15px" name="provider" class="form-control">
                            <option value="">Web Provider</option>
                            <option value="1" @if($dataPromo->id_website == 1) selected @endif>PegiPegi</option>
                            <option value="2" @if($dataPromo->id_website == 2) selected @endif>tiket.com</option>
                            <option value="3" @if($dataPromo->id_website == 3) selected @endif>Traveloka</option>
                            <option value="4" @if($dataPromo->id_website == 4) selected @endif>Airpaz</option>
                            <option value="5" @if($dataPromo->id_website == 5) selected @endif>NusaTrip</option>
                            <option value="6" @if($dataPromo->id_website == 6) selected @endif>Garuda Indonesia</option>
                            <option value="7" @if($dataPromo->id_website == 7) selected @endif>Citilink</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea type="" class="form-control" id="exampleFirstName" placeholder="Isi" style="height: 200px" name="description">{{$dataPromo->description}}</textarea>
                    </div>
                    <br>
                    <button href="login.blade.php" class="btn btn-primary btn-user btn-block ">
                        Edit Promo
                    </button>
                    <br>
                    <hr>
                </form>
            </div>
        </div>
    </div>

@endsection
