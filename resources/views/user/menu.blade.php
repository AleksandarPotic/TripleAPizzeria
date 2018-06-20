<!DOCTYPE html>
<html>

<head lang="en">
    @section('title-part')
        <title>Menu {{ $categoryName }}</title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/footer.css') }}">


    <link href="{{ asset('user/assets/library/fontawesome/web-css/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/assets/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('user/assets/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('user/assets/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</head>

@section('title-page')

@endsection
<body>
<div class="container-fluid" id="container">
    @include('user.layouts.header')

    <div class="row">
        <div class="col-12" id="contact-image" style="background-image: url({{ asset('/user/image/'.$categorySlug.'.jpg') }});">

        </div>
    </div>

    <div class="col-12 pizza">
        <h1 class="text-center">{{ strtoupper($categoryName) }}</h1>
    </div>
    @if(strtoupper($categoryName) == "SAUCES" or strtoupper($categoryName) == "DRINKS" or strtoupper($categoryName) == "MUNCHIES" or strtoupper($categoryName) == "DESSERTS")
    <div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3" id="item" style="margin-top: -20px; margin-bottom: 20px">
        <h6 class="text-center">DELIVERY ORDERS MUST BE A <font color="#e66001">MINIMUM OF $10 OF FOOD</font> (SAUCES, DRINKS, MUNCHIES & DESSERTS <font color="#e66001">DO NOT</font> COUNT AS FOOD).</h6>
    </div>
    @endif

    @if(strtoupper($categoryName) == "MUNCHIES")
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 justify-content-center text-center" id="buttons">
                    <button class="btn btn-primary active" id="chips" style="margin-left: 0px;">Large Chips</button>
                    <button class="btn btn-primary" id="chocolate">King Size Chocolate Bars</button>
                </div>
            </div>
        </div>
    @endif
    @if(strtoupper($categoryName) == "DESSERTS")

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 justify-content-center text-center" id="buttons">
                    <button class="btn btn-primary active" id="icecream" style="margin-left: 0px;">Homemade Ice Cream Sandwiches</button>
                    <button class="btn btn-primary" id="milk">Large MilkShakes</button>
                    <button class="btn btn-primary" id="mobilebutton">Haagen Dazs(500ml)</button>
                    <button class="btn btn-primary" id="ben">Ben & Jerry's(500ml)</button>
                </div>
            </div>
        </div>
    @endif
    <div class="row">

        <!-- Modal for remove All products -->
        <div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="SuccessAdd" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="modal-p">Sucessfully added to your order.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Modal -->

        <!-- Modal for remove All products -->
        <div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-labelledby="modal-error" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="modal-p">The quantity must be between 1 and 10!</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Modal -->

            @if(strtoupper($categoryName) == "APPETIZERS" or strtoupper($categoryName) == "PIZZA" or strtoupper($categoryName) == "CHICKEN" or strtoupper($categoryName) == "SUBS" or strtoupper($categoryName) == "SALADS" or strtoupper($categoryName) == "POUTINE" or strtoupper($categoryName) == "SEAFOOD" or strtoupper($categoryName) == "DRINKS" or strtoupper($categoryName) == "DONAIRS" or strtoupper($categoryName) == "NACHOS"
            or strtoupper($categoryName) == "CALZONES" or strtoupper($categoryName) == "GARLIC FINGERS" or strtoupper($categoryName) == "CHICKEN WINGS" or strtoupper($categoryName) == "SANDWICHES" or strtoupper($categoryName) == "WRAPS" or strtoupper($categoryName) == "BURGERS" or strtoupper($categoryName) == "SAUCES")

                    @foreach($products as $product)
                        @if($product->category_id == $categoryId)
                        <div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3" id="item">
                            <ul class="list-inline">
                                <li class="list-inline-item" @if($product->specialty) style="color: #e66001; font-size: 22px" @endif><b>{{ $product->name }}</b></li>
                                <li class="list-inline-item text-center price">$@if($product->small) {{ number_format($product->small,2) }} @elseif($product->price) {{ number_format($product->price,2) }} @elseif($product->platter) {{ number_format($product->platter,2) }} @endif</li>
                                <li class="list-inline-item text-right"><button class="btn btn-default" onclick="InfoId({{ $product->id }})" data-toggle="modal" data-target="#exampleModal1">Order now</button></li>
                            </ul>
                            <p>{{ $product->descriptions }}</p>
                            <div class="line"></div>
                        </div>
                        @endif
                    @endforeach
            @endif

                <!--// Modal for item -->

                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <p id="pop_up">

                            </p>
                        </div>
                    </div>
                </div>
        </div>

    @if(strtoupper($categoryName) == "MUNCHIES")

        <div id="chipss">
            @foreach($products as $product)
                @if($product->product_ctgy == 'Chips')
                    <div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3" id="item">
                        <ul class="list-inline">
                            <li class="list-inline-item"><b>{{ $product->name }}</b></li>
                            <li class="list-inline-item text-center price">$@if($product->small) {{ number_format($product->small,2) }} @elseif($product->price) {{ number_format($product->price,2) }} @elseif($product->platter) {{ number_format($product->platter,2) }} @endif</li>
                            <li class="list-inline-item text-right"><button class="btn btn-default" onclick="InfoId({{ $product->id }})" data-toggle="modal" data-target="#exampleModal1">Order now</button></li>
                        </ul>
                        <p>{{ $product->descriptions }}</p>
                        <div class="line"></div>
                    </div>
                @endif
            @endforeach
        </div>

        <div id="bars">
            @foreach($products as $product)
                @if($product->product_ctgy == 'Chocolate Bars')
                    <div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3" id="item">
                        <ul class="list-inline">
                            <li class="list-inline-item"><b>{{ $product->name }}</b></li>
                            <li class="list-inline-item text-center price">$@if($product->small) {{ number_format($product->small,2) }} @elseif($product->price) {{ number_format($product->price,2) }} @elseif($product->platter) {{ number_format($product->platter,2) }} @endif</li>
                            <li class="list-inline-item text-right"><button class="btn btn-default" onclick="InfoId({{ $product->id }})" data-toggle="modal" data-target="#exampleModal1">Order now</button></li>
                        </ul>
                        <p>{{ $product->descriptions }}</p>
                        <div class="line"></div>
                    </div>
                @endif
            @endforeach
        </div>

    @endif

    @if(strtoupper($categoryName) == "DESSERTS")

    <div id="icecreams">
        @foreach($products as $product)
            @if($product->product_ctgy == 'Homemade Ice Cream Sandwiches')
                <div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3" id="item">
                    <ul class="list-inline">
                        <li class="list-inline-item"><b>{{ $product->name }}</b></li>
                        <li class="list-inline-item text-center price">$@if($product->small) {{ number_format($product->small,2) }} @elseif($product->price) {{ number_format($product->price,2) }} @elseif($product->platter) {{ number_format($product->platter,2) }} @endif</li>
                        <li class="list-inline-item text-right"><button class="btn btn-default" onclick="InfoId({{ $product->id }})" data-toggle="modal" data-target="#exampleModal1">Order now</button></li>
                    </ul>
                    <p>{{ $product->descriptions }}</p>
                    <div class="line"></div>
                </div>
            @endif
        @endforeach
    </div>

    <div id="milkshakes">
        @foreach($products as $product)
            @if($product->product_ctgy == 'MilkShakes')
                <div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3" id="item">
                    <ul class="list-inline">
                        <li class="list-inline-item"><b>{{ $product->name }}</b></li>
                        <li class="list-inline-item text-center price">$@if($product->small) {{ number_format($product->small,2) }} @elseif($product->price) {{ number_format($product->price,2) }} @elseif($product->platter) {{ number_format($product->platter,2) }} @endif</li>
                        <li class="list-inline-item text-right"><button class="btn btn-default" onclick="InfoId({{ $product->id }})" data-toggle="modal" data-target="#exampleModal1">Order now</button></li>
                    </ul>
                    <p>{{ $product->descriptions }}</p>
                    <div class="line"></div>
                </div>
            @endif
        @endforeach
    </div>

    <div id="haagens">
        @foreach($products as $product)
            @if($product->product_ctgy == 'Haagen Dazs (500 ml)')
                <div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3" id="item">
                    <ul class="list-inline">
                        <li class="list-inline-item"><b>{{ $product->name }}</b></li>
                        <li class="list-inline-item text-center price">$@if($product->small) {{ number_format($product->small,2) }} @elseif($product->price) {{ number_format($product->price,2) }} @elseif($product->platter) {{ number_format($product->platter,2) }} @endif</li>
                        <li class="list-inline-item text-right"><button class="btn btn-default" onclick="InfoId({{ $product->id }})" data-toggle="modal" data-target="#exampleModal1">Order now</button></li>
                    </ul>
                    <p>{{ $product->descriptions }}</p>
                    <div class="line"></div>
                </div>
            @endif
        @endforeach
    </div>

    <div id="bens">
        @foreach($products as $product)
            @if($product->product_ctgy == "Ben & Jerry's (500 ml)")
                <div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3" id="item">
                    <ul class="list-inline">
                        <li class="list-inline-item"><b>{{ $product->name }}</b></li>
                        <li class="list-inline-item text-center price">$@if($product->small) {{ number_format($product->small,2) }} @elseif($product->price) {{ number_format($product->price,2) }} @elseif($product->platter) {{ number_format($product->platter,2) }} @endif</li>
                        <li class="list-inline-item text-right"><button class="btn btn-default" onclick="InfoId({{ $product->id }})" data-toggle="modal" data-target="#exampleModal1">Order now</button></li>
                    </ul>
                    <p>{{ $product->descriptions }}</p>
                    <div class="line"></div>
                </div>
            @endif
        @endforeach
    </div>

    @endif

        <div class="col-12 text-center">
            <a href="{{ route('user.categoryMenu') }}"><button id="back-menu" class="btn btn-default">Back to Menu</button></a>
        </div>

    <div class="row">
        <div class="container">
            <div id="linee">

            </div>
        </div>
    </div>
@csrf
<input type="hidden" id="product_id_p" name="id" value="">

</div>

@include('user.layouts.footer')

@include('user.layouts.script')

<script>

function InfoId(x) {

    $("#product_id_p").val(x);

    $.post('/menu/popUp', {'id': x, '_token': $('input[name=_token]').val()}, function (data) {
        $("#pop_up").html(data);
    });

}
function NachosFunction() {
    var size = $("#select_size:checked").next().html();

    if (size == 'large') {
        $(".nachos_s").hide();
        $(".nachos_small").prop('checked',false);
        $(".nachos_l").show();
        var price = $("#select_size:checked").val();
        var qty = $(".qty").val();
        var PriceF = price * qty;

        $(".price_change").text("$ " + parseFloat(PriceF).toFixed(2));

    } else if (size == 'small') {
        $(".nachos_l").hide();
        $(".nachos_large").prop('checked',false);
        $(".nachos_s").show();
        var price = $("#select_size:checked").val();
        var qty = $(".qty").val();
        var PriceF = price * qty;

        $(".price_change").text("$ " + parseFloat(PriceF).toFixed(2));

    }
}

function ChangePrice() {

    var id = $("#product_id_p").val();
    var qty = $("#number").val();
    $("#qty_customize").val(qty);

    var price = $("#select_size:checked").val();
    var size = $("#select_size:checked").html();

    var size_customize = $("#select_size:checked").next().html();
    $("#size_customize").val(size_customize);
    $("#price_customize").val(price);

    var extra_chesse = $("#extra_cheese:checked").val();
    var extra_chesse_size = $("#extra_cheese:checked").parent().text();

    var extra_meat = $("#extra_meat:checked").val();
    var extra_meat_size = $("#extra_meat:checked").parent().text();

    var donair_souce = $("#donair_souce:checked").val();
    var donair_souce_size = $("#donair_souce:checked").parent().text();

    var extra_piece = $("#extra_piece:checked").val();
    var extra_piece_status = $("#extra_piece:checked").parent().text();

    if (donair_souce && extra_chesse && extra_meat && price) {
        var FinalPrice = parseFloat(price) + parseFloat(extra_chesse) + parseFloat(extra_meat) + parseFloat(donair_souce);
    } else if (extra_meat && extra_chesse && price) {
        var FinalPrice = parseFloat(price) + parseFloat(extra_meat) + parseFloat(extra_chesse);
    } else if (donair_souce && extra_chesse && price) {
        var FinalPrice = parseFloat(price) + parseFloat(extra_chesse) + parseFloat(donair_souce);
    } else if (donair_souce && extra_meat && price) {
        var FinalPrice = parseFloat(price) + parseFloat(extra_meat) + parseFloat(donair_souce);
    } else if (extra_chesse && price) {
        var FinalPrice = parseFloat(price) + parseFloat(extra_chesse);
    } else if (extra_meat && price) {
        var FinalPrice = parseFloat(price) + parseFloat(extra_meat);
    } else if (price && extra_piece){
        var FinalPrice = parseFloat(price) + parseFloat(extra_piece);
    } else if (price && donair_souce){
        var FinalPrice = parseFloat(price) + parseFloat(donair_souce);
    } else {
        var FinalPrice = parseFloat(price);
    }

    var text = $("textarea#specify").val();

    var souce_length = $(".more_souce_chicken:checked").length;
    var souce_value = $(".more_souce_chicken:checked").val();

    var price_souce_chicken = parseFloat(souce_length) * parseFloat(souce_value);

    var resultString = '';

    if (souce_length > 0){
        $("#souce_chicken:checked").each(function(){
            resultString += $(this).parent().text() + ', ';
        });
    }

    var peppers_length = $("#peppers:checked").length;

    var peppers = '';

    if (peppers_length > 0){
        $("#peppers:checked").each(function(){
            peppers += $(this).parent().text() + ', ';
        });
    }

    var homemade_garlic_souce = $("#homemade_souce:checked").val();
    var homemade_garlic_souce_status = $("#homemade_souce:checked").parent().text();

    if (price_souce_chicken && price && homemade_garlic_souce) {
        var FinalPrice = parseFloat(price) + parseFloat(price_souce_chicken) + parseFloat(homemade_garlic_souce);
    } else if(price && homemade_garlic_souce) {
        var FinalPrice = parseFloat(price) + parseFloat(homemade_garlic_souce);
    } else if(price && price_souce_chicken) {
        var FinalPrice = parseFloat(price) + parseFloat(price_souce_chicken);
    }

    var options_for_souce = $("#options_for_souce").parent().text();
    var qty = $(".qty").val();
    var PriceF = FinalPrice * qty;

    $(".price_change").text("$ " + parseFloat(PriceF).toFixed(2));
}

function AddToCart() {

    var id = $("#product_id_p").val();
    var qty = $("#number").val();

    //alert(qty);
    if (qty > 10) {
        $('#addToYourOrder').attr('data-target','#modal-error');
        //setTimeout(function(){ $('#modal-error').modal().hide(); }, 2000);
        return false;
    } else if (qty < 1) {
        $('#addToYourOrder').attr('data-target','#modal-error');
        //setTimeout(function(){ $('#modal-error').modal().hide(); }, 2000);
        return false;
    }

    var price = $("#select_size:checked").val();
    var size = $("#select_size:checked").html();

    var extra_chesse = $("#extra_cheese:checked").val();
    var extra_chesse_size = $("#extra_cheese:checked").parent().text();

    var extra_meat = $("#extra_meat:checked").val();
    var extra_meat_size = $("#extra_meat:checked").parent().text();

    var donair_souce = $("#donair_souce:checked").val();
    var donair_souce_size = $("#donair_souce:checked").parent().text();

    var extra_piece = $("#extra_piece:checked").val();
    var extra_piece_status = $("#extra_piece:checked").parent().text();

    if (donair_souce && extra_chesse && extra_meat && price) {
        var FinalPrice = parseFloat(price) + parseFloat(extra_chesse) + parseFloat(extra_meat) + parseFloat(donair_souce);
    } else if (extra_meat && extra_chesse && price) {
        var FinalPrice = parseFloat(price) + parseFloat(extra_meat) + parseFloat(extra_chesse);
    } else if (donair_souce && extra_chesse && price) {
        var FinalPrice = parseFloat(price) + parseFloat(extra_chesse) + parseFloat(donair_souce);
    } else if (donair_souce && extra_meat && price) {
        var FinalPrice = parseFloat(price) + parseFloat(extra_meat) + parseFloat(donair_souce);
    } else if (extra_chesse && price) {
        var FinalPrice = parseFloat(price) + parseFloat(extra_chesse);
    } else if (extra_meat && price) {
        var FinalPrice = parseFloat(price) + parseFloat(extra_meat);
    } else if (price && extra_piece){
        var FinalPrice = parseFloat(price) + parseFloat(extra_piece);
    } else if (price && donair_souce){
        var FinalPrice = parseFloat(price) + parseFloat(donair_souce);
    } else {
        var FinalPrice = parseFloat(price);
    }

    var text = $("textarea#specify").val();

    //Pocetak

    var souce_length = $(".more_souce_chicken:checked").length;
    var souce_value = $(".more_souce_chicken:checked").val();

    var price_souce_chicken = parseFloat(souce_length) * parseFloat(souce_value);

    var resultString = '';

    var souce_num = $(".one_souce_chicken:checked").length;

    if (souce_num > 0){
        $(".one_souce_chicken:checked").each(function(){
            resultString += $(this).parent().text() + ', ';
        });
    }


    var resultString1 = '';

    if (souce_length > 0){
        $(".more_souce_chicken:checked").each(function(){
            resultString1 += $(this).parent().text() + ', ';
        });
    }

    //Kraj

    var peppers_length = $("#peppers:checked").length;

    var peppers = '';

    if (peppers_length > 0){
        $("#peppers:checked").each(function(){
            peppers += $(this).parent().text() + ', ';
        });
    }
    var donairs_topping_length = $(".donairs_topping:checked").length;

    var donairs_topping = '';

    if (donairs_topping_length > 0){
        $(".donairs_topping:checked").each(function(){
            donairs_topping += $(this).parent().text() + ', ';
        });
    }

    var homemade_garlic_souce = $("#homemade_souce:checked").val();
    var homemade_garlic_souce_status = $("#homemade_souce:checked").parent().text();

    if (price_souce_chicken && price && homemade_garlic_souce) {
        var FinalPrice = parseFloat(price) + parseFloat(price_souce_chicken) + parseFloat(homemade_garlic_souce);
    } else if(price && homemade_garlic_souce) {
        var FinalPrice = parseFloat(price) + parseFloat(homemade_garlic_souce);
    } else if(price && price_souce_chicken) {
        var FinalPrice = parseFloat(price) + parseFloat(price_souce_chicken);
    }

    var options_for_souce = $("#options_for_souce:checked").val();

    var choose_calzones = $(".choose_calzones:checked").val();

    $('#addToYourOrder').attr('data-target','#modal-success');

    $.post('/cart/item', {
        'id': id,
        'price': FinalPrice,
        'size': size,
        'cheese_size': extra_chesse_size,
        'meat_size': extra_meat_size,
        'peppers': peppers,
        'donair_size': donair_souce_size,
        'donairs_topping': donairs_topping,
        'extra_piece': extra_piece_status,
        'one_souce_chicken': resultString,
        'more_souce_chicken': resultString1,
        'options_for_souce': options_for_souce,
        'homemade_garlic_souce': homemade_garlic_souce_status,
        'choose_calzones': choose_calzones,
        'text': text,
        'qty': qty,
        '_token': $('input[name=_token]').val()}, function (data) {


        $("#number").val('1');

        $("#mycart-li-2").load(location.href + " #mycart-li-2");
        $("#mycart-li-1").load(location.href + " #mycart-li-1");
        $("#mycart-li-3").load(location.href + " #mycart-li-3");
        $("#mycart-li-4").load(location.href + " #mycart-li-4");

    });
}
function Customize() {

    var qty = $("#number").val();

    //alert(qty);
    if (qty > 10) {
        $("#qty-alert").slideDown(300);
        setTimeout(function(){ $("#qty-alert").slideUp(200); }, 2000);
        return false;
    } else if (qty < 1) {
        $("#qty-alert").slideDown(300);
        setTimeout(function(){ $("#qty-alert").slideUp(200); }, 2000);
        return false;
    }

    $("#customize-form-id").submit();
}
$(document).ready(function(){

    $('.one_souce_chicken').on('change', function() {
        if($('.one_souce_chicken:checked').length > 2) {
            this.checked = false;
        }
    });

    $('#chips').addClass('active');
    $('#chipss').css('display','block');

    $('#chips').click(function(){
        $(this).addClass('active');
        $('#chocolate').removeClass('active');
        $('#chipss').css('display','block');
        $('#bars').css('display','none');

    });

    $('#chocolate').click(function(){
        $(this).addClass('active');
        $('#chips').removeClass('active');
        $('#bars').css('display','block');
        $('#chipss').css('display','none');
    });
    $('#icecream').addClass('active');
    $('#icecreams').css('display','block');

    $('#icecream').click(function(){
        $(this).addClass('active');
        $('#milk').removeClass('active');
        $('#ben').removeClass('active');
        $('#mobilebutton').removeClass('active');
        $('#icecreams').css('display','block');
        $('#bens').css('display','none');
        $('#milkshakes').css('display','none');
        $('#haagens').css('display','none');
    });

    $('#milk').click(function(){
        $(this).addClass('active');
        $('#icecream').removeClass('active');
        $('#ben').removeClass('active');
        $('#mobilebutton').removeClass('active');
        $('#milkshakes').css('display','block');
        $('#bens').css('display','none');
        $('#icecreams').css('display','none');
        $('#haagens').css('display','none');
    });

    $('#ben').click(function(){
        $(this).addClass('active');
        $('#icecream').removeClass('active');
        $('#milk').removeClass('active');
        $('#mobilebutton').removeClass('active');
        $('#bens').css('display','block');
        $('#icecreams').css('display','none');
        $('#milkshakes').css('display','none');
        $('#haagens').css('display','none');
    });

    $('#mobilebutton').click(function(){
        $(this).addClass('active');
        $('#icecream').removeClass('active');
        $('#ben').removeClass('active');
        $('#milk').removeClass('active');
        $('#haagens').css('display','block');
        $('#bens').css('display','none');
        $('#milkshakes').css('display','none');
        $('#icecreams').css('display','none');
    });
});

</script>
</body>
</html>