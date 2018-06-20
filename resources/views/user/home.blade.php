<!DOCTYPE html>
<html>

<head lang="en">
    <title>Home</title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/home.css') }}">


    <link href="{{ asset('user/assets/library/fontawesome/web-css/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/assets/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('user/assets/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('user/assets/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118143332-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-118143332-1');
    </script>


</head>

<body>
<div class="container-fluid" id="container">
    @include('user.layouts.header')

        <div class="row">
            <div class="col-12" style="margin:0; padding:0;">
                <div id="container1">
                    <div style="background-image: url({{ asset('/user/image/triple-one.jpg') }});" class="mySlides fade images">

                    </div>

                    <div style="background-image: url({{ asset('/user/image/triple-two.jpg') }});" class="mySlides fade images">

                    </div>

                    <div style="background-image: url({{ asset('/user/image/one.jpg') }});" class="mySlides fade images">

                    </div>

                    <div style="text-align:center" id="dots">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 offset-3 text-center" id="box-button">
                <a href="{{ route('user.categoryMenu') }}"><button class="btn btn-primary">ORDER NOW</button></a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center" id="left">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 offset-lg-1 col-lg-10">
                                <h1>WHO WE ARE</h1>
                                <h3>#TripleAllTheWay</h3>
                                <p>Triple A has been proudly serving the Halifax Community for 40 years. What started out as a local convenience store quickly became a staple in the community. We are extremely grateful to all our wonderful customers and friends for their continued support over all these years. We love being a part of the community because we have the most caring and loving customers. We promise to always provide outstanding customer service, the tastiest food, the largest selection of ice cream sandwiches and our personal care and love in everything we do. We look forward to serving the wonderful community of Halifax for years to come!</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center" id="right">
                        <div class="row">

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 right-sub" style="background-image: url({{ asset('/user/image/about.jpg') }});">

                            </div><!--// Right-Sub-One End -->

                        </div> <!--// Row End (row for sub section in right secton) -->
                    </div> <!--// Right End -->
                </div> <!--// End Row -->
            </div> <!--// End col-12 -->
        </div> <!--// End Row -->

        <div class="row flex-sm-row-reverse" id="third-section">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6" id="university-logo">
                <img class="img-fluid" src="{{ asset('/user/image/dalll.jpg') }}">
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-6" id="section-three-slider">
                <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('/user/image/community-four.jpg') }}" alt="Triple pizzeria">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('/user/image/community.jpg') }}" alt="Triple pizzeria">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('/user/image/community-one.jpg') }}" alt="Triple pizzeria">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('/user/image/community-two.jpg') }}" alt="Triple pizzeria">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('/user/image/community-three.jpg') }}" alt="Triple pizzeria">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('/user/image/note.jpg') }}" alt="Triple pizzeria">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
</div>
    @include('user.layouts.footer')

    @include('user.layouts.script')
</body>
</html>