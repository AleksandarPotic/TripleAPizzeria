<!DOCTYPE html>
<html>

<head lang="en">
    <title>404Error</title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/footer.css') }}">


    <link href="{{ asset('user/assets/library/fontawesome/web-css/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/assets/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('user/assets/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('user/assets/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</head>

<body>
<div class="container-fluid" id="container">
    <div class="row">
        <div id="header-container" class="col-12">
            <a class="navbar-brand ml-3" href="{{ route('index') }}">
                <div class="col-12" id="logo"></div></a>

            <!--//////////////////////////////////////////// MOBILE NAVIGATION START ///////////////////////////////////-->
            <div class="mobile">
                <nav class="navbar navbar-expand-lg" @if(Auth::guest()) style="display: flex; width: 100%;" @else style="display: none; width: 100%;" @endif id="nav1">
                    <!--ovde menjaj flex sa none i sa ovim dole nav2, znaci nav1 je kad nije ulogovan a nav2 ide display flex kad je ulogovan -->
                    <a class="navbar-brand" id="brand" href="{{ route('index') }}"><img class="img-fluid" src="{{ asset('user/image/logo.png') }}"></a>
                    <div id="red pull-right">
                        <ul class="list-inline" id="whole-list">
                            <li class="list-inline-item nav-item dropdown">
                                <i class="fas fa-user" id="mobile-cart" onclick="openMobileMenu()"></i>
                                <div class="dropdown-menu dropdown-menu-right" style="margin-left: -140px;" aria-labelledby="navbarDropdownMenuLink">
                                    <label><p style="font-size: 18px;"><b>Sign in</b></p></label>
                                    <br>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div id="break">
                                            <input class="form-control" name="email" type="text" placeholder="Email" class="orangeBorder">
                                            <input class="form-control" name="password" type="password" placeholder="Password" class="orangeBorder">
                                        </div>
                                        <a href="{{ route('password.request') }}" style="color: black;"><p id="forgot">Forgot password?</p></a>
                                        <button style="margin-top: -10px; margin-bottom: 10px;" class="btn orangeButton" type="submit">Sign in</button>
                                    </form>
                                    <div id="orangeLine"></div>
                                    <p id="forgot">Don't have an account?</p>
                                    <a href="{{ route('register') }}" style="margin-top: -10px;" class="btn orangeButton noDecor" role="button">Sign Up</a>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart" id="mobile-cart"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <button style="outline: none;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-bars" id="mobile-cart"></i>
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav justify-content-end w-100">
                            <li class="bottom-row nav-item">
                                <a class="nav-link" id="bottom-row2" href="{{ route('user.menu', ['category=pizza']) }}"><span>MENU</span><span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row2" href="{{ route('specials') }}"><span>SPECIALS</span><span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row2" href="{{ route('rewards') }}"><span>REWARDS</span><span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row2" href="{{ route('reviews') }}"><span>REVIEWS</span><span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row2" href="{{ route('contactUser.index') }}"><span>CONTACT US</span><span class="sr-only"></span></a>
                            </li>
                        </ul>

                    </div>

                </nav>
                <!-- OVO JE MOBILNI MENI KADA JE ULOGOVAN -->

                <nav class="navbar navbar-expand-lg" @if(Auth::guest()) style="display: none; width: 100%;" @else style="width: 100%;" @endif id="nav2">
                    <a class="navbar-brand" id="brand" href="{{ route('index') }}"><img class="img-fluid" src="{{ asset('user/image/logo.png') }}"></a>
                    <div id="red pull-right">
                        <ul class="list-inline" id="whole-list">
                            <li class="list-inline-item nav-item dropdown">
                                <i class="fas fa-user" id="mobile-cart" onclick="openMobileMenu()"></i>
                                <div class="dropdown-menu dropdown-menu-right" style="margin-left: -140px;" aria-labelledby="navbarDropdownMenuLink">
                                    <ul style="list-style-type: none;">
                                        <a style="color: #000; text-decoration: none;" href="{{ route('favorite.index') }}"><li>My Profile</li></a>
                                        <a style="color: #000; text-decoration: none;" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><li>Log Out</li></a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart" id="mobile-cart"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <button style="outline: none;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent12" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-bars" id="mobile-cart"></i>
                                </button>
                            </li>
                        </ul>
                    </div>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent12">
                        <ul class="navbar-nav justify-content-end w-100">
                            <li class="bottom-row nav-item">
                                <a class="nav-link" id="bottom-row2" href="{{ route('user.menu', ['category=pizza']) }}"><span>MENU</span><span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row2" href="{{ route('specials') }}"><span>SPECIALS</span><span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row2" href="{{ route('rewards') }}"><span>REWARDS</span><span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row2" href="{{ route('reviews') }}"><span>REVIEWS</span><span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row2" href="{{ route('contactUser.index') }}"><span>CONTACT US</span><span class="sr-only"></span></a>
                            </li>
                        </ul>

                    </div>

                </nav>

            </div>

            <!-- OVO JE MOBILNI MENI KADA JE ULOGOVAN -->

            <!--//////////////////////////////////////////// MOBILE NAVIGATION END /////////////////////////////-->


            <!--//////////////////////////////////////////// DESKTOP NAVIGATION START /////////////////////////-->
            <div class="desktop">


                <nav class="navbar navbar-expand-md" @if(Auth::guest()) style="width: 100%;" @else style="display: none; width: 100%;" @endif id="nav">
                    <div class="navbar-toggler-right">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse flex-column" id="navbar">

                        <ul class="navbar-nav justify-content-end w-100">
                            <li class="bottom-row nav-item">
                                <a class="nav-link" id="bottom-row" href="{{ route('user.menu', ['category=pizza']) }}"><span>MENU</span><span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row" href="{{ route('specials') }}"><span>SPECIALS</span><span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row" href="{{ route('rewards') }}"><span>REWARDS</span><span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row" href="{{ route('reviews') }}"><span>REVIEWS</span><span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row" href="{{ route('contactUser.index') }}"><span>CONTACT US</span><span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <div id="signIn" style="margin-top: -3px;" onclick="openDesktopMenu()">
                                    <a class="nav-link" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                                        Sign in <br> or Create Account
                                    </a>
                                </div>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <label><p style="font-size: 18px;"><b>Sign in</b></p></label>
                                    <br>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div id="break" style="margin-bottom: 20px;">
                                            <input class="form-control" name="email" type="text" placeholder="Email" class="orangeBorder">
                                            <input class="form-control" name="password" type="password" placeholder="Password" class="orangeBorder">
                                        </div>
                                        <a href="{{ route('password.request') }}" style="color: black;"><p id="forgot">Forgot password?</p></a>
                                        <button style="margin-bottom: 15px; margin-top: -10px;" class="btn orangeButton" type="submit">Sign in</button>
                                    </form>
                                    <div id="orangeLine"></div>
                                    <p id="forgot">Don't have an account?</p>
                                    <a href="{{ route('register') }}" style="margin-top: -5px;" class="btn orangeButton noDecor" role="button">Sign Up</a>
                                </div>
                            </li>


                            <li class="nav-item" id="numbers">
                                <a class="nav-link" id="bottom-row" href="#">902-444-4024<span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item" id="mycart-li-2">
                                <div id="mycart" style="position: relative;"><a class="nav-link" id="bottom-row" href="{{ route('cart.index') }}"><i id="cartphoto" class="fas fa-shopping-cart" style="float:left;"></i><span class="badge badge-light" style="background-color: #e66001; color: #fff; border-radius: 50%; position: absolute; top: 3px; left: 23px; ">{{ Cart::count() }}</span><span>${{ Cart::total() }}</span><span class="sr-only">(current)</span></a></div>
                            </li>
                        </ul>

                    </div>

                </nav>

                <nav class="navbar navbar-expand-md" @if(Auth::guest()) style="display: none; width: 100%;" @else style="width: 100%;" @endif id="nav3">
                    <div class="navbar-toggler-right">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse flex-column" id="navbar">

                        <ul class="navbar-nav justify-content-end w-100">
                            <li class="bottom-row nav-item">
                                <a class="nav-link" id="bottom-row" href="{{ route('user.menu', ['category=pizza']) }}"><span>MENU</span><span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row" href="{{ route('specials') }}"><span>SPECIALS</span><span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row" href="{{ route('rewards') }}"><span>REWARDS</span><span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row" href="{{ route('reviews') }}"><span>REVIEWS</span><span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bottom-row" href="{{ route('contactUser.index') }}"><span>CONTACT US</span><span class="sr-only"></span></a>
                            </li>

                            <li class="nav-item dropdown">
                                <div id="signIn" style="margin-top: -3px;" onclick="openDesktopMenu()">
                                    <a style="padding-top: 14px; padding-bottom: 14px; text-align: center;" class="nav-link" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                                        Hello @if(!Auth::guest()) {{ Auth::user()->first_name }} @endif
                                    </a>
                                </div>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <ul style="list-style-type: none;">
                                        <a style="color: #000; text-decoration: none;" href="{{ route('favorite.index') }}"><li>My Profile</li></a>
                                        <a style="color: #000; text-decoration: none;" class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <li>Log Out</li>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item" id="numbers">
                                <a class="nav-link" id="bottom-row" href="#">902-444-4024<span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item" id="mycart-li-1">
                                <div id="mycart" style="position: relative;"><a class="nav-link" id="bottom-row" href="{{ route('cart.index') }}"><i id="cartphoto" class="fas fa-shopping-cart" style="float:left;"></i><span class="badge badge-light" style="background-color: #e66001; color: #fff; border-radius: 50%; position: absolute; top: 3px; left: 23px; ">{{ Cart::count() }}</span><span>${{ Cart::total() }}</span><span class="sr-only">(current)</span></a></div>
                            </li>
                        </ul>

                    </div>

                </nav>

            </div>

            <!--//////////////////////////////////////////// DESKTOP NAVIGATION END /////////////////////////-->

        </div> <!-- HEADER CONTAINER END -->

    </div>	<!-- ROW END -->
    <div class="container">
        <div class="row" style="margin-top: 90px; margin-bottom: 93px;">
            <div class="col-lg-3 offset-lg-5">
                <h1>Oops!</h1>
                <h1 class="404error"><b> 404 </b></h1>
                <h1>Not Found</h1>
            </div>
        </div>
    </div>
</div>
@include('user.layouts.footer')

@include('user.layouts.script')
</body>
</html>