<!DOCTYPE html>
<html>

<head lang="en">
    @section('title-part')
        <title>Rewards</title>
    @show
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
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/rewards.css') }}">


    <link href="{{ asset('user/assets/library/fontawesome/web-css/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/assets/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('user/assets/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('user/assets/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</head>

<body>

<div class="container-fluid" id="container">

    @include('user.layouts.header')

    <div class="row">
        <div class="col-12" id="contact-image" style="background: url({{ asset('/user/image/rewards.jpg') }})">
            <div class="container">
                <div class="row contact-text" id="sample-text">
                    @if(Auth::guest())
                        <div class="col-12">
                            <h1 class="text-left animated fadeInDown">Become a Triple A Rewards Member</h1>
                        </div>
                        <div class="col-12 text-left">
                            <a href="{{ route('register') }}"><button class="btn btn-primary">Sign Up</button></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <h1 style="font-size: 3rem; color:#01181E; padding-top: 25px;" id="whats" class="text-center">
                WHAT'S INCLUDED
            </h1>
        </div>
    </div>


    <div class="row">
        <div class="container">
            <div class="row" id="included-section">
                <div class="offset-1 col-10 offset-sm-0 col-sm-12 col-md-4 col-lg-4 included">
                    <div class="carry">
                        <h4>Birthday Bonus Points</h4>
                        <ul>
                            <li><b>-</b> Receive 10 bonus points on your birthday as a special treat from us!</li>
                        </ul>
                    </div>
                </div>

                <div class="offset-1 col-10 offset-sm-0 col-sm-12 col-md-4 col-lg-4 included">
                    <div class="carry">
                        <h4>Faster & Easier Online Ordering</h4>
                        <ul>
                            <li><b>-</b> Save your contact information, addresses and favorite items, so you can check out even faster. </li>
                        </ul>
                    </div>
                </div>

                <div class="offset-1 col-10 offset-sm-0 col-sm-12 col-md-4 col-lg-4 included">
                    <div class="carry">
                        <h4>Great Specials</h4>
                        <ul>
                            <li><b>-</b> Be the first to know about all our new specials and menu items, so you can be the first to take advantage. </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row" id="steps">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center step" id="prvi">
                    <h3>Order</h3>
                    <div id="little-line" style="border-bottom: 1px solid #e66001;" class="offset-5 col-2"></div>
                    <i class="fas fa-mobile-alt fa-9x"></i>
                    <p>Order your favorite foods online.</p>
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center step">
                    <h3>Earn</h3>
                    <div id="little-line" style="border-bottom: 1px solid #e66001;" class="offset-5 col-2"></div>
                    <i class="fas fa-dollar-sign fa-9x"></i>
                    <p>Get 1 point for every $8 you spend.</p>
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center step">
                    <h3>Eat</h3>
                    <div id="little-line" style="border-bottom: 1px solid #e66001;" class="offset-5 col-2"></div>
                    <i class="fas fa-utensils fa-9x"></i>
                    <p>Redeem your points for delicious desserts and pizzas.</p>
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center step">
                    <h3>Repeat</h3>
                    <div id="little-line" style="border-bottom: 1px solid #e66001;" class="offset-5 col-2"></div>
                    <i class="fas fa-redo-alt fa-9x"></i>
                    <p>The more you order, the more you earn.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12" id="image-one">
                    <img class="img-fluid animated fadeInLeft" src="{{ asset('user/image/povrcke1.png') }}">
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3" id="cardd">
                    <div class="card">
                        <div class="card-body" id="card-body">
                            <h5 class="card-title text-center">Desserts</h5>
                        </div>
                        <img class="img-fluid" src="{{ asset('user/image/desert-icon.jpg') }}">
                        <div class="card-body text-center">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".dessert">Redeem for 10 points</a>
                        </div>
                    </div>


                    <!--// Modal for item -->

                    <div class="modal fade dessert" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                @if(!Auth::guest() and Auth::user()->points >= 10)
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalLabel">Desserts</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('rewards.dessert') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">

                                            <ul class="list-inline">
                                                <li class="list-inline-item text-center" id="da">
                                                    <div class="input-group">
                                                        <input type="hidden" name="points" value="{{ Auth::user()->points }}">
                                                        <select id="select" class="form-control" name="dessert_id">
                                                            @foreach($desserts as $dessert)
                                                                <option value="{{ $dessert->id }}">{{ $dessert->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                        <div class="modal-footer">
                                            <a href=""><button type="submit" class="btn btn-primary">Add to Cart</button></a>
                                        </div>
                                    </form>
                                @elseif(Auth::guest())
                                    <div class="modal-body">
                                        <p class="modal-p">You must be a registered user!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                @elseif(Auth::user()->points < 10)
                                    <div class="modal-body">
                                        <p class="modal-p">You do not have enough points. You have {{ Auth::user()->points }} point(s)!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--// End of Modal -->



            <!--// CARD -->
            <div class="col-12 col-sm-12 col-md-3 col-lg-3" id="cardd">
                <div class="card">
                    <div class="card-body" id="card-body">
                        <h5 class="card-title text-center">Medium 2-Topping</h5>
                    </div>
                    <img class="img-fluid" src="{{ asset('user/image/pizza-icon.jpg') }}">
                        <div class="card-body text-center">
                            <a class="btn btn-primary" @if(Auth::guest()) data-toggle="modal" data-target="#exampleModal5" @elseif(Auth::user()->points < 15) data-toggle="modal" data-target="#exampleModal5" @else onclick="submit15Form()" @endif>Redeem for 15 points</a>
                        </div>

                    <form action="{{ route('customizeUser.rewardsOne') }}" id="reddomForm15" method="POST">
                        @csrf
                        @foreach($products as $product)
                            @if($product->name == 'Cheese Pizza')
                                <input type="hidden" name="pizza_id" value="{{ $product->id }}">
                            @endif
                        @endforeach
                        <input type="hidden" name="pizza_name" value="Medium 2-Topping">
                    </form>
                </div>
            </div>
            <!--// End CARD -->

            <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        @if(Auth::guest())
                                <div class="modal-body">
                                    <p class="modal-p">You must be a registered user!</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                        @elseif(Auth::user()->points < 15)
                                <div class="modal-body">
                                    <p class="modal-p">You do not have enough points. You have {{ Auth::user()->points }} point(s)!</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-3 col-lg-3" id="cardd">
                <div class="card">
                    <div class="card-body" id="card-body">
                        <h5 class="card-title text-center">Large 3-Topping</h5>
                    </div>
                    <img class="img-fluid" src="{{ asset('user/image/pizza-icon.jpg') }}">
                    <div class="card-body text-center">
                        <a class="btn btn-primary" @if(Auth::guest()) data-toggle="modal" data-target="#exampleModal2" @elseif(Auth::user()->points < 25) data-toggle="modal" data-target="#exampleModal2" @else onclick="submit25Form()" @endif>Redeem for 25 points</a>
                    </div>

                    <form action="{{ route('customizeUser.rewardsTwo') }}" id="reddomForm25" method="POST">
                        @csrf
                        @foreach($products as $product)
                            @if($product->name == 'Cheese Pizza')
                                <input type="hidden" name="pizza_id" value="{{ $product->id }}">
                            @endif
                        @endforeach
                        <input type="hidden" name="pizza_name" value="Large 3-Topping">
                    </form>
                </div>
            </div>


            <!--// Modal for item -->

            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        @if(Auth::guest())
                                <div class="modal-body">
                                    <p class="modal-p">You must be a registered user!</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                        @elseif(Auth::user()->points < 25)
                                <div class="modal-body">
                                    <p class="modal-p">You do not have enough points. You have {{ Auth::user()->points }} point(s)!</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                        @endif
                    </div>
                </div>
            </div>

        <!--// End of Modal -->



        <div class="col-12 col-sm-12 col-md-3 col-lg-3" id="cardd">
            <div class="card">
                <div class="card-body" id="card-body">
                    <h5 class="card-title text-center">Specialty</h5>
                </div>
                <img class="img-fluid" src="{{ asset('user/image/pizza-icon.jpg') }}">
                <div class="card-body text-center">
                    <a class="btn btn-primary" @if(Auth::guest()) data-toggle="modal" data-target="#exampleModal3" @elseif(Auth::user()->points < 30) data-toggle="modal" data-target="#exampleModal3" @else onclick="submit30Form()" @endif>Redeem for 30 points</a>
                </div>

                <form action="{{ route('customizeUser.rewardsThree') }}" id="reddomForm30" method="POST">
                    @csrf
                    @foreach($products as $product)
                        @if($product->name == 'Cheese Pizza')
                            <input type="hidden" name="pizza_id" value="{{ $product->id }}">
                        @endif
                    @endforeach
                    <input type="hidden" name="pizza_name" value="Specialty">
                </form>
            </div>
        </div>

        <!--// Modal for item -->

        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    @if(Auth::guest())
                            <div class="modal-body">
                                <p class="modal-p">You must be a registered user!</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                    @elseif(Auth::user()->points < 30)
                            <div class="modal-body">
                                <p class="modal-p">You do not have enough points. You have {{ Auth::user()->points }} point(s)!</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                    @endif
                </div>
            </div>
        </div>

    <!--// End of Modal -->



    <div class="col-12" id="image-two">
        <img class="img-fluid animated fadeInRight" src="{{ asset('user/image/povrcke2.png') }}">
    </div>
</div>






<div class="row" id="question">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <h2 class="text-center">FREQUENTLY ASKED QUESTIONS </h2>

        <p><a class="d-block w-100" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Who can join Triple A Rewards? </a></p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <ul>
                    <li>Any Triple A customer can join the Triple A Rewards program. All you need to do is create an account, click<a href="{{ route('register') }}" style="background: none; color: #e66001; border: none; margin-left: -10px; margin-right: -10px">here</a>to get started. </li>
                </ul>
            </div>
        </div>

        <p><a class="d-block w-100" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">How do I earn points?</a></p>
        <div class="collapse" id="collapseExample1">
            <div class="card card-body">
                <ul>
                    <li>Sign into your Triple A account</li>
                    <li>Earn 1 point for every $8 you spend online (before tax and delivery).</li>
                    <li>To earn points you must order online.</li>
                </ul>
            </div>
        </div>

        <p><a class="d-block w-100" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">How do I redeem my points? </a></p>
        <div class="collapse" id="collapseExample2">
            <div class="card card-body">
                <ul>
                    <li>Go to “My Account,” view the available rewards and then click redeem on the one you want. </li>
                </ul>
            </div>
        </div>
    </div>
</div>



</div>
</div>
</div> <!-- // End of the Container-fluid -->

@include('user.layouts.footer')

@include('user.layouts.script')
<script>
    function submit15Form() {
        $("#reddomForm15").submit();
    }
    function submit25Form() {
        $("#reddomForm25").submit();
    }
    function submit30Form() {
        $("#reddomForm30").submit();
    }
    
</script>

</body>
</html>