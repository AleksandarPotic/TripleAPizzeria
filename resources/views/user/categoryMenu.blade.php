<!DOCTYPE html>
<html>

<head lang="en">
    <title>Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="nova scotia, halifax, pizza, convenience, restaurant, store, dalhousie university, jubilee Road, donair, triple a" />
    <meta name="descripton" content="Order food online from Triple A Convenience & Pizzeria online menu. Triple A Convenience & Pizzeria Pizza restaurant, services include online order Pizza food, dine in, Pizza food take out, delivery and catering. You can find online coupons, daily specials and customer reviews on our website." />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
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
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/menuu.css') }}">


    <link href="{{ asset('user/assets/library/fontawesome/web-css/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/assets/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('user/assets/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('user/assets/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</head>

<body>
<div class="container-fluid" id="container">
@include('user.layouts.header')


    <div class="row" id="menu">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/pizza-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=pizza']) }}"><div class="hover hover1">
                    <h1>Pizza</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/poutine-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=poutine']) }}"><div class="hover hover1">
                    <h1>Poutine</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/fingers-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=garlic_fingers']) }}"><div class="hover hover1">
                    <h1>Garlic Fingers</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/donair-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=donairs']) }}"><div class="hover hover1">
                    <h1>Donairs</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/subs-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=subs']) }}"><div class="hover hover1">
                    <h1>Subs</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/wraps-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=wraps']) }}"><div class="hover hover1">
                    <h1>Wraps</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url({{ asset('/user/image/menu-icon/app-icon.jpg') }});">
            <a href="{{ route('user.menu', ['category=appetizers']) }}"><div class="hover hover1">
                    <h1>Appetizers</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/salads-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=salads']) }}"><div class="hover hover1">
                    <h1>Salads</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/nachos-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=nachos']) }}"><div class="hover hover1">
                    <h1>Nachos</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/calzones-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=calzones']) }}"><div class="hover hover1">
                    <h1>Calzones</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/chicken-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=chicken']) }}"><div class="hover hover1">
                    <h1>Chicken</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/wings-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=chicken_wings']) }}"><div class="hover hover1">
                    <h1>Chicken Wings</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/sandwiches-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=sandwiches']) }}"><div class="hover hover1">
                    <h1>Sandwiches</h1>
                </div></a>
        </div>

        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/burgers-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=burgers']) }}"><div class="hover hover1">
                    <h1>Burgers</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/seafood-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=seafood']) }}"><div class="hover hover1">
                    <h1>Seafood</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/sauce-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=sauces']) }}"><div class="hover hover1">
                    <h1>Sauces</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/munchies-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=munchies']) }}"><div class="hover hover1">
                    <h1>Munchies</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/desert-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=desserts']) }}"><div class="hover hover1">
                    <h1>Desserts</h1>
                </div></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 menu-item" style="background-image: url('{{ asset('/user/image/menu-icon/drinks-icon.jpg') }}');">
            <a href="{{ route('user.menu', ['category=drinks']) }}"><div class="hover hover1">
                    <h1>Drinks</h1>
                </div></a>
        </div>
    </div>
</div>


@include('user.layouts.footer')

@include('user.layouts.script')

</body>
</html>