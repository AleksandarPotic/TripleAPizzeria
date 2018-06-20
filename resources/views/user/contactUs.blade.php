<!DOCTYPE html>
<html>

<head lang="en">
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="nova scotia, halifax, pizza, convenience, restaurant, store, dalhousie university, jubilee Road, donair, triple a" />
    <meta name="descripton" content="Order food online from Triple A Convenience & Pizzeria online menu. Triple A Convenience & Pizzeria Pizza restaurant, services include online order Pizza food, dine in, Pizza food take out, delivery and catering. You can find online coupons, daily specials and customer reviews on our website." />
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
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/contact-us.css') }}">
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


    <div class="row contact-text">
        <div class="col-12">
            <h1 class="text-center">CONTACT US</h1>
        </div>
    </div>

    @if(session()->has('message_s'))
        <div class="alert alert-success" id="remove-alert" style="background-color: #e66001; color: white; border: none; text-align: center;">
            {{ session('message_s') }}
        </div>
    @endif

    <div class="row">
        <div class="container">
            <div class="row" id="contact-content">
                <div class="col-md-6 col-lg-6" id="contact-left">
                    <div class="row">
                        <div class="col-12" id="contact-left-sub-one">
                            <p class="text-center" style="font-size: 17px">DELIVERY ORDERS MUST BE A <font color="#e66001">MINIMUM OF $10 OF FOOD</font> (SAUCES, DRINKS, MUNCHIES & DESSERTS <font color="#e66001">DO NOT</font> COUNT AS FOOD).
                                <br><br>DELIVERY CHARGES MAY VARY BY AREA.</p>
                        </div>
                        <div class="col-12" id="contact-left-sub-two">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-5 col-lg-5 text">
                                    <p class="first-p">Telephone</p>
                                    <p class="second-p">902-406-8888</p>
                                    <p class="second-p">902-444-4024</p>
                                </div>
                                <div class="col-12 col-sm-12 col-md-7 col-lg-7 text">
                                    <p class="first-p">Hours</p>
                                    <p class="second-p">Sunday – Wednesday <font color="#e66001">9am – 1am</font></p>
                                    <p class="second-p">Thursday – Saturday <font color="#e66001">9am – 3am</font></p>
                                </div>
                                <div class="col-5 text">
                                    <a href="https://www.facebook.com/aaapizzeria/" target="_blank"><i style="margin-left: 0px;" class="fab fa-facebook-square"></i></a>
                                    <a href="https://www.instagram.com/tripleapizzeria/" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a href="#" target="_blank"><i class="fab fa-snapchat-ghost"></i></a><br>
                                </div>
                                <div class="col-6 text">
                                    <p class="second-p"><i style="margin-left: 0px;" class="fa fa-envelope"></i>  info@tripleapizzeria.ca</p>
                                </div>


                            </div> <!-- End of the row in col-12 section -->
                        </div> <!-- // End of col-12 section inside left col-6 section -->
                    </div> <!-- // End of the row inside col-6 -->
                </div> <!-- // Left col-6 inside Container -->




                <div class="col-md-6 col-lg-6" id="contact-right">

                    <!-- This is a form for sending messages to webmaster administrators. -->

                    <form action="{{ route('contactUser.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="text" name="first_name" placeholder="First Name*" required="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="last_name" placeholder="Last Name*" required="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="email" placeholder="Email*" required="">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" name="body_message" id="" placeholder="Comment*" required=""></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Send</button>
                    </form>


                </div> <!-- // Right col-6 inside Container -->
            </div> <!-- // End of the row in Container -->
        </div> <!-- // End of the Container inside Container-fluid -->
    </div> <!-- // End of the row inside Container-fluid -->
</div>

    <!-- // Part of the map -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12" id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2007.375813481924!2d-63.59711603505892!3d44.640817096611485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b5a2227d5ed952b%3A0x9bf950e8693d959f!2zNjI3OSBKdWJpbGVlIFJkLCBIYWxpZmF4LCBOUyBCM0ggMkc2LCDQmtCw0L3QsNC00LA!5e0!3m2!1ssr!2srs!4v1521197376452" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div> <!-- // End of the col-12 -->
            <div class="container">
                <div class="col-12" id="line"></div><!-- // Line col -->
            </div><!-- // End of container for line -->
        </div>	<!-- // End of the row -->
    </div> <!-- // End of the Container-fluid -->


@include('user.layouts.footer')

@include('user.layouts.script')
</body>
</html>