<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{url('templateResources/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="{{url('templateResources/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet')}}">

    <!-- Custom styles for this template-->
    <link href="{{url('templateResources/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6">
            <div class="card-body p-0">
                @if($message = \Illuminate\Support\Facades\Session::get('error'))
                    <br>
                    <div class="alert alert-danger">
                        <p>
                            {{$message}}
                        </p>
                    </div>
                @endif
                @if($message = \Illuminate\Support\Facades\Session::get('success'))
                    <br>
                    <div class="alert alert-success">
                        <p>
                            {{$message}}
                        </p>
                    </div>
                @endif
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrasi!</h1>
                            </div>
                            <form class="user" method="post" action="{{url('registrationProcess')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" name="firstName"
                                            placeholder="Nama Depan">
                                        <span style="color: red; font-size: 15px">
                                            @error('firstName'){{$message}}@endif
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName" name="lastName"
                                            placeholder="Nama Belakang">
                                        <span style="color: red; font-size: 15px">
                                            @error('lastName'){{$message}}@endif
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email"
                                        placeholder="Email">
                                    <span style="color: red; font-size: 15px">
                                        @error('email'){{$message}}@endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="exampleLastName" name="age" placeholder="Umur">
                                    <span style="color: red; font-size: 15px">
                                        @error('age'){{$message}}@endif
                                    </span>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            id="exampleInputPassword" placeholder="Password">
                                        <span style="color: red; font-size: 15px">
                                            @error('password'){{$message}}@endif
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="repeatPassword"
                                            id="exampleRepeatPassword" placeholder="Ulang Password">
                                        <span style="color: red; font-size: 15px">
                                            @error('repeatPassword'){{$message}}@endif
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <select style="width: 430px; margin-left: 15px" name="gender" class="form-control">
                                        <option value="">Jenis Kelamin</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                    <span style="color: red; font-size: 15px; margin-left: 15px">
                                        @error('gender'){{$message}}@endif
                                    </span>
                                </div>
                                <br>
                                <button class="btn btn-primary btn-user btn-block">
                                    Daftar
                                </button>
                                <br>
                                <hr>
                            </form>
                            <br>
                            <div class="text-center">
                                <a class="small" href="{{url('/login')}}">Sudah punya akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{url('templateResources/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('templateResources/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('templateResources/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('templateResources/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
