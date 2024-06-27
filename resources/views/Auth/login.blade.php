<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/admin/assets/images/favicon.png')}}">
    <title>SIGRA | Login</title>
    <link href="{{url('admin/dist/css/style.min.css')}}" rel="stylesheet">
    <style>
        .modal-bg-img {
            background-size: cover;
            background-position: center;
            position: relative;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background:url('/admin/assets/images/big/auth-bg.jpg') no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img border-blue" style="background-image: url('/admin/assets/images/big/3.png');">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="{{url('/admin/assets/images/big/icon.png')}}" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Sign In</h2>
                        <p class="text-center">Masukkan Username dan Password anda untuk mengakses SIGRA.</p>
                        <form class="mt-4" method="POST" action="{{ url('/' . $nama_gereja . '/login') }}">
                            @csrf <!-- CSRF token for Laravel form submission security -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">Username</label>
                                        <input class="form-control" id="uname" type="text" name="username" placeholder="Enter your username">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">Password</label>
                                        <input class="form-control" id="pwd" type="password" name="password" placeholder="Enter your password">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">Sign In</button>
                                </div>
                            </div>
                        </form>


                        @if ($errors->has('loginError'))
                        <div class="alert alert-danger mt-2">
                            {{ $errors->first('loginError') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{url('/admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{url('/admin/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{url('/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>