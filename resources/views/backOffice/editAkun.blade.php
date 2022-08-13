@extends('layouts.layout')

@section('title')
    Edit Akun
@endsection

@section('main-content')

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Akun</h1>
            </div>

            <div class="row justify-content-center">
            <form class="user" method="post" action="{{url('/akun/editProcess/' . $dataUser->id)}}">
                @csrf
                <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" name="name"
                               placeholder="Name" value="{{$dataUser->fullname}}">
                </div>
                <div class="form-group row">
                    <select style="width: 430px; margin-left: 15px" name="gender" class="form-control">
                        <option value="">Gender</option>
                        <option value="1" @if($dataUser->gender == 1) selected @endif>Male</option>
                        <option value="2" @if($dataUser->gender == 2) selected @endif>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control form-control-user" id="exampleFirstName" name="age"
                           placeholder="Name" value="{{$dataUser->age}}">
                </div>
                <br>
                <button href="login.blade.php" class="btn btn-primary btn-user btn-block ">
                    Edit Akun
                </button>
                <br>
                <hr>
            </form>
            </div>
        </div>
    </div>

@endsection
