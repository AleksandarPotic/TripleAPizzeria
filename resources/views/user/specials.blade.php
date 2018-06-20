<!DOCTYPE html>
<html>

<head lang="en">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/specials.css') }}">
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
        <div class="col-12" id="contact-image" style="background-image: url({{ asset('/user/image/spec-pizza.jpg') }});">

        </div>
    </div>

    <div class="row contact-text">
        <div class="col-12">
            <h1 class="text-center">SPECIALS</h1>
        </div>
    </div>


    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-12" id="image-one">
                    <img class="img-fluid" src="{{ asset('/user/image/povrcke1.png') }}">
                </div>

                <div class="col-12" id="product-box">
                    <div class="row">
                        @foreach($specials as $special)
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6" id="item">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><b>{{ $special->name }}</b></li>
                                    <li class="list-inline-item text-center price">${{ $special->price }}</li>
                                    <li class="list-inline-item text-right"><button class="btn btn-default" data-toggle="modal" data-target="#exampleModal1" onclick="addToCart('{{ $special->id }}')">Order now</button></li>
                                </ul>
                                <p>{{ $special->descriptions }} </p>
                                <div class="line"></div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!--// Modal for item -->

                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <p id="popUp">

                            </p>
                        </div>
                    </div>
                </div>

            <!--// End of Modal -->

                <!-- Modal for remove All products -->
                <div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="SuccessAdd" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p class="modal-p">Successfully added to your order.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Delete Modal -->

                <div class="col-12 text-center" id="image-two">
                    <img class="img-fluid" src="{{ asset('/user/image/povrcke2.png') }}">
                </div>
            </div>
        </div>
    </div>
@csrf
</div>

@include('user.layouts.footer')

@include('user.layouts.script')
@section('title-part')
    <title>Specials</title>
@show
    <script>

            function addToCart(x) {

                $.post('/specials/popUp', {'id': x, '_token': $('input[name=_token]').val()}, function (data) {
                    $("#popUp").html(data);
                });
            }

            function YourOrder() {
                var name_special = $("#name_special").val();
                var price_special = $("#price_special").val();
                var description_special = $("#description_special").val();
                var pizza1 = $("#pizza_1_name").html();

                var pizza1topp_len = $(".pizzaOne:checked").length;

                var toppingpizza1 = '';

                if (pizza1topp_len > 0){
                    $(".pizzaOne:checked").each(function(){
                        toppingpizza1 += $(this).parent().text() + ', ';
                    });
                }
                var pizza2topp_len = $(".pizzaTwo:checked").length;

                var toppingpizza2 = '';

                if (pizza2topp_len > 0){
                    $(".pizzaTwo:checked").each(function(){
                        toppingpizza2 += $(this).parent().text() + ', ';
                    });
                }

                var pizza2 = $("#pizza_2_name").html();

                var product3 = $("#product_3_name").val();

                var product4 = $("#product_4_name").val();
                var product5select = $("#product_5_select").val();
                var product6select = $("#product_6_select").val();

                var one_souce_chicken = $("#souce_chicken:checked").val();

                var special_instruction_special = $("#special_instruction_special").val();

                var souce_length = $(".more_souce_chicken:checked").length;
                var souce_value = $(".more_souce_chicken:checked").val();

                var price_souce_chicken = parseFloat(souce_length) * parseFloat(souce_value);

                if (souce_length != 0) {
                    var totalPrice = parseFloat(price_special) + parseFloat(price_souce_chicken);
                } else {
                    var totalPrice = price_special;
                }

                var resultString1 = '';

                if (souce_length > 0){
                    $(".more_souce_chicken:checked").each(function(){
                        resultString1 += $(this).parent().text() + ', ';
                    });
                }

                $('#AddSpecial').attr('data-target','#modal-success');

                $.post('/specials/YourOrder', {
                    'name_special': name_special,
                    'price_special': totalPrice,
                    'description_special': description_special,
                    'pizza1': pizza1,
                    'toppingpizza1': toppingpizza1,
                    'pizza2': pizza2,
                    'toppingpizza2': toppingpizza2,
                    'product3': product3,
                    'product4': product4,
                    'product5': product5select,
                    'product6': product6select,
                    'special_instruction_special': special_instruction_special,
                    'one_souce_chicken_special': one_souce_chicken,
                    'more_souce_chicken_special': resultString1,
                    '_token': $('input[name=_token]').val()}, function (data) {

                    $("#mycart-li-2").load(location.href + " #mycart-li-2");
                    $("#mycart-li-1").load(location.href + " #mycart-li-1");
                    $("#mycart-li-3").load(location.href + " #mycart-li-3");
                    $("#mycart-li-4").load(location.href + " #mycart-li-4");
                });
            }
            
            function SpecialPrice() {
                var souce_length = $(".more_souce_chicken:checked").length;
                var souce_value = $(".more_souce_chicken:checked").val();

                var price_souce_chicken = parseFloat(souce_length) * parseFloat(souce_value);

                var specialPrice = $("#price_special").val();

                var totalPrice = parseFloat(specialPrice) + parseFloat(price_souce_chicken);

                var resultString1 = '';

                if (souce_length > 0){
                    $(".more_souce_chicken:checked").each(function(){
                        resultString1 += $(this).parent().text() + ', ';
                    });
                }

                $("#prica").html('$' + parseFloat(totalPrice).toFixed(2));
            }
    </script>
</body>
</html>