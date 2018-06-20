<!DOCTYPE html>
<html>

<head lang="en">
    <title>Reset password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="" />
    <meta name="descripton" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta property="og:url" content="" />
    <meta property="og:type" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
    <meta name="twitter:card" content="" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:creator" content="" />
    <meta name="robots" content="noindex" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="format-detection" content="telephone = no" />
    <link rel="icon" href="{{ asset('/user/image/logic.png') }}">

    <!-- fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lalezar" rel="stylesheet">

    <!--asset-->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/sign-up.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/footer.css') }}">


    <link href="{{ asset('user/assets/library/fontawesome/web-css/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/assets/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('user/assets/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('user/assets/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</head>

<body>
<div class="container-fluid" id="container">
    @include('user.layouts.header')



    <div class="row" id="check">
        <div class="col-lg-8 offset-lg-2">
            <h1 class="text-center" style="font-size: 3rem; font-weight: 100;">RESET PASSWORD</h1>
            @if(count($errors) >0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-success" id="remove-alert" style="background-color: #e66001; color: white; border: none; text-align: center;">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            @if(session()->has('message_signup'))
                <div class="alert alert-success" id="remove-alert" style="background-color: #e66001; color: white; border: none; text-align: center;">
                    {{ session('message_signup') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success" style="background-color: #e66001; color: white; border: none; text-align: center;">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="container">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-6 offset-lg-3" id="left-check" style="text-align: center">
                            <h4><b>Send email for reset password!</b></h4>
                            <div class="row">
                                <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                                    <input class="form-control" type="email" name="email" id="Fname" placeholder="Enter email" required="">
                                </div>
                                <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12" id="sign-up" style="margin-left: 8px">
                                    <button type="submit" class="btn btn-default btn-block">Send</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            <div id="line">

            </div>
        </div>
    </div>



</div>

@include('user.layouts.footer')

@include('user.layouts.script')

<script>
    $(document).ready(function () {
        $("#sign_upp").click(function () {
            //alert($("#term_of_use:checked").val());

            if ($("#term_of_use:checked").val() != 'on') {
                alert('Do you accept Term of Use?');
                //return false;
            }

        });
    })
</script>

</body>
</html>