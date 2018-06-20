@extends('user.layouts.app')
@section('title-part')
    <title>Pre-Checkout</title>
@show

@section('body-part')

    <div class="row">
        <div class="container">
            <div class="row" id="sample-text">
                <div class="col-12">
                    <h1 class="text-center">PRE CHECKOUT</h1>
                </div>
            </div>
            @if(!Auth::guest())
            <div class="col-12" id="welcome">
                <ul class="list-inline">
                    <li class="list-inline-item text-left"><h2>Welcome Back, {{ Auth::user()->first_name }}!</h2></li>

                        <li class="list-inline-item text-right">Not {{ Auth::user()->first_name }}?
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                <button class="btn btn-primary">Sign Out</button>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </li>

                </ul>
            </div>
            @else
            <div class="col-12" id="welcome-one">
                <ul class="list-inline">
                    <li style="margin-left: -10px;" class="list-inline-item text-left"><h2>Tell us about yourself</h2></li>
                    <li class="list-inline-item text-right">If you don't have an account, sign up here.<span><a href="{{ route('register') }}"><button class="btn btn-default">Sign Up</button></a></span>  </li>
                </ul>
            </div>
            @endif
            <hr>

            @if(session()->has('message_signup'))
                <div class="alert alert-success" id="remove-alert" style="background-color: #e66001; color: white; border: none; text-align: center;">
                    {{ session('message_signup') }}
                </div>
            @endif
            <form action="{{ route('CheckoutDone') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-7 col-lg-7" id="form">
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="fName">First Name<font style="color: #e66001">*</font></label>
                                <input class="form-control" type="text" name="fName" id="fName" @if(!Auth::guest()) value="{{ Auth::user()->first_name }}" @endif required="">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="lName">Last Name<font style="color: #e66001">*</font></label>
                                <input class="form-control" type="text" name="lName" id="lName" @if(!Auth::guest()) value="{{ Auth::user()->last_name }}" @endif required="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="email">Email<font style="color: #e66001">*</font></label>
                                <input class="form-control" type="email" name="email" id="email" @if(!Auth::guest()) value="{{ Auth::user()->email }}" @endif required="">
                                <small>Enter a valid email address</small>
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="pNumber">Phone Number<font style="color: #e66001">*</font></label>
                                <input class="form-control" type="number" name="pNumber" id="pNumber" @if(!Auth::guest()) value="{{ Auth::user()->phone_number }}" @endif required="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 col-sm-12 col-md-7 col-lg-7" style="display: block;" id="store">
                        <div id="carryout">
                            <h3>Pick Up Address</h3>
                            <hr>
                            <p><b>Store</b></p>
                            <p>6279 Jubilee Road Halifax</p>
                            <p>Nova Scotia</p>
                            <p>902-406-8888 </p>
                            <hr style="margin-top: 0px;">
                        </div>
                        <div id="delivery" style="display:none;">
                        <h3>Delivery Address</h3>
                        <hr>
                            <div class="row">
                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="sName">Street Name<font style="color: #e66001">*</font></label>
                                    <input class="form-control" type="text" name="street" id="street" @if(!Auth::guest()) value="{{ Auth::user()->address }}" @endif disabled>
                                </div>
                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="sNumber">Street Number<font style="color: #e66001">*</font></label>
                                    <input class="form-control" type="number" name="city" id="city" @if(!Auth::guest()) value="{{ Auth::user()->street_number }}" @endif disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="buzzer">Buzzer</label>
                                    <input class="form-control" type="text" name="buzzer" id="buzzer" @if(!Auth::guest()) value="{{ Auth::user()->buzzer }}" @endif disabled>
                                </div>
                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="apartment_number">Apartment Number</label>
                                    <input class="form-control" type="text" name="apartment_number" id="apartment_number" @if(!Auth::guest()) value="{{ Auth::user()->apartment_number }}" @endif disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="pCode">Postal Code<font style="color: #e66001">*</font></label>
                                    <input class="form-control" type="text" name="postal_code" id="postal_code" @if(!Auth::guest()) value="{{ Auth::user()->postal_code }}" @endif disabled>
                                </div>
                            </div>
                            <hr style="margin-top: 0px;">
                        </div>

                        <nav aria-label="breadcrumb">
                            <ol style="background: #fff; padding-left: 0px; margin-bottom: 0px;" class="breadcrumb">
                                <li class="breadcrumb-item" id="button-carry" style="color: black;cursor: pointer;"><b>Change to Pick-Up (25 mins)</b></li>

                                    <li class="breadcrumb-item" style="color: gray;cursor: pointer;" @if(Cart::total() > 10) id="button-delivery" @else data-toggle="tooltip" data-placement="top" title="Delivery is available only for orders that are $10 or more." @endif><b>Change to Delivery (45-60 mins)</b></li>
                            </ol>
                        </nav>
                        <hr style="margin-top: 0px;">


                        <div id="for_later_div" style="display:none;">
                            <div class="row">
                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                    <label>Choose Date & Time</label>
                                    <div class="input-append date form_datetime" data-date="2018-04-21T15:25:00Z">
                                        <input class="form-control" id="for_later_date" name="order_time" type="text" value="" readonly disabled>
                                        <span class="add-on"><i class="icon-remove"></i></span>
                                        <span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input id="order_time_type" name="order_time_type" type="hidden" value="ASAP">

                        <nav aria-label="breadcrumb">
                            <ol style="background: #fff; padding-left: 0px; margin-bottom: 0px;" class="breadcrumb">
                                <li class="breadcrumb-item" id="asap" style="color: black;cursor: pointer;"><b>ASAP</b></li>

                                <li class="breadcrumb-item" style="color: gray;cursor: pointer;" id="for_later" data-toggle="tooltip" data-placement="top" title="Delivery is available only for orders that are $10 or more."><b>Order For Later</b></li>
                            </ol>
                        </nav>
                        <hr style="margin-top: 0px;">
                        <h3 style="margin-top: 45px">Payment Type</h3>
                        <hr style="margin-top: 0px;">

                        <div class="row extras" style="margin-top: 10px; margin-bottom: 20px">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <label class="form-check-label chee" id="check-label" for="defaultCheck10">Cash
                                    <input class="form-check-input" name="payment" type="radio" value="COD" id="defaultCheck10" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <label class="form-check-label chee" id="check-label" for="defaultCheck9">Credit/Debit Card
                                    <br>
                                    <i class="fa fa-cc-visa" style="font-size:36px; color: #01181e;"></i>
                                    <i class="fa fa-cc-mastercard" style="font-size:36px; color: #01181e;"></i>
                                    <i class="fa fa-cc-discover" style="font-size:36px; color: #01181e;"></i>
                                    <i class="fa fa-cc-amex" style="font-size:36px; color: #01181e;"></i>
                                    <input class="form-check-input" name="payment" type="radio" value="OnlinePayment" id="defaultCheck9">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <hr>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <label for=""><b>Leave A Note For Triple A</b></label>
                                <textarea class="form-control" style="border: 1px solid #e66001" name="specify_text_order" cols="60" rows="4" placeholder="ie: 'Knock on the side door' or 'Triple A is the best!'"></textarea>
                            </li>
                        </ul>

                    </div>

                </div>

                <div class="row" id="check">
                    <div class="col-12">
                        <button type="submit" style="margin-top: -15px" id="continue_form" class="btn btn-default">Continue to Checkout</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection

@section('script-part')

    <script type="text/javascript" src="{{ asset('/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap-datetimepicker.ca.js') }}" charset="UTF-8"></script>
    <script>
        $(document).ready(function () {
            $("#button-carry").click(function () {
                $("#carryout").show();
                $("#delivery").hide();
                $("#button-delivery").css({'color':'gray'});
                $("#button-carry").css({'color':'black'});
                $("#street").prop('disabled',true);
                $("#city").prop('disabled',true);
                $("#buzzer").prop('disabled',true);
                $("#apartment_number").prop('disabled',true);
                $("#postal_code").prop('disabled',true);
                $("#street").prop('required',false);
                $("#city").prop('required',false);
                $("#postal_code").prop('required',false);

            });
            $("#button-delivery").click(function () {
                $("#carryout").hide();
                $("#delivery").show();
                $("#button-delivery").css({'color':'black'});
                $("#button-carry").css({'color':'gray'});
                $("#street").prop('disabled',false);
                $("#city").prop('disabled',false);
                $("#buzzer").prop('disabled',false);
                $("#apartment_number").prop('disabled',false);
                $("#postal_code").prop('disabled',false);
                $("#street").prop('required',true);
                $("#city").prop('required',true);
                $("#postal_code").prop('required',true);
            });
            $("#asap").click(function () {
                $("#for_later_div").hide();
                $("#for_later_date").prop('disabled',true);
                $("#asap").css({'color':'black'});
                $("#for_later").css({'color':'gray'});
                $("#order_time_type").val('ASAP');
            });
            $("#for_later").click(function () {
                $("#for_later_div").show();
                $("#for_later_date").prop('disabled',false);
                $("#asap").css({'color':'gray'});
                $("#for_later").css({'color':'black'});
                $("#order_time_type").val('Order For Later');
            });

            $(".form_datetime").datetimepicker({
                format: "dd MM yyyy - HH:ii P",
                showMeridian: true,
                autoclose: true,
                todayBtn: true
            });

            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    @endsection