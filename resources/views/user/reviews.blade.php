<!DOCTYPE html>
<html>

<head lang="en">
    <title>Reviews</title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/reviews.css') }}">
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

    <div class="row">
        <div class="col-12" id="contact-image" style="background-image: url({{ asset('/user/image/reviews.jpg') }})">

        </div>
    </div>

    <div class="row" id="rev">
        <div class="container">
            <div class="row">
                <div class="col-12" id="reviews-text">
                    <h1 class="text-center">REVIEWS</h1>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1 reviews">
                <p style="color: white"><sup class="qotes"><i class="fas fa-quote-right"></i></sup>We just ordered from Triple A and what a great experience. The food was great and well priced. As part as my online order I requested I slice of the pizza be just cheese for my son. I didn't word it properly and they thought I was requesting a slice of just cheese pizza. As they don't sell slices through delivery they sent a just cheese pizza for my son free of charge. Things like this go so far. Not only was it a great meal, but a great way to start our weekend. Thank you!<sub class="qotes1"><i class="fas fa-quote-left"></i></sub></p>
                <p style="margin-bottom: 0px; color: white" class="text-left"><em><b>-- Peter Mullen</b></em></p>
            </div>

            <div class="col-12 col-sm-12 col-md-8 col-lg-8 reviews1" style="color: rgb(1,24,30)">
                <p><sup class="qotes"><i class="fas fa-quote-right"></i></sup>Best corner store ever ever ever!!! Amazing food, friendly people and an owner who knows his customers by name. We love to stop by on Sundays for lunch and coffee and a chit-chat.<sub class="qotes1"><i class="fas fa-quote-left"></i></sub></p>
                <p style="margin-bottom: 0px;" class="text-left"><em><b>-- Tanja Kuepers</b></em></p>
            </div>

            <div class="col-12 col-sm-12 col-md-8 offset-md-4 col-lg-8 offset-lg-4 reviews2">
                <p style="color: white"><sup class="qotes"><i class="fas fa-quote-right"></i></sup>Amazing pizza, incredible milkshakes and even better customer service. Thank you so much for everything!<sub class="qotes1"><i class="fas fa-quote-left"></i></sub></p>
                <p style="margin-bottom: 0px; color: white" class="text-left"><em><b>-- Christina Kempster</b></em></p>
            </div>

            <div class="col-12 col-sm-12 col-md-8 col-lg-8 reviews3" style="color: rgb(1,24,30)">
                <p><sup class="qotes"><i class="fas fa-quote-right"></i></sup>Best corner store in Halifax - but it's the people that make this store even better!<sub class="qotes1"><i class="fas fa-quote-left"></i></sub></p>
                <p style="margin-bottom: 0px;" class="text-left"><em><b>-- Ben Black</b></em></p>
            </div>

            <div class="col-12 col-sm-12 col-md-8 offset-md-4 col-lg-8 offset-lg-4 reviews4">
                <p style="color: white"><sup class="qotes"><i class="fas fa-quote-right"></i></sup>The best convenience store in Halifax. The customer service is just as great as their famous T-Wrap. The T-Wrap is a must have.<sub class="qotes1"><i class="fas fa-quote-left"></i></sub></p>
                <p style="margin-bottom: 0px; color: white" class="text-left"><em><b>-- Byron Mccartney </b></em></p>
            </div>
            <br>
            <div class="col-12" id="line">

            </div>
        </div>
    </div>

</div>

@include('user.layouts.footer')

@include('user.layouts.script')

</body>
</html>