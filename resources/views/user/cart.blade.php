<!DOCTYPE html>
<html>

<head lang="en">
    <title>Your Cart</title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/your-cart.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/menu.css') }}">


    <link href="{{ asset('user/assets/library/fontawesome/web-css/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/assets/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('user/assets/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('user/assets/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</head>

<body>
<div class="container-fluid" id="container">
    @include('user.layouts.header')

    <div class="row">
        <div class="col-12" id="cart-text">
            <h1 class="text-center">YOUR ORDER</h1>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <div class="row rowww" id="pizza-padd">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 cart">
                    <div class="alert alert-success" id="remove-alert" style="background-color: #e66001; color: white; border: none; text-align: center; display: none">
                        Successfully remove product.
                    </div>
                    <div class="alert alert-success" id="favorites-alert" style="background-color: #e66001; color: white; border: none; text-align: center; display: none">
                        Successfully added to favorites.
                    </div>
                    <div class="alert alert-success" id="quantity-alert" style="background-color: #e66001; color: white; border: none; text-align: center; display: none">
                        Successfully changed the quantity.
                    </div>
                    <div class="alert alert-success" id="quantity-valid-alert" style="background-color: #e66001; color: white; border: none; text-align: center; display: none">
                        The quantity must be between 1 and 10!
                    </div>
                    @include('admin.layouts.errors.error')
                    @if(Cart::count() != '0')
                        <div class="row">
                            <div class="text-center col-12">
                                <a href="{{ route('user.categoryMenu') }}"><button class="btn btn-default" id="back-menu" style="margin-top: 15px">Back to Menu</button></a>
                            </div>

                            @if(!Auth::guest() and Cart::count() > 0)
                                <div class="text-right col-12">
                                    <p class="btn btn-default" style="color: #e66001; margin: 0px; @foreach(Cart::content() as $item) @if($item->options->used_points == '10' or $item->options->used_points == '15' or $item->options->used_points == '25' or $item->options->used_points == '30') display: none; @endif @endforeach " data-toggle="modal" data-target=".FavoritesModal">Add this Order to Favorites</p>
                                </div>
                            @endif

                            @foreach(Cart::content() as $item)

                                <form action="{{ route('customizeUser.edit',$item->rowId) }}" method="POST" id="form_customize_{{ $item->rowId }}">
                                    @csrf
                                    @method('PUT')

                                </form>
                                <form action="{{ route('customizeUser.rewardsOneEdit',$item->rowId) }}" method="POST" id="form_customize_one_{{ $item->rowId }}">
                                    @csrf
                                    @method('PUT')

                                </form>
                                <form action="{{ route('customizeUser.rewardsTwoEdit',$item->rowId) }}" method="POST" id="form_customize_two_{{ $item->rowId }}">
                                    @csrf
                                    @method('PUT')

                                </form>
                                <form action="{{ route('customizeUser.rewardsThreeEdit',$item->rowId) }}" method="POST" id="form_customize_three_{{ $item->rowId }}">
                                    @csrf
                                    @method('PUT')

                                </form>
                                <div class="col-12 cart-item">
                                    <h4 class="text-left pizza-name">{{ $item->name }} @if($item->options->description_special) - {{ $item->options->description_special }} @endif</h4>
                                        <ul class="list-inline">
                                            @if(!session()->get('coupon'))
                                                <li class="list-inline-item action" data-toggle="modal" data-target=".delete-{{ $item->rowId }}" style="cursor: pointer;">Remove</li>
                                            @endif
                                            @if($item->options->product_category == 'Pizza' and $item->options->used_points == '0')
                                                <li class="list-inline-item action middle" onclick="EditCustomize('{{ $item->rowId }}')" style="background: none; border: none; padding: 0;cursor: pointer;" id="edit_submit">Edit</li>
                                            @endif
                                            @if($item->options->used_points == '15')
                                                <li class="list-inline-item action middle" onclick="EditOneCustomize('{{ $item->rowId }}')" style="background: none; border: none; padding: 0;cursor: pointer;" id="edit_submit">Edit</li>
                                            @endif
                                            @if($item->options->used_points == '25')
                                                <li class="list-inline-item action middle" onclick="EditTwoCustomize('{{ $item->rowId }}')" style="background: none; border: none; padding: 0;cursor: pointer;" id="edit_submit">Edit</li>
                                            @endif
                                            @if($item->options->used_points == '30')
                                                <li class="list-inline-item action middle" onclick="EditThreeCustomize('{{ $item->rowId }}')" style="background: none; border: none; padding: 0;cursor: pointer;" id="edit_submit">Edit</li>
                                            @endif
                                            <li class="list-inline-item action" onclick="Details('{{ $item->rowId }}')" style="cursor: pointer;">Details</li>
                                        </ul>
                                    <p class="text-left" id="details_div_{{ $item->rowId }}" style="display: none;">
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
                                                <li class="list-inline-item" style="width: 80px;"><input class="form-control" min="1" max="10" type="number" id="qty_number_{{ $item->rowId }}" onchange="ChangeQty('{{ $item->rowId }}')" name="quntity" value="{{ $item->qty }}" @if($item->options->used_points == '10' or $item->options->used_points == '15' or $item->options->used_points == '25' or $item->options->used_points == '30') disabled @endif></li>
                                                <li class="list-inline-item" style="margin-left: 10px;">${{ number_format($item->price * $item->qty,2) }}</li>
                                            </ul>
                                        </div>
                                    </form>
                                    <div id="line">

                                    </div>
                                </div>

                                <!-- Modal for remove All products -->
                                <div class="modal fade delete-{{ $item->rowId }}" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p class="modal-p">Do you really want to remove {{ $item->name }} from your order?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" id="product_id_p" name="id" value="">
                                                <button type="button" id="remove_product_button" onclick="Remove('{{ $item->rowId }}')" class="btn btn-secondary" data-dismiss="modal">Remove</button>
                                                <button type="button" id="add_cart" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Delete Modal -->

                            @endforeach

                        </div>

                        @if(!session()->get('coupon'))
                            <h6><p id="remove_all" data-toggle="modal" data-target=".deleteAll" style="cursor: pointer;">Remove all</p></h6>
                        @endif
                    @else
                        <div class="text-center col-12">
                            <a href="{{ route('user.categoryMenu') }}"><button class="btn btn-default" id="back-menu" style="margin-top: 15px">Back to Menu</button></a>
                        </div>
                        <div class="alert alert-success" style="background-color: #e66001; color: white; border: none; text-align: center;">
                            <h6>Cart is empty!</h6>
                        </div>
                    @endif
                </div>

                <!-- Modal for remove All products -->
                <div class="modal fade deleteAll" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p class="modal-p">Do you really want to remove all products from your order?</p>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" id="product_id_p" name="id" value="">
                                <button type="button" id="remove_all_button" onclick="RemoveAll()" class="btn btn-secondary" data-dismiss="modal">Remove</button>
                                <button type="button" id="add_cart" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Delete Modal -->
                @if(!Auth::guest())
                    <div class="modal fade FavoritesModal" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="#" method="POST">
                                    <div class="modal-body">

                                        <label for="my-favorite">Name this Order and Add it to Favorites </label>
                                        <input class="form-control" type="text" name="my-favorite" id="name-favorite">
                                        <input type="hidden" id="price_favorite" value="{{ Cart::total() }}">
                                        <input class="form-control" id="user_id" type="hidden" value="{{ Auth::user()->id }}" placeholder="Enter name of favorite">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="Favorites()" data-dismiss="modal">Save Favorite</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-12 col-sm-12 col-md-4 offset-md-2 col-lg-4 offset-lg-2 text-center">
                    <div id="check-out">
                        <a href="{{ route('preCheckout') }}"><button class="btn btn-default">Check Out</button></a>
                        <table class="table">
                            <tr>
                                <td class="text-left">Service Charge</td>
                                <td class="text-right">$0.95</td>
                            </tr>
                            <tr>
                                <td class="text-left">Subtotal</td>
                                <td class="text-right">${{ Cart::subtotal() }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Estimated Tax</td>
                                <td class="text-right">${{ Cart::tax() }}</td>
                            </tr>
                        </table>
                        <div id="linee"></div>
                        <table class="table">
                            <tr>
                                <td class="text-left"><h3>Total</h3></td>
                                <td class="text-right"><h3>${{ Cart::total() }}</h3></td>
                            </tr>
                        </table>
                    </div>
                    @if(!Auth::guest())
                        <br>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12" id="points">
                            <p class="text-center" style="padding: 20px">With this purchase you will earn <font style="font-size: 22px; color: #01181e;">{{ intval(Cart::total() / 8) }} points</font></p>
                        </div>
                    @endif
                </div>
            </div>
            <br><br>

            <div class="row">
                <div class="col-12">
                    <h4 class="text-center" style="font-size: 1.8rem; margin-bottom: 30px"><b>WANT TO ADD SOMETHING EXTRA?</b></h4>
                </div>
            </div>

            <div class="container text-center my-3">
                <div class="row mx-auto my-auto">
                    <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <a href="{{ route('user.menu', ['category=appetizers']) }}"><img class="img-fluid" src="{{ asset('/user/image/menu-icon/app-icon.jpg') }}"></a>
                                    <h4>Appetizers</h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <a href="{{ route('user.menu', ['category=munchies']) }}"><img class="img-fluid" src="{{ asset('/user/image/menu-icon/munchies-icon.jpg') }}"></a>
                                    <h4>Munchies</h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <a href="{{ route('user.menu', ['category=desserts']) }}"><img class="img-fluid" src="{{ asset('/user/image/menu-icon/desert-icon.jpg') }}"></a>
                                    <h4>Desserts</h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <a href="{{ route('user.menu', ['category=drinks']) }}"><img class="img-fluid" src="{{ asset('/user/image/menu-icon/drinks-icon.jpg') }}"></a>
                                    <h4>Drinks</h4>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon arrow" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon arrow" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <script>

                $('#recipeCarousel').carousel({
                    interval: 10000
                });

                $('.carousel .carousel-item').each(function(){
                    var next = $(this).next();
                    if (!next.length) {
                        next = $(this).siblings(':first');
                    }
                    next.children(':first-child').clone().appendTo($(this));

                    for (var i=0;i<2;i++) {
                        next=next.next();
                        if (!next.length) {
                            next = $(this).siblings(':first');
                        }

                        next.children(':first-child').clone().appendTo($(this));
                    }
                });

            </script>


            <div id="bottom-line">

            </div>
        </div>
    </div>
</div>

@include('user.layouts.footer')

@include('user.layouts.script')

 <script>
        function OpenModalRemove(x) {
            $(".deleteProduct").attr("class","modal fade deleteProduct-"+ x);
        }

        function Remove(x) {
            $.post('/cart/remove', {'id': x, '_token': $('input[name=_token]').val()}, function (data) {

                $(".rowww").html(data);

                $("#remove-alert").slideDown(300);
                setTimeout(function(){ $("#remove-alert").slideUp(200); }, 2000);

                $("#mycart-li-2").load(location.href + " #mycart-li-2");
                $("#mycart-li-1").load(location.href + " #mycart-li-1");
                $("#mycart-li-3").load(location.href + " #mycart-li-3");
                $("#mycart-li-4").load(location.href + " #mycart-li-4");
            });
        }

        function RemoveAll() {

            $.get('/cart/remove_all', function(data){
                $(".rowww").html(data);

                $("#mycart-li-2").load(location.href + " #mycart-li-2");
                $("#mycart-li-1").load(location.href + " #mycart-li-1");
                $("#mycart-li-3").load(location.href + " #mycart-li-3");
                $("#mycart-li-4").load(location.href + " #mycart-li-4");
            });
        }
        function ChangeQty(x) {

            var qty = $("#qty_number_"+ x).val();

            if (qty < 1) {
                $("#quantity-valid-alert").slideDown(300);
                setTimeout(function(){ $("#quantity-valid-alert").slideUp(200); }, 2000);
                return false;
            } else if (qty > 10) {
                $("#quantity-valid-alert").slideDown(300);
                setTimeout(function(){ $("#quantity-valid-alert").slideUp(200); }, 2000);
                return false;
            }

            $.post('/cart/changeQty', {'id': x,'qty': qty, '_token': $('input[name=_token]').val()}, function (data) {

                $(".rowww").html(data);

                $("#quantity-alert").slideDown(300);
                setTimeout(function(){ $("#quantity-alert").slideUp(200); }, 2000);

                $("#mycart-li-2").load(location.href + " #mycart-li-2");
                $("#mycart-li-1").load(location.href + " #mycart-li-1");
                $("#mycart-li-3").load(location.href + " #mycart-li-3");
                $("#mycart-li-4").load(location.href + " #mycart-li-4");
            });
        }
        function EditCustomize(x) {
            $("#form_customize_"+ x).submit();
        }
        function EditOneCustomize(x) {
            $("#form_customize_one_"+ x).submit();
        }
        function EditTwoCustomize(x) {
            $("#form_customize_two_"+ x).submit();
        }
        function EditThreeCustomize(x) {
            $("#form_customize_three_"+ x).submit();
        }
        function Details(x) {
            $("#details_div_"+ x).slideToggle(200);
        }

        function Favorites() {
            var name = $("#name-favorite").val();
            //var price = $("#price_favorite").val();

            if(name) {
                var id = $("#user_id").val();

                $.post('/cart/favorites', {'id': id,'identifier': name, '_token': $('input[name=_token]').val()}, function (data) {
                    $("#name-favorite").val('');
                    $("#favorites-alert").slideDown(300);
                    setTimeout(function(){ $("#favorites-alert").slideUp(200); }, 2000);
                });
            } else {
                alert('Please enter name of Favorite');
            }
        }

        $(document).ready(function () {

            var verify = $("#verify_favorites").val();

            if (verify == 1) {
                $("#form_favorites").css({'display':'none'});
            }

        });
    </script>


</body>
</html>