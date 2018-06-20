<!DOCTYPE html>
<html>

<head lang="en">
    <title>Profile</title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/my-favorites.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/sign-up.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/your-cart.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/footer.css') }}">


    <link href="{{ asset('user/assets/library/fontawesome/web-css/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/assets/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('user/assets/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('user/assets/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #card_number_valid::-webkit-inner-spin-button {
            display: none;
        }
        #cvv::-webkit-inner-spin-button {
            display: none;
        }
    </style>
</head>

<body>
<div class="container-fluid" id="container">
    @include('user.layouts.header')


    <div class="row">
        <div class="container">
            <div class="row" id="conn">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6" id="profile-info">
                    <h2>Profile Info</h2>
                    @if(session()->has('message_signup'))
                        <div class="alert alert-success" id="remove-alert" style="background-color: #e66001; color: white; border: none; text-align: center;">
                            {{ session('message_signup') }}
                        </div>
                    @endif

                    <form action="{{ route('favorite.changeInfo') }}" method="POST">
                        @csrf
                        <div class="row" id="profile-form">
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="fName">First Name<font color="#e66001">*</font></label>
                                <input class="form-control" type="text" name="first_name" id="fName" value="{{ Auth::user()->first_name }}" required="">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="lName">Last Name<font color="#e66001">*</font></label>
                                <input class="form-control" type="text" name="last_name" id="lName" value="{{ Auth::user()->last_name }}" required="">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="phone">Phone<font color="#e66001">*</font></label>
                                <input class="form-control" type="number" name="phone_number" id="phone" value="{{ Auth::user()->phone_number }}" required="">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="address">Street Name<font color="#e66001">*</font></label>
                                <input class="form-control" type="text" name="address" id="address" value="{{ Auth::user()->address }}" required="">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="address">Street Number<font color="#e66001">*</font></label>
                                <input class="form-control" type="text" name="street_number" id="address" value="{{ Auth::user()->street_number }}" required="">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="pCode">Postal Code<font color="#e66001">*</font></label>
                                <input class="form-control" type="text" name="postal_code" id="pCode" value="{{ Auth::user()->postal_code }}" required="">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="address">Buzzer</label>
                                <input class="form-control" type="text" name="buzzer" id="address" value="{{ Auth::user()->buzzer }}">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="pCode">Apartment Number</label>
                                <input class="form-control" type="text" name="apartment_number" id="pCode" value="{{ Auth::user()->apartment_number }}">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-12">
                                <label class="form-check-label chee" id="check-label">Send Me Emails
                                    <input class="form-check-input" id="email_status_checkbox" type="checkbox" @if(Auth::user()->email_status == 'Yes') checked @endif>
                                    <input type="hidden" value="{{ Auth::user()->email_status }}" name="email_status" id="email_status">
                                    <span class="checkmark"></span><br>
                                </label>
                                <p style="margin-top: 10px">Please check the box above to receive amazing offers from Triple A. Don’t worry, we won’t bombard you with emails. If you do not wish to receive our special offers, you can always opt out by unchecking the box in the profile section.</p>
                            </div>
                            <h3 style="margin-top: -25px; margin-left: 15px">Card Info</h3>
                            <div class="input-group col-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 15px">
                                <input class="form-control" type="number" name="credit_card_number" id="card_number_valid" placeholder="Credit/Debit Card Number" value="{{ decrypt(Auth::user()->credit_card_number) }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text payment-color" style="background-color: #e66001; border-color: #e66001"><i id="fa-ico" class="fa fa-credit-card" style="font-size:28px; width: 32px; color: white"></i></div>
                                </div>
                            </div>
                                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                                    <label for="Fname">Expiry Month</label>
                                    <select class="form-control" style="border: 1px solid #e66001" name="expiry_month" id="">
                                        <option value="01" @if(!Auth::guest())  @if(Auth::user()->expiry_month == '01') selected @endif @endif>01</option>
                                        <option value="02" @if(!Auth::guest())  @if(Auth::user()->expiry_month == '02') selected @endif @endif>02</option>
                                        <option value="03" @if(!Auth::guest())  @if(Auth::user()->expiry_month == '03') selected @endif @endif>03</option>
                                        <option value="04" @if(!Auth::guest())  @if(Auth::user()->expiry_month == '04') selected @endif @endif>04</option>
                                        <option value="05" @if(!Auth::guest())  @if(Auth::user()->expiry_month == '05') selected @endif @endif>05</option>
                                        <option value="06" @if(!Auth::guest())  @if(Auth::user()->expiry_month == '06') selected @endif @endif>06</option>
                                        <option value="07" @if(!Auth::guest())  @if(Auth::user()->expiry_month == '07') selected @endif @endif>07</option>
                                        <option value="08" @if(!Auth::guest())  @if(Auth::user()->expiry_month == '08') selected @endif @endif>08</option>
                                        <option value="09" @if(!Auth::guest())  @if(Auth::user()->expiry_month == '09') selected @endif @endif>09</option>
                                        <option value="10" @if(!Auth::guest())  @if(Auth::user()->expiry_month == '10') selected @endif @endif>10</option>
                                        <option value="11" @if(!Auth::guest())  @if(Auth::user()->expiry_month == '11') selected @endif @endif>11</option>
                                        <option value="12" @if(!Auth::guest())  @if(Auth::user()->expiry_month == '12') selected @endif @endif>12</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                                    <label for="Lname">Expiry Year</label>
                                    <select class="form-control" style="border: 1px solid #e66001" name="expiry_year" id="">
                                        <option value="35" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '35') selected @endif @endif>35</option>
                                        <option value="34" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '34') selected @endif @endif>34</option>
                                        <option value="33" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '33') selected @endif @endif>33</option>
                                        <option value="32" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '32') selected @endif @endif>32</option>
                                        <option value="31" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '31') selected @endif @endif>31</option>
                                        <option value="30" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '30') selected @endif @endif>30</option>
                                        <option value="29" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '29') selected @endif @endif>29</option>
                                        <option value="28" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '28') selected @endif @endif>28</option>
                                        <option value="27" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '27') selected @endif @endif>27</option>
                                        <option value="26" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '26') selected @endif @endif>26</option>
                                        <option value="25" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '25') selected @endif @endif>25</option>
                                        <option value="24" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '24') selected @endif @endif>24</option>
                                        <option value="23" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '23') selected @endif @endif>23</option>
                                        <option value="22" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '22') selected @endif @endif>22</option>
                                        <option value="21" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '21') selected @endif @endif>21</option>
                                        <option value="20" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '20') selected @endif @endif>20</option>
                                        <option value="19" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '19') selected @endif @endif>19</option>
                                        <option value="18" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '18') selected @endif @endif>18</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                                    <label>CVV</label>
                                    <input class="form-control" type="number" name="cvv" id="cvv" @if(!Auth::guest()) @if(Auth::user()->cvv) value="{{ decrypt(Auth::user()->cvv) }}" @endif @endif >
                                </div>

                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                                <button class="btn btn-default" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6" id="profile-info-two">
                    <div class="row">
                        <div class="col-12" id="my-points">
                            <h2>My Points</h2>
                            <br>
                            <h4 style="margin-bottom: 17px"><b>You have earned <font color="#e66001">{{ Auth::user()->points }}</font> points!</b></h4>
                            <p>Click <a href="{{ route('rewards') }}" style="text-decoration: none; color: #e66001">here</a> to see what you can purchase with your bonus points!</p>
                            <p>You will also get 10 bonus points for your birthday.</p>
                            <div class="row" id="rewards" style="margin-top: -10px">
                                <div class="offset-1 col-10 offset-sm-1 col-sm-10 offset-md-0 col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-body" id="card-body">
                                            <h5 class="card-title text-center">Desserts</h5>
                                        </div>
                                        <img class="img-fluid" src="{{ asset('user/image/desert-icon.jpg') }}">
                                        <div class="card-body text-center">
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">Redeem for 10 points</a>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <div class="offset-1 col-10 offset-sm-1 col-sm-10 offset-md-0 col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-body" id="card-body">
                                            <h5 class="card-title text-center">Medium 2-Topping</h5>
                                        </div>
                                        <img class="img-fluid" src="{{ asset('user/image/pizza-icon.jpg') }}">
                                        <div class="card-body text-center">
                                            <a href="#" class="btn btn-primary" @if(Auth::guest()) data-toggle="modal" data-target=".pizza2" @elseif(Auth::user()->points < 15) data-toggle="modal" data-target=".pizza2" @else onclick="submit15Form()" @endif>Redeem for 15 points</a>
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

                                    <div class="modal fade pizza2" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                </div>
                                <div class="offset-1 col-10 offset-sm-1 col-sm-10 offset-md-0 col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-body" id="card-body">
                                            <h5 class="card-title text-center">Large 3-Topping</h5>
                                        </div>
                                        <img class="img-fluid" src="{{ asset('user/image/pizza-icon.jpg') }}">
                                        <div class="card-body text-center">
                                            <a href="#" class="btn btn-primary" @if(Auth::guest()) data-toggle="modal" data-target=".pizza3" @elseif(Auth::user()->points < 25) data-toggle="modal" data-target=".pizza3" @else onclick="submit25Form()" @endif>Redeem for 25 points</a>
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

                                    <!--// Modal for item -->

                                    <div class="modal fade pizza3" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                </div>
                                <div class="offset-1 col-10 offset-sm-1 col-sm-10 offset-md-0 col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-body" id="card-body">
                                            <h5 class="card-title text-center">Specialty</h5>
                                        </div>
                                        <img class="img-fluid" src="{{ asset('user/image/pizza-icon.jpg') }}">
                                        <div class="card-body text-center">
                                            <a href="#" class="btn btn-primary" @if(Auth::guest()) data-toggle="modal" data-target=".pizza4" @elseif(Auth::user()->points < 30) data-toggle="modal" data-target=".pizza4" @else onclick="submit30Form()" @endif>Redeem for 30 points</a>
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

                                    <div class="modal fade pizza4" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-12" id="my-favorites">
                            <h2>My Favorites</h2>
                            <div class="col-12" id="success-alert" style="display:none;">
                                <div class="alert alert-success" style="background-color: #e66001; color: white; border: none; text-align: center;">
                                    Successfully added to your order.
                                </div>
                            </div>
                            <div class="col-12" id="success-delete-alert" style="display:none;">
                                <div class="alert alert-success" style="background-color: #e66001; color: white; border: none; text-align: center;">
                                    Successfully deleted this favorite.
                                </div>
                            </div>
                            <div class="row" id="li_favorites">
                                @foreach($favorites as $favorite)
                                        <div class="col-12" id="item" style="border: none;">
                                            <form action="{{ route('favorite.add') }}" method="POST">
                                                @csrf
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><b>{{ $favorite->identifier }}</b></li>
                                                    <li class="list-inline-item"><b>${{ $favorite->price }}</b></li>
                                                    <input type="hidden" name="identifier" id="identifier" value="{{ $favorite->identifier }}">
                                                    <input type="hidden" name="id" id="id_user" value="{{ Auth::user()->id }}">
                                                    <li class="list-inline-item text-right"><button class="btn btn-default" type="button" onclick="addFavorites('{{ $favorite->identifier }}','{{ Auth::user()->id }}')">Add to Your Order</button> <button class="btn btn-default" style="margin-top: 5px; padding-left: 16px; padding-right: 16px;" type="button" data-toggle="modal" data-target=".fav_re_{{ $favorite->identifier }}">Remove Favorite</button></li>
                                                </ul>

                                                <!-- Modal for remove All products -->
                                                <div class="modal fade fav_re_{{ $favorite->identifier }}" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <p class="modal-p">Do you really want to delete this favorite?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" id="remove_product_button" class="btn btn-secondary" data-dismiss="modal" onclick="DeleteFavorite('{{ $favorite->identifier }}','{{ $favorite->id }}')">Delete</button>
                                                                <button type="button" id="add_cart" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Delete Modal -->
                                                <div class="line"></div>
                                            </form>
                                        </div>
                                @endforeach
                                @if($favorites->count() > 0)
                                    <div class="col-12">
                                        <nav aria-label="..." style="margin-top: 30px; margin-left: 15px;">
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $favorites->previousPageUrl() }}" tabindex="-1">Previous</a>
                                                </li>
                                                @for($i=1;$i < number_format($favorites->total() / 3 + 2); $i++)
                                                    <li class="page-item"><a class="page-link" href="{{ $favorites->url($i) }}">{{ $i }}</a></li>
                                                @endfor
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $favorites->nextPageUrl() }}">Next</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    @else
                                        <div class="col-12">
                                            <div class="alert alert-success" id="remove-alert" style="background-color: #e66001; color: white; border: none; text-align: center;">
                                                You don't have any favorites!
                                            </div>
                                        </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row" id="change-forms">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6" id="left-change-form">
                    <h2>Change Password</h2>
                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                            <form action="{{ route('favorite.changePassword') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="current_password" value="{{ Auth::user()->password }}">
                                <label for="passwordOne">Enter Current Password</label>
                                <input class="form-control" type="password" name="old_password" id="passwordOne" required="">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                            <label for="passwordTwo">Enter New Password</label>
                            <input class="form-control" type="password" name="new_password" id="passworTwo" required="">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-default">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-sm-12 col-md-6 col-lg-6" id="right-change-form">
                    <h2>Change Email</h2>
                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                            <form action="{{ route('favorite.changeEmail') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <label for="emailOne">Enter Current Email</label>
                                <input class="form-control" type="email" name="old_email" id="emailOne" required="">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                            <label for="emailTwo">Enter New Email</label>
                            <input class="form-control" type="email" name="new_email" id="emailTwo" required="">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-default">Change Email</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

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

        function addFavorites(identifier,id) {

            $.post('/my-favorites/add', {'identifier': identifier,'_token': $('input[name=_token]').val()}, function (data) {
                //alert('yes');

                $("#success-alert").slideDown(300);
                setTimeout(function(){ $("#success-alert").slideUp(200); }, 2000);

                $("#mycart-li-2").load(location.href + " #mycart-li-2");
                $("#mycart-li-1").load(location.href + " #mycart-li-1");
                $("#mycart-li-3").load(location.href + " #mycart-li-3");
                $("#mycart-li-4").load(location.href + " #mycart-li-4");


            });
        }
        function DeleteFavorite(identifier,id) {

            $.post('/my-favorites/delete', {'id': id,'identifier': identifier,'_token': $('input[name=_token]').val()}, function (data) {
                //alert('yes');
                //alert(data);

                $("#li_favorites").html('');
                $("#li_favorites").html(data);


                $("#success-delete-alert").slideDown(300);
                setTimeout(function(){ $("#success-delete-alert").slideUp(200); }, 2000);

            });
        }
        $(document).ready(function () {

            $("#email_status_checkbox").click(function () {

                if ($('#email_status_checkbox').is(":checked"))
                {
                    $("#email_status").val('Yes');
                } else {
                    $("#email_status").val('None');
                }
            });

            $("#cvv").keyup(function () {
                var cvv = $("#cvv").val();
                if (cvv.length >= 4) {
                    $("#cvv").attr('type', 'text');
                    $("#cvv").attr('maxlength', '4');
                } else {
                    $("#cvv").attr('type', 'number');
                }
            });

            $("#card_number_valid").keyup(function () {
                var card = $("#card_number_valid").val();
                if (card.length >= 19) {
                    $("#card_number_valid").attr('type', 'text');
                    $("#card_number_valid").attr('maxlength', '19');
                } else {
                    $("#card_number_valid").attr('type', 'number');
                }

                if (card.charAt(0) == '4') {
                    $("#fa-ico").attr('class', 'fa fa-cc-visa');
                    $(".payment-color").css({'background-color': '#01181e', 'border-color': '#01181e'});
                    if (card.length >= 19) {
                        $("#card_number_valid").attr('type', 'text');
                        $("#card_number_valid").attr('maxlength', '19');
                    } else {
                        $("#card_number_valid").attr('type', 'number');
                    }

                } else if (card.substr(0, 2) == '51' || card.substr(0, 2) == '52' || card.substr(0, 2) == '53' || card.substr(0, 2) == '54' || card.substr(0, 2) == '55') {
                    $("#fa-ico").attr('class', 'fa fa-cc-mastercard');
                    $(".payment-color").css({'background-color': '#01181e', 'border-color': '#01181e'});
                    if (card.length >= 16) {
                        $("#card_number_valid").attr('type', 'text');
                        $("#card_number_valid").attr('maxlength', '16');
                    } else {
                        $("#card_number_valid").attr('type', 'number');
                    }
                } else if (card.substr(0, 2) == '22' || card.substr(0, 2) == '23' || card.substr(0, 2) == '24' || card.substr(0, 2) == '25' || card.substr(0, 2) == '26' || card.substr(0, 2) == '27') {
                    $("#fa-ico").attr('class', 'fa fa-cc-mastercard');
                    $(".payment-color").css({'background-color': '#01181e', 'border-color': '#01181e'});
                    if (card.length >= 16) {
                        $("#card_number_valid").attr('type', 'text');
                        $("#card_number_valid").attr('maxlength', '16');
                    } else {
                        $("#card_number_valid").attr('type', 'number');
                    }
                } else if (card.substr(0, 4) == '6011') {
                    $("#fa-ico").attr('class', 'fa fa-cc-discover');
                    $(".payment-color").css({'background-color': '#01181e', 'border-color': '#01181e'});
                    if (card.length >= 16) {
                        $("#card_number_valid").attr('type', 'text');
                        $("#card_number_valid").attr('maxlength', '16');
                    } else {
                        $("#card_number_valid").attr('type', 'number');
                    }
                } else if (card.substr(0, 2) == '34' || card.substr(0, 2) == '37') {
                    $("#fa-ico").attr('class', 'fa fa-cc-amex');
                    $(".payment-color").css({'background-color': '#01181e', 'border-color': '#01181e'});
                    if (card.length >= 15) {
                        $("#card_number_valid").attr('type', 'text');
                        $("#card_number_valid").attr('maxlength', '15');
                    } else {
                        $("#card_number_valid").attr('type', 'number');
                    }
                } else {
                    $("#fa-ico").attr('class', 'fa fa-credit-card');
                    $(".payment-color").css({'background-color': '#e66001', 'border-color': '#e66001'});
                    if (card.length >= 19) {
                        $("#card_number_valid").attr('type', 'text');
                        $("#card_number_valid").attr('maxlength', '19');
                    } else {
                        $("#card_number_valid").attr('type', 'number');
                    }
                }
            });

        });


    </script>

</body>
</html>