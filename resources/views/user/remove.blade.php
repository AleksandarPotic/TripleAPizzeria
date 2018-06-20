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