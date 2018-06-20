
@if($working_time->status)

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">
        {{ $product->name }}
        <span id="prica" class="price_change"> $@if($product->small) {{ $product->small }} @elseif($product->price) {{ $product->price }} @elseif($product->platter) {{ $product->platter }} @endif </span></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="#" method="POST">
    <div class="modal-body">
        <p class="modal-p">{{ $product->descriptions }}</p>

        <!-- Price and size -->
        <ul class="list-inline">
            <li class="list-inline-item" id="da">
                <div class="input-group">
                    <select id="select" @if($product->category->name == "Nachos") onchange="ChangePrice(),NachosFunction()" @else onchange="ChangePrice()" @endif class="form-control" name="size" @if ($product->price and !$product->platter) style="-moz-appearance: none;-webkit-appearance: none;appearance: none;" @elseif($product->small and !$product->large) style="-moz-appearance: none;-webkit-appearance: none;appearance: none;" @elseif($product->platter and !$product->price) style="-moz-appearance: none;-webkit-appearance: none;appearance: none;" @endif>
                        @if ($product->price)
                            <option value="{{ $product->price }}" id="select_size">Price - ${{ $product->price }}</option>
                        @endif
                        @if ($product->platter)
                            <option value="{{ $product->platter }}" id="select_size">Platter - ${{ $product->platter }}</option>
                        @endif
                        @if ($product->small)
                            <option value="{{ $product->small }}" id="select_size">Small @if($product->small_size) ({{ $product->small_size }}) @endif @if($product->category->name == 'Pizza' or $product->category->name == 'Garlic Fingers') (9") @endif - ${{ $product->small }}</option>
                            <option hidden>small</option>
                            @endif
                        @if ($product->medium)
                            <option value="{{ $product->medium }}" id="select_size">Medium @if($product->category->name == 'Pizza' or $product->category->name == 'Garlic Fingers') (12") @endif - ${{ $product->medium }}</option>
                                <option hidden>medium</option>
                            @endif
                        @if ($product->large)
                            <option value="{{ $product->large }}" id="select_size">Large @if($product->large_size) ({{ $product->large_size }}) @endif  @if($product->category->name == 'Pizza' or $product->category->name == 'Garlic Fingers') (16") @endif - ${{ $product->large }}</option>
                                <option hidden>large</option>
                            @endif
                        @if ($product->xlg)
                            <option value="{{ $product->xlg }}" id="select_size">XLG  @if($product->category->name == 'Pizza' or $product->category->name == 'Garlic Fingers') (18") @endif- ${{ $product->xlg }}</option>
                                <option hidden>xlg</option>
                            @endif
                    </select>
                </div>
            </li>
            <li class="list-inline-item">
                <div class="input-group">
                    <input id="number" class="form-control pull-right qty" onchange="ChangePrice()" type="number" value="1" min="1" max="10" name="qty" required=""><br>
                </div>
            </li>
        </ul>
        <!-- /Price and size -->
        <!-- Text? -->
        @if($product->category->name == "Salads" or $product->category->name == "Burgers" or $product->category->name == "Poutine" or $product->category->name == "Wraps" or $product->category->name == "Subs" or $product->category->name == "Nachos" or $product->category->name == "Calzones" or $product->category->name == "Sandwiches")
            <p>This section is for any special requests you may have (like ‘no pickles’ or ‘light cheese’), it is not for adding toppings or sides to your order.</p>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <textarea name="" rows="2" cols="40" placeholder="Special Instructions" id="specify" style="width: 100%;"></textarea>
                </li>
            </ul>
        @endif

        <!-- /Text? -->
        <!-- Extra peppers? -->

        @if($product->category->name == "Nachos")
            <hr>
            <div class="row">
                <div class="col-12">
                    <h5>Extra Peppers</h5>
                </div>
                <div class="col-6">
                    <label class="form-check-label chee" id="check-label">Banana Peppers
                        <input class="form-check-input" name="honey-garlic" type="checkbox" id="peppers" value="Banana Peppers">
                        <span class="checkmark"></span>
                    </label>
                    <label class="form-check-label chee" id="check-label">Jalapeno Peppers
                        <input class="form-check-input" name="honey-mustard" type="checkbox" id="peppers" value="Jalapeno Peppers">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        @endif

        <!-- /Extra peppers? -->
        @if($product->category->name == "Calzones")
            <hr>
            <div class="row extras">
                <div class="col-12">
                    <h5>Choose One</h5>
                </div>
                <div class="col-6">
                    <label class="form-check-label chee" id="check-label" for="defaultCheck9">Oven Baked
                        <input class="form-check-input choose_calzones" name="oven-or-deep" type="radio" value="Oven Baked" checked="" id="defaultCheck9">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-6">
                    <label class="form-check-label chee" id="check-label" for="defaultCheck10">Deep-Fried
                        <input class="form-check-input choose_calzones" name="oven-or-deep" type="radio" value="Deep-Fried" id="defaultCheck10">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        @endif
        @if($product->category->name == "Donairs" and $product->name != 'Donair Egg Rolls')
            <hr>
            <div class="row extras">
                <div class="col-12">
                    <h5>Choose Toppings</h5>
                </div>
                <div class="col-6">
                    <label class="form-check-label chee" id="check-label" for="defaultCheck11">Tomatoes
                        <input class="form-check-input donairs_topping" name="tomatos-and-onions" value="Tomatoes" type="checkbox" id="defaultCheck11">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-6">
                    <label class="form-check-label chee" id="check-label" for="defaultCheck12">Onions
                        <input class="form-check-input donairs_topping" name="tomatos-and-onions" value="Onions" type="checkbox" id="defaultCheck12">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        @endif
        <!-- Extra cheese or meat? -->
        @if($product->extra_meat or $product->extra_cheese)
            <hr>
            <div class="row extras">
                    <div class="col-6" @if(!$product->extra_cheese) style="display:none;" @endif>
                        <h5>Extras</h5>

                        @if($product->extra_small)
                            <label class="form-check-label chee @if($product->category->name == "Nachos") nachos_s @endif" id="check-label">@if($product->name != 'Small Donair' and $product->name != 'Medium Donair' and $product->name != 'Large Donair' and $product->category->name != 'Calzones') Small - ${{ number_format($product->extra_small,2) }} @else Extra Cheese ${{ number_format($product->extra_small,2) }} @endif
                                <input class="form-check-input nachos_small" name="extra-cheese" onclick="ChangePrice()" type="checkbox" id="extra_cheese" value="{{ $product->extra_small }}">
                                <span class="checkmark"></span>
                            </label>
                        @endif
                        @if($product->extra_large)
                            <label class="form-check-label chee @if($product->category->name == "Nachos") nachos_l @endif" id="check-label" @if($product->category->name == "Nachos") style="display:none;" @endif> Large - ${{ number_format($product->extra_large,2) }}
                                <input class="form-check-input nachos_large" name="extra-cheese" onclick="ChangePrice()" type="checkbox" id="extra_cheese" value="{{ $product->extra_large }}">
                                <span class="checkmark"></span>
                            </label>
                        @endif
                    </div>

                    <div class="col-6" @if(!$product->extra_meat) style="display: none;" @endif>
                        <h5 style="color: white; text-decoration: none;">.</h5>
                        @if($product->extra_small)
                            <label class="form-check-label chee @if($product->category->name == "Nachos") nachos_s @endif" id="check-label"> @if($product->name != 'Small Donair' and $product->name != 'Medium Donair' and $product->name != 'Large Donair' and $product->category->name != 'Calzones') Small - ${{ number_format($product->extra_small,2) }} @else Extra Meat ${{ number_format($product->extra_small,2) }} @endif
                                <input class="form-check-input nachos_small" name="extra-meat" onclick="ChangePrice()" type="checkbox" id="extra_meat" value="{{ $product->extra_small }}">
                                <span class="checkmark"></span>
                            </label>
                        @endif
                        @if($product->extra_large)
                            <label class="form-check-label chee @if($product->category->name == "Nachos") nachos_l @endif" id="check-label" @if($product->category->name == "Nachos") style="display:none;" @endif> Large - ${{ number_format($product->extra_large,2) }}
                                <input class="form-check-input nachos_large" name="extra-meat" onclick="ChangePrice()" type="checkbox" id="extra_meat" value="{{ $product->extra_large }}">
                                <span class="checkmark"></span>
                            </label>
                        @endif
                    </div>
            </div>
        @endif
        <!-- /Extra cheese or meat? -->
        <!-- Souce for chicken? -->

        @if($product->category->name == "Chicken" or $product->category->name == "Chicken Wings")
            @if($product->name == "10 Pc Chicken & Chips" or $product->name == "6 Chicken Strips & Chips" or $product->name == "10 Chicken Strips & Chips" or $product->name == "20 Pc Chicken Wings")
                <input type="hidden" id="number_free" value="2">
            @elseif($product->name == "30 Pc Chicken Wings")
                <input type="hidden" id="number_free" value="3">
            @elseif($product->name == "40 Pc Chicken Wings")
                <input type="hidden" id="number_free" value="4">
            @else
                <input type="hidden" id="number_free" value="1">
            @endif
            <hr>
            <div class="row">
                <div class="col-12">

                    @if($product->name == "10 Pc Chicken & Chips" or $product->name == "6 Chicken Strips & Chips" or $product->name == "10 Chicken Strips & Chips" or $product->name == "20 Pc Chicken Wings")
                        <h5>Choose 2 Sauces:</h5>
                    @elseif($product->name == "30 Pc Chicken Wings")
                        <h5>Choose 3 Sauces:</h5>
                    @elseif($product->name == "40 Pc Chicken Wings")
                        <h5>Choose 4 Sauces:</h5>
                    @else
                        <h5>Choose One Sauce:</h5>
                    @endif
                </div>
                <div class="col-6">
                    <label class="form-check-label chee" id="check-label">Honey Garlic
                        <input class="one_souce_chicken form-check-input" onclick="ChangePrice()" name="one-souce" type="checkbox" id="souce_chicken" value="1.5">
                        <span class="checkmark"></span>
                    </label>
                    <label class="form-check-label chee" id="check-label">Honey Mustard
                        <input class="one_souce_chicken form-check-input" onclick="ChangePrice()" name="one-souce" type="checkbox" id="souce_chicken" value="1.5">
                        <span class="checkmark"></span>
                    </label>
                    <label class="form-check-label chee" id="check-label">Mild
                        <input class="one_souce_chicken form-check-input" onclick="ChangePrice()" name="one-souce" type="checkbox" id="souce_chicken" value="1.5">
                        <span class="checkmark"></span>
                    </label>
                    @if($product->category->name == "Chicken")
                        <label class="form-check-label chee" id="check-label">Sweet & Sour
                            <input class="one_souce_chicken form-check-input" onclick="ChangePrice()" name="one-souce" type="checkbox" id="souce_chicken" value="1.5">
                            <span class="checkmark"></span>
                        </label>
                        <label class="form-check-label chee" id="check-label">BBQ
                            <input class="one_souce_chicken form-check-input" onclick="ChangePrice()" name="one-souce" type="checkbox" id="souce_chicken" value="1.5">
                            <span class="checkmark"></span>
                        </label>
                        @endif
                </div>
                <div class="col-6">
                    <label class="form-check-label chee" id="check-label">Medium
                        <input class="one_souce_chicken form-check-input" onclick="ChangePrice()" name="one-souce" type="checkbox" id="souce_chicken" value="1.5">
                        <span class="checkmark"></span>
                    </label>
                    <label class="form-check-label chee" id="check-label">Daves Hot Sauce
                        <input class="one_souce_chicken form-check-input" onclick="ChangePrice()" name="one-souce" type="checkbox" id="souce_chicken" value="1.5">
                        <span class="checkmark"></span>
                    </label>
                    @if($product->category->name == "Chicken")
                    <label class="form-check-label chee" id="check-label">Plum Sauce
                        <input class="one_souce_chicken form-check-input" onclick="ChangePrice()" name="one-souce" type="checkbox" id="souce_chicken" value="1.5">
                        <span class="checkmark"></span>
                    </label>
                    @endif
                    <label class="form-check-label chee" id="check-label">No Sauce
                        <input class="one_souce_chicken form-check-input" onclick="ChangePrice()" name="one-souce" type="checkbox" id="souce_chicken" value="0">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
                <script>
                    var number_free = $("#number_free").val();

                    $('.one_souce_chicken').on('change', function() {
                        if($('.one_souce_chicken:checked').length > number_free) {
                            this.checked = false;
                        }
                    });
                </script>
        @endif
        @if($product->category->name == "Chicken" or $product->category->name == "Chicken Wings")
            <hr>
            <div class="row">
                <div class="col-12">
                    <h5>Additional Sauce ($1.50):</h5>
                </div>
                <div class="col-6">
                    <label class="form-check-label chee" id="check-label">Honey Garlic
                        <input class="form-check-input more_souce_chicken" onclick="ChangePrice()" name="one-honey" type="checkbox" id="souce_chicken" value="1.5">
                        <span class="checkmark"></span>
                    </label>
                    <label class="form-check-label chee" id="check-label">Honey Mustard
                        <input class="form-check-input more_souce_chicken" onclick="ChangePrice()" name="one-mustard" type="checkbox" id="souce_chicken" value="1.5">
                        <span class="checkmark"></span>
                    </label>
                    <label class="form-check-label chee" id="check-label">Mild
                        <input class="form-check-input more_souce_chicken" onclick="ChangePrice()" name="one-mild" type="checkbox" id="souce_chicken" value="1.5">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-6">
                    <label class="form-check-label chee" id="check-label">Medium
                        <input class="form-check-input more_souce_chicken" onclick="ChangePrice()" name="one-medium" type="checkbox" id="souce_chicken" value="1.5">
                        <span class="checkmark"></span>
                    </label>
                    <label class="form-check-label chee" id="check-label">Daves Hot Sauce
                        <input class="form-check-input more_souce_chicken" onclick="ChangePrice()" name="one-daves" type="checkbox" id="souce_chicken" value="1.5">
                        <span class="checkmark"></span>
                    </label>
                    @if($product->category->name == "Chicken")
                    <label class="form-check-label chee" id="check-label">Plum Sauce
                        <input class="form-check-input more_souce_chicken" onclick="ChangePrice()" name="one-plum" type="checkbox" id="souce_chicken" value="1.5">
                        <span class="checkmark"></span>
                    </label>
                    @endif
                </div>
                @if($product->category->name == "Chicken")
                <div class="col-6">
                    <label class="form-check-label chee" id="check-label">Sweet & Sour
                        <input class="form-check-input more_souce_chicken" onclick="ChangePrice()" name="one-sweet-sour" type="checkbox" id="souce_chicken" value="1.5">
                        <span class="checkmark"></span>
                    </label>
                    <label class="form-check-label chee" id="check-label">BBQ
                        <input class="form-check-input more_souce_chicken" onclick="ChangePrice()" name="one-bbq" type="checkbox" id="souce_chicken" value="1.5">
                        <span class="checkmark"></span>
                    </label>
                </div>
                @endif
            </div>
        @endif

        <!-- /Souce for chicken? -->
        <!-- Homemade garlic souce? -->

        @if($product->options_for_souce)
            <hr>
            <div class="row extras">
                <div class="col-12">
                    <h5>Donair Sauce</h5>
                </div>
                <div class="col-6">
                    <label class="form-check-label chee" id="check-label"> On the Side
                        <input class="form-check-input" name="options_for_souce" type="radio" value="On the Side" id="options_for_souce" checked>
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-6">
                    <label class="form-check-label chee" id="check-label"> On the Donair
                        <input class="form-check-input" name="options_for_souce" type="radio" value="On the Donair" id="options_for_souce">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-6">
                    <label class="form-check-label chee" id="check-label"> No Sauce
                        <input class="form-check-input" name="options_for_souce" type="radio" value="No Sauce" id="options_for_souce">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        @endif

        <!-- /Homemade garlic souce? -->
        <!-- Extra piece? -->

        @if($product->extra_piece)
            <hr>
            <div class="row extras">
                <div class="col-12">
                    <h5>Extra piece (${{ number_format($product->extra_piece,2) }})</h5>
                </div>
                <div class="col-12">
                    <label class="form-check-label chee" id="check-label" for="extra_piece">Extra piece
                        <input class="form-check-input" onclick="ChangePrice()" name="extra_piece" type="checkbox" value="{{ $product->extra_piece }}" id="extra_piece">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        @endif

        <!-- /Extra piece? -->
        <!-- Homemade garlic souce? -->

        @if($product->category->name == "Chicken Wings" or $product->category->name == "Chicken")
            <hr>
            <div class="row extras">
                <div class="col-12">
                    <h5>Extra Sauce</h5>
                </div>
                <div class="col-12">
                    <label class="form-check-label chee" id="check-label" for="homemade_souce">Homemade Garlic Sauce ${{ number_format($product->homemade_garlic_souce,2) }}
                        <input class="form-check-input" onclick="ChangePrice()" name="homemade" type="checkbox" id="homemade_souce" value="{{ $product->homemade_garlic_souce }}">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        @endif

        <!-- Homemade garlic souce? -->
        <!-- Donair souce? -->

        @if($product->donair_small)
            <hr>
            <div class="row extras">
                <div class="col-12">
                    <h5>Extra Donair Sauce</h5>
                </div>
                <div class="col-6">
                    <label class="form-check-label chee" id="check-label">Small - ${{ number_format($product->donair_small,2) }}
                        <input class="extra_d form-check-input" onclick="ChangePrice()" name="donair" type="checkbox" id="donair_souce" value="{{ $product->donair_small }}">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-6">
                    <label class="form-check-label chee" id="check-label">Large - ${{ number_format($product->donair_large,2) }}
                        <input class="extra_d form-check-input" onclick="ChangePrice()" name="donair" type="checkbox" id="donair_souce" value="{{ $product->donair_large }}">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        @endif

        <script>

            $('.extra_d').on('change', function() {
                if($('.extra_d:checked').length > 1) {
                    this.checked = false;
                }
            });
        </script>
        <!-- /Donair souce? -->

    </div>
</form>
    <div class="modal-footer">
        @if($product->name != 'Create Your Own')
            <button type="button" onclick="AddToCart()" id="addToYourOrder" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="">Add to Your Order</button>
        @endif
        @if($categoryName == 'Pizza')
            <form action="{{ route('customizeUser.setUp') }}" id="customize-form-id" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" id="size_customize" name="size" value="small">
                <input type="hidden" id="qty_customize" name="qty" value="1">
                <input type="hidden" id="price_customize" name="price" value="{{ $product->small }}">
                <button type="button" onclick="Customize()" class="btn btn-primary" data-dismiss="modal">Customize</button>
            </form>
        @endif
    </div>

@else

    <div class="modal-body">
        <p class="modal-p">We don't currently accept orders.</p>
    </div>
    <div class="modal-footer">
        <input type="hidden" id="product_id_p" name="id" value="">
        <button type="button" id="add_cart" class="btn btn-secondary" data-dismiss="modal">Ok</button>
    </div>


@endif