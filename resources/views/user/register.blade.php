<!DOCTYPE html>
<html>

<head lang="en">
    <title>Sign Up</title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/sign-up.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/menu.css') }}">
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



    <div class="row" id="check">
        <div class="col-12">
            <h1 class="text-center" style="font-size: 3rem; font-weight: 100;">SIGN UP</h1>
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
        </div>
    </div>

    <div class="row">
        <div class="container">
            <form method="POST" action="{{ route('register') }}" id="form-signup">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6" id="left-check">
                        <h2>Tell Us About Yourself!</h2>
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="Fname">First Name<font color="#e66001">*</font></label>
                                <input class="form-control" type="text" name="firstName" id="Fname" required="">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="Lname">Last Name<font color="#e66001">*</font></label>
                                <input class="form-control" type="text" name="lastName" id="Lname" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="email">Send confirmation email to:</label>
                                <input class="form-control" type="email" name="email" id="email" required="">
                                <small>Enter a valid email address<font color="#e66001">*</font></small>
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="phone">Phone Number<font color="#e66001">*</font></label>
                                <input class="form-control" type="number" name="phoneNumber" id="phone" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="pwd">Create a password<font color="#e66001">*</font></label>
                                <input class="form-control" type="password" name="password" id="pwd" required="">
                                <small>Password must be at least 6 characters<font color="#e66001">*</font></small>
                            </div>
                        </div>
                        <h2>Payment Information</h2>

                        <div class="row">
                            <label for="credit_card_number" style="margin-left: 15px">Credit/Debit Card Number</label>
                            <div class="input-group col-12" style="margin-bottom: 15px">
                                <input class="form-control" type="number" name="credit_card_number" id="card_number_valid">
                                <div class="input-group-prepend">
                                    <div class="input-group-text payment-color" style="background-color: #e66001; border-color: #e66001"><i id="fa-ico" class="fa fa-credit-card" style="font-size:28px; width: 32px; color: white"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="Fname">Expiry Month</label>
                                <select class="form-control" style="border: 1px solid #e66001" name="expiry_month" id="">
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="Lname">Expiry Year</label>
                                <select class="form-control" style="border: 1px solid #e66001" name="expiry_year" id="">
                                    <option value="35">35</option>
                                    <option value="34">34</option>
                                    <option value="33">33</option>
                                    <option value="32">32</option>
                                    <option value="31">31</option>
                                    <option value="30">30</option>
                                    <option value="29">29</option>
                                    <option value="28">28</option>
                                    <option value="27">27</option>
                                    <option value="26">26</option>
                                    <option value="25">25</option>
                                    <option value="24">24</option>
                                    <option value="23">23</option>
                                    <option value="22">22</option>
                                    <option value="21">21</option>
                                    <option value="20">20</option>
                                    <option value="19">19</option>
                                    <option value="18" selected>18</option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                                <label>CVV</label>
                                <input class="form-control" type="number" name="cvv" id="cvv">
                            </div>
                        </div>
                    </div>

                    <script>

                        $('#example2').calendar({
                            type: 'date'
                        });

                    </script>


                    <div class="col-12 col-sm-12 col-md-6 col-lg-6" id="right-check">
                        <h2>Delivery Address</h2>
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="street">Street Name<font color="#e66001">*</font></label>
                                <input class="form-control" type="text" name="address" id="street" required="">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="streetNumber">Street Number<font color="#e66001">*</font></label>
                                <input class="form-control" type="number" name="street_number" id="streetNumber" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="buzzer">Buzzer</label>
                                <input class="form-control" type="text" name="buzzer" id="buzzer" required="">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="appNumber">Apartment Number</label>
                                <input class="form-control" type="text" name="apartment_number" id="appNumber" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="Pcode">Postal Code<font color="#e66001">*</font></label>
                                <input class="form-control" type="text" name="postal_code" id="Pcode" required="">
                            </div>
                        </div>
                        <label class="form-check-label chee" id="check-label">Send Me Emails
                            <input class="form-check-input" id="email_status_checkbox" type="checkbox" checked>
                            <input type="hidden" value="Yes" name="email_status" id="email_status">
                            <span class="checkmark"></span><br>
                        </label>
                        <p style="margin-top: 10px">Please check the box above to receive amazing offers from Triple A. Don’t worry, we won’t bombard you with emails. If you do not wish to receive our special offers, you can always opt out by unchecking the box in the profile section.</p>

                        <h2 style="margin-bottom: 0px; margin-top: 15px;" id="our-rewards">Our Rewards Program</h2>
                        <p style="margin-top: 1rem; margin-bottom: 0rem">Earn <b>FREE PIZZA</b> with our Rewards Program</p>
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12" id="points-date">	 <br>
                                <label for="date" style="margin-bottom: 1.3rem;">Enter your birthday and receive extra points for your special day!</label>
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="ui calendar" id="example2">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="date" name="birthday" class="form-control" id="birthday" aria-describedby="emailHelp" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" id="sign-up">
                            <button type="button" id="sign_upp" class="btn btn-default" data-toggle="modal" data-target="">Sign Up</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal fade" id="modal-birthday" tabindex="-1" role="dialog" aria-labelledby="modal-birthday" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p class="modal-p">To register you must be older than 13 years!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="line">

            </div>
        </div>
    </div>



</div>

@include('user.layouts.footer')

@include('user.layouts.script')
<script>

    $("#sign_upp").click(function () {
        var year = (new Date()).getFullYear();
        var birthday = $("#birthday").val();

        var year2 = (new Date(birthday)).getFullYear();

        if ($('#email_status_checkbox').is(":checked"))
        {
            $("#email_status").val('Yes');
        } else {
            $("#email_status").val('None');
        }

        if (year <= year2 + 13) {
            $('#sign_upp').attr('data-target','#modal-birthday');
        } else {
            $('#sign_upp').attr('data-target','');
            $('#form-signup').submit();
        }
    });

    $(document).ready(function () {
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