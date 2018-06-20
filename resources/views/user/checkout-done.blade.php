@extends('user.layouts.app')
@section('title-part')
    <title>Checkout Done</title>
@show
@section('head-part')
    <style>
        #card_number_valid::-webkit-inner-spin-button {
            display: none;
        }
        #cvv::-webkit-inner-spin-button {
            display: none;
        }
    </style>
    @endsection
@section('body-part')


    <div class="row" id="check">
        <div class="col-12">
            <h1 class="text-center">CHECK OUT</h1>
            <p class="text-center">You are almost done!</p>
        </div>
    </div>

    <form action="{{ route('makeOrder') }}" method="POST">
        @csrf
    <div class="row">
        <div class="container" id="che">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6" id="left-check">

                    <div class="row">

                        @if($order_type == 'Delivery')
                            <div class="col-12">
                                <h2 style="margin-bottom: 20px">Delivery Address</h2>
                                <p>{{ $city }} {{ $street }}</p>
                                <p>{{ $buzzer }}</p>
                                <p>{{ $apartment_number }}</p>
                                <p>{{ $postal_code }}</p>
                                @if($order_time_type == 'Order For Later')
                                    <p>{{ $order_time }}</p>
                                @endif
                                <div class="line"></div>
                            </div>
                        @elseif($order_type == 'Pick up')
                            <div class="col-12">
                                <h2 style="margin-bottom: 20px">Pick-Up Address</h2>
                                <p>6279 Jubilee Road Halifax, Nova Scotia</p>
                                <p>902-406-8888</p>
                                @if($order_time_type == 'Order For Later')
                                    <p>Order For Later: {{ $order_time }}</p>
                                @endif
                                <div class="line"></div>
                            </div>
                        @endif
                            <div class="col-12">
                                <h2 style="margin-bottom: 20px">Contact & Payment Information</h2>
                                <p>{{ $fName }} {{ $lName }}</p>
                                <p>{{ $email }}</p>
                                <p>{{ $pNumber }}</p>
                                <div class="line"></div>
                                <button type="button" onclick="EditInfo()" style="background: none; border: none; cursor: pointer; margin-bottom: 20px; margin-top: 20px" id="EditCheckout">Edit your Personal Info</button>
                            </div>
                    </div>

                    <div class="row" id="current-cart">
                        <br>
                        <div class="col-12 cart-item">
                            <h2 style="margin-bottom: 20px">Your Cart</h2>
                                @foreach(Cart::content() as $item)
                                    <h4 class="text-left pizza-name">@if($item->options->used_points != '0' and $item->options->used_points != '15' and $item->options->used_points != '25' and $item->options->used_points != '30')  @else Customized @endif {{ $item->name }} @if($item->options->description_special) - {{ $item->options->description_special }} @endif</h4>
                                <p class="text-left">
                                    @if($item->options->product_category == 'Pizza')
                                        @if($item->options->used_points != '0' and $item->options->used_points != '15' and $item->options->used_points != '25' and $item->options->used_points != '30')
                                            @if($item->options->descriptions){{ $item->options->descriptions }}<br>@endif
                                        @endif
                                    @endif
                                    @if($item->options->product_category != 'Chicken' and $item->options->product_category != 'Chicken Wings' and $item->options->product_category != 'Sauces' and $item->options->product_category != 'Sandwiches' and $item->options->product_category != 'Desserts' and $item->options->product_category != 'Munchies' and $item->options->product_category != 'Drinks' and $item->options->product_category != 'Calzones' and $item->options->product_category != 'Special') Size: {{ strtoupper($item->options->size) }}<br>@endif
                                    @if($item->options->choose_calzones) Oven Baked or Deep-Fried: {{ $item->options->choose_calzones }}<br> @endif
                                    @if($item->options->donairs_topping) Toppings: {{ substr($item->options->donairs_topping,0,-2) }}<br> @endif
                                    @if($item->options->cheese_size) Extra Cheese: {{ $item->options->cheese_size }}<br> @endif
                                    @if($item->options->meat_size) Extra Meat: {{ $item->options->meat_size }}<br> @endif
                                    @if($item->options->peppers) Extra Peppers: {{ substr($item->options->peppers,0,-2) }}<br> @endif
                                    @if($item->options->donair_size) Donair Sauce: {{ $item->options->donair_size }}<br> @endif
                                    @if($item->options->product_category == 'Seafood') @if($item->options->extra_piece) Extra Piece: Yes<br> @else Extra Piece: No<br> @endif @endif
                                        @if($item->options->one_souce_chicken) Sauce: {{ substr($item->options->one_souce_chicken,0,-2) }}<br> @endif
                                    @if($item->options->product_category == 'Chicken Wings')  @if($item->options->more_souce_chicken) Extra Sauces: {{ substr($item->options->more_souce_chicken,0,-2) }}<br> @endif @endif
                                    @if($item->options->product_category == 'Chicken') @if($item->options->more_souce_chicken) Additional Sauces: {{ substr($item->options->more_souce_chicken,0, -2) }}<br> @endif @endif
                                    @if($item->options->product_category == 'Chicken Wings' or $item->options->product_category == 'Chicken') @if($item->options->homemade_garlic_souce) Homemade Garlic Sauce: Yes<br> @else Homemade Garlic Sauce: No<br> @endif @endif
                                    @if($item->options->options_for_souce) Option for Sauce: {{ $item->options->options_for_souce }}<br> @endif
                                    @if($item->options->crust) Crust: {{ $item->options->crust }}<br> @endif
                                    @if($item->options->crust_type) Crust Type: {{ $item->options->crust_type }}<br> @endif
                                    @if($item->options->cheeses_name) Cheese: @foreach($item->options->cheeses_name as $topping) {{ $topping }},  @endforeach <br> @endif
                                    @if($item->options->meats_name) Meats: @foreach($item->options->meats_name as $topping) {{ $topping }},  @endforeach <br> @endif
                                    @if($item->options->veggies_name) Veggies: @foreach($item->options->veggies_name as $topping) {{ $topping }},  @endforeach <br> @endif
                                    @if($item->options->specify_text) Special Instructions: {{ $item->options->specify_text }}<br> @endif
                                    @if($item->options->product_category == 'Special')
                                            @if($item->options->pizza1special) {{ $item->options->pizza1special }} <br>@endif
                                            @if($item->options->toppingpizza1special) Toppings: {{ substr($item->options->toppingpizza1special,0,-2) }} <br>@endif
                                            @if($item->options->pizza2special) {{ $item->options->pizza2special }} <br>@endif
                                            @if($item->options->toppingpizza2special) Toppings: {{ substr($item->options->toppingpizza2special,0,-2) }} <br>@endif
                                        @if($item->options->product3special) {{ $item->options->product3special }} <br>@endif
                                        @if($item->options->product4special) {{ $item->options->product4special }} <br>@endif
                                        @if($item->options->one_souce_chicken_special) Sauce: {{ $item->options->one_souce_chicken_special }} <br>@endif
                                                @if($item->options->more_souce_chicken_special) Extra Sauce: {{ substr($item->options->more_souce_chicken_special,0,-2) }} <br>@endif
                                        @if($item->options->product5special) {{ $item->options->product5special }} <br>@endif
                                        @if($item->options->product6special) {{ $item->options->product6special }} <br>@endif
                                    @endif
                                </p>
                                    <form action="#" method="POST">
                                        <div class="input-group">
                                            <input type="hidden" name="id" value="2">
                                            <ul class="list-inline">
                                                <li class="list-inline-item" style="width: 80px;"><input class="form-control" type="number" name="quntity" value="{{ $item->qty }}" disabled></li>
                                                <li class="list-inline-item" style="margin-left: 10px;">${{ number_format($item->price * $item->qty,2) }}</li>
                                            </ul>
                                        </div>
                                    </form>
                                    <div class ="line"></div>
                                @endforeach
                        </div>
                    </div>
                    <input type="hidden" name="name" value="{{ $fName }} {{ $lName }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="order_time_type" value="{{ $order_time_type }}">
                    <input type="hidden" name="order_time" value="{{ $order_time }}">
                    <input type="hidden" name="phone" value="{{ $pNumber }}">
                    <input type="hidden" name="address" value="{{ $street }}">
                    <input type="hidden" name="buzzer" value="{{ $buzzer }}">
                    <input type="hidden" name="apartment_number" value="{{ $apartment_number }}">
                    <input type="hidden" name="street_number" value="{{ $city }}">
                    <input type="hidden" name="postal_code" value="{{ $postal_code }}">
                    <input type="hidden" name="order_type" value="{{ $order_type }}">
                    <input type="hidden" name="specify_text_order" value="{{ $specify_text_order }}">
                    <input type="hidden" name="total_price" value="{{ Cart::total() + $delivery_free }}">


                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-5 offset-lg-1" id="right-check">
                    @if($payment == 'COD')
                        <div id="item" class="text-center">
                            <button class="btn btn-default">Place Your Order</button>
                            <table class="table">
                                <tr>
                                    <td class="text-left">Service Charge</td>
                                    <td class="text-right">$0.95</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Subtotal</td>
                                    <td class="text-right">${{ Cart::subtotal() }}</td>
                                </tr>
                                @if($order_type != 'Pick up')
                                <tr>
                                    <td class="text-left">Delivery Fee</td>
                                    <td class="text-right">${{ number_format($delivery_free,2) }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="text-left">Estimated Tax</td>
                                    <td class="text-right">${{ Cart::tax() }}</td>
                                </tr>
                            </table>
                            <div id="linee"></div>
                            <table class="table">
                                <tr>
                                    <td class="text-left"><h3>Total</h3></td>
                                    @if($order_type == 'Delivery')
                                        <td class="text-right"><h3>${{ number_format(Cart::total() + $delivery_free,2) }}</h3></td>
                                    @else
                                        <td class="text-right"><h3>${{ Cart::total() }}</h3></td>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    @else
                        <form action="{{ route('onlinePayment') }}" method="POST" id="online-payment-form">
                            <div id="item" class="text-center">
                                <h3>Payment Details</h3>
                                <h5 class="text-center">
                                    <i class="fa fa-cc-visa" style="font-size:36px; color: #01181e;"></i>
                                    <i class="fa fa-cc-mastercard" style="font-size:36px; color: #01181e;"></i>
                                    <i class="fa fa-cc-discover" style="font-size:36px; color: #01181e;"></i>
                                    <i class="fa fa-cc-amex" style="font-size:36px; color: #01181e;"></i>
                                </h5>
                                @if($messageError)
                                    <div class="alert alert-success" id="remove-alert" style="background-color: #e66001; color: white; border: none; text-align: center;">
                                        {{ $messageError }}
                                    </div>
                                @endif
                                <hr>
                                <table class="table">
                                    <tr>
                                            @csrf
                                            <div class="row">
                                                <div class="input-group col-12" style="margin-bottom: 15px">
                                                    <input class="form-control input-card" type="number" id="card_number_valid" name="card_number" placeholder="Valid Card Number" @if(!Auth::guest()) @if(Auth::user()->credit_card_number) value="{{ decrypt(Auth::user()->credit_card_number) }}" @endif @endif required>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text payment-color" style="background-color: #e66001; border-color: #e66001"><i id="fa-ico" class="fa fa-credit-card" style="font-size:28px; width: 32px; color: white"></i></div>
                                                    </div>
                                                </div>

                                                <div class="input-group col-4">
                                                    <select class="form-control" style="border: 1px solid #e66001" name="month" id="" required>
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
                                                <div class="input-group col-4">
                                                    <select class="form-control" style="border: 1px solid #e66001" name="year" id="" required>
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
                                                        <option value="18" @if(!Auth::guest())  @if(Auth::user()->expiry_year == '18') selected @endif @else selected @endif>18</option>
                                                    </select>
                                                </div>
                                                <div class="input-group col-4">
                                                    <input class="form-control input-card" type="number" id="cvv" name="cvd" placeholder="CVV"  @if(!Auth::guest()) @if(Auth::user()->cvv) value="{{ decrypt(Auth::user()->cvv) }}" @endif @endif required>
                                                </div>
                                                @if($order_type == 'Delivery')
                                                    <input type="hidden" name="total_price" value="{{ number_format(Cart::total() + $delivery_free,2) }}">
                                                @else
                                                    <input type="hidden" name="total_price" value="{{ Cart::total() }}">
                                                @endif
                                                <input type="hidden" name="fName" value="{{ $fName }}">
                                                <input type="hidden" name="lName" value="{{ $lName }}">
                                                <input type="hidden" name="name" value="{{ $fName }} {{ $lName }}">
                                                <input type="hidden" name="email" value="{{ $email }}">
                                                <input type="hidden" name="order_time_type" value="{{ $order_time_type }}">
                                                <input type="hidden" name="order_time" value="{{ $order_time }}">
                                                <input type="hidden" name="phone" value="{{ $pNumber }}">
                                                <input type="hidden" name="address" value="{{ $street }}">
                                                <input type="hidden" name="buzzer" value="{{ $buzzer }}">
                                                <input type="hidden" name="apartment_number" value="{{ $apartment_number }}">
                                                <input type="hidden" name="street_number" value="{{ $city }}">
                                                <input type="hidden" name="postal_code" value="{{ $postal_code }}">
                                                <input type="hidden" name="order_type" value="{{ $order_type }}">
                                                <input type="hidden" name="specify_text_order" value="{{ $specify_text_order }}">
                                                <input type="hidden" name="payment" value="{{ $payment }}">
                                                <input type="hidden" name="delivery_free" value="{{ $delivery_free }}">
                                            </div>
                                    </tr>
                                </table>

                                <div id="linee"></div>
                                <table class="table">
                                    <tr>
                                        <td class="text-left"><h3>Total <p id="log"></p></h3></td>
                                        @if($order_type == 'Delivery')
                                            <td class="text-right"><h3>${{ number_format(Cart::total() + $delivery_free,2) }}</h3></td>
                                        @else
                                            <td class="text-right"><h3>${{ Cart::total() }}</h3></td>
                                        @endif
                                    </tr>
                                </table>
                                <button type="submit" class="btn btn-default submit-payment" @if(Auth::guest()) disabled @endif>Place Your Order</button>
                            </div>
                        </form>
                        @endif
                    @if(!Auth::guest())
                        <br>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12" id="points">
                            <p class="text-center">With this purchase you will earn {{ intval(Cart::total() / 8) }} points</p>
                        </div>
                    @endif

                </div>
            </div>
            <div id="lineee"></div>
        </div>
    </div>

    </form>

    <form action="{{ route('preCheckoutEdit') }}" id="edit-info-form" method="POST">
        @csrf
        <input type="hidden" name="fName" value="{{ $fName }}">
        <input type="hidden" name="lName" value="{{ $lName }}">
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="order_time_type" value="{{ $order_time_type }}">
        <input type="hidden" name="order_time" value="{{ $order_time }}">
        <input type="hidden" name="phone" value="{{ $pNumber }}">
        <input type="hidden" name="address" value="{{ $street }}">
        <input type="hidden" name="buzzer" value="{{ $buzzer }}">
        <input type="hidden" name="apartment_number" value="{{ $apartment_number }}">
        <input type="hidden" name="street_number" value="{{ $city }}">
        <input type="hidden" name="postal_code" value="{{ $postal_code }}">
        <input type="hidden" name="order_type" value="{{ $order_type }}">
        <input type="hidden" name="specify_text_order" value="{{ $specify_text_order }}">
        <input type="hidden" name="payment" value="{{ $payment }}">
    </form>
    @endsection
@section('script-part')
    <script>

        function EditInfo() {
            $("#edit-info-form").submit();
        }
        function OnlinePayment() {
            $("#online-payment-form").submit();
        }

        $(document).ready(function () {

            $("#cvv").keyup(function () {
                var cvv = $("#cvv").val();
                if (cvv.length >= 4) {
                    $("#cvv").attr('type','text');
                    $("#cvv").attr('maxlength','4');
                } else {
                    $("#cvv").attr('type','number');
                }
            });
            $(".input-card").keyup(function () {

                var card = $("#card_number_valid").val();
                var cvv = $("#cvv").val();
                if (card.length >= 19) {
                    $("#card_number_valid").attr('type','text');
                    $("#card_number_valid").attr('maxlength','19');
                } else {
                    $("#card_number_valid").attr('type','number');
                }

                if (card.charAt(0) == '4') {
                    $("#fa-ico").attr('class','fa fa-cc-visa');
                    $(".payment-color").css({'background-color':'#01181e','border-color':'#01181e'});
                    if (card.length >= 19) {
                        $("#card_number_valid").attr('type','text');
                        $("#card_number_valid").attr('maxlength','19');
                    } else {
                        $(".submit-payment").prop('disabled',true);
                        $("#card_number_valid").attr('type','number');
                    }

                    if (card.length == 13 && cvv.length >= 3) {
                        $(".submit-payment").prop('disabled',false);
                    } else if (card.length == 16 && cvv.length >= 3) {
                        $(".submit-payment").prop('disabled',false);
                    } else if (card.length == 19 && cvv.length >= 3) {
                        $(".submit-payment").prop('disabled',false);
                    } else if(cvv.length < 3) {
                        $(".submit-payment").prop('disabled',true);
                    }

                } else if (card.substr(0,2) == '51' || card.substr(0,2) == '52' || card.substr(0,2) == '53' || card.substr(0,2) == '54' || card.substr(0,2) == '55') {
                    $("#fa-ico").attr('class','fa fa-cc-mastercard');
                    $(".payment-color").css({'background-color':'#01181e','border-color':'#01181e'});
                    if (card.length >= 16) {
                        $("#card_number_valid").attr('type','text');
                        $("#card_number_valid").attr('maxlength','16');
                    } else {
                        $(".submit-payment").prop('disabled',true);
                        $("#card_number_valid").attr('type','number');
                    }

                    if (card.length == 16 && cvv.length >= 3) {
                        $(".submit-payment").prop('disabled',false);
                    } else if (cvv.length < 3) {
                        $(".submit-payment").prop('disabled',true);
                    }

                } else if (card.substr(0,2) == '22' || card.substr(0,2) == '23' || card.substr(0,2) == '24' || card.substr(0,2) == '25' || card.substr(0,2) == '26' || card.substr(0,2) == '27') {
                    $("#fa-ico").attr('class','fa fa-cc-mastercard');
                    $(".payment-color").css({'background-color':'#01181e','border-color':'#01181e'});
                    if (card.length >= 16) {
                        $("#card_number_valid").attr('type','text');
                        $("#card_number_valid").attr('maxlength','16');
                    } else {
                        $(".submit-payment").prop('disabled',true);
                        $("#card_number_valid").attr('type','number');
                    }

                    if (card.length == 16 && cvv.length >= 3) {
                        $(".submit-payment").prop('disabled',false);
                    } else if (cvv.length < 3) {
                        $(".submit-payment").prop('disabled',true);
                    }

                } else if (card.substr(0,4) == '6011' || card.substr(0,2) == '64' || card.substr(0,2) == '65') {
                    $("#fa-ico").attr('class','fa fa-cc-discover');
                    $(".payment-color").css({'background-color':'#01181e','border-color':'#01181e'});
                    if (card.length >= 16) {
                        $("#card_number_valid").attr('type','text');
                        $("#card_number_valid").attr('maxlength','16');
                    } else {
                        $(".submit-payment").prop('disabled',true);
                        $("#card_number_valid").attr('type','number');
                    }

                    if (card.length == 16 && cvv.length >= 3) {
                        $(".submit-payment").prop('disabled',false);
                    } else if (cvv.length < 3) {
                        $(".submit-payment").prop('disabled',true);
                    }

                } else if (card.substr(0,2) == '34' || card.substr(0,2) == '37') {
                    $("#fa-ico").attr('class','fa fa-cc-amex');
                    $(".payment-color").css({'background-color':'#01181e','border-color':'#01181e'});
                    if (card.length >= 15) {
                        $("#card_number_valid").attr('type','text');
                        $("#card_number_valid").attr('maxlength','15');
                    } else {
                        $(".submit-payment").prop('disabled',true);
                        $("#card_number_valid").attr('type','number');
                    }

                    if (card.length == 15 && cvv.length >= 3) {
                        $(".submit-payment").prop('disabled',false);
                    } else if (cvv.length < 3) {
                        $(".submit-payment").prop('disabled',true);
                    }

                } else {
                    $(".submit-payment").prop('disabled',true);
                    $("#fa-ico").attr('class','fa fa-credit-card');
                    $(".payment-color").css({'background-color':'#e66001','border-color':'#e66001'});
                    if (card.length >= 19) {
                        $("#card_number_valid").attr('type','text');
                        $("#card_number_valid").attr('maxlength','19');
                    } else {
                        $("#card_number_valid").attr('type','number');
                    }
                }
            });

        });

    </script>

    @endsection