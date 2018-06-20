<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">{{ $special->name }} <span id="prica">${{ $special->price }}</span></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="{{ route('special.add') }}" method="POST">
    @csrf
    <input type="hidden" id="name_special" value="{{ $special->name }}">
    <input type="hidden" id="price_special" value="{{ $special->price }}">
    <input type="hidden" id="description_special" value="{{ $special->descriptions }}">
    <div class="modal-body">
        @if($special->product1)
            @if($special->pizza1toppings)
                <h6 class="modal-p" id="pizza_1_name" style="display: none;">{{ $special->product1 }} Pizza - {{ $special->pizza1size }}</h6>
                <h5 class="modal-p">Choose {{ $special->pizza1toppings }} Toppings</h5>
                <div class="row">
                    <input type="hidden" id="number_topping_one" value="{{ $special->pizza1toppings }}">
                    <!--
                    <div class="col-lg-4">
                        <b>Cheese:</b><br>
                        @foreach($customizes as $customize)
                            @if($customize->customize_category == 'Cheeses' and $customize->regular_premium == 'regular')
                                <label class="form-check-label chee" id="check-label">{{ $customize->name }}
                                    <input class="pizzaOne form-check-input" onclick="ChangePrice()" name="one-souce" type="checkbox" value="{{ $customize->name }}">
                                    <span class="checkmark"></span>
                                </label>
                            @endif
                        @endforeach
                    </div>
                    -->
                    <div class="col-lg-6">
                        <b>Meats:</b><br>
                        @foreach($customizes as $customize)
                            @if($customize->customize_category == 'Meats' and $customize->regular_premium == 'regular')

                                <label class="form-check-label chee" id="check-label">{{ $customize->name }}
                                    <input class="pizzaOne form-check-input" onclick="ChangePrice()" name="one-souce" type="checkbox" value="{{ $customize->name }}">
                                    <span class="checkmark"></span>
                                </label>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-lg-6">
                        <b>Veggies:</b><br>
                        @foreach($customizes as $customize)
                            @if($customize->customize_category == 'Veggies' and $customize->regular_premium == 'regular')

                                <label class="form-check-label chee" id="check-label">{{ $customize->name }}
                                    <input class="pizzaOne form-check-input" onclick="ChangePrice()" name="one-souce" type="checkbox" value="{{ $customize->name }}">
                                    <span class="checkmark"></span>
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>

                <script>
                    var number_free1 = $("#number_topping_one").val();

                    $('.pizzaOne').on('change', function() {
                        if($('.pizzaOne:checked').length > number_free1) {
                            this.checked = false;
                        }
                    });

                    var number_free2 = $("#number_topping_two").val();

                    $('.pizzaTwo').on('change', function() {
                        if($('.pizzaTwo:checked').length > number_free2) {
                            this.checked = false;
                        }
                    });
                </script>
                <hr>
            @else
                <h6 class="modal-p" id="pizza_1_name">{{ $special->product1 }} Pizza - {{ $special->pizza1size }}</h6>
                <hr>
            @endif
        @endif

        @if($special->product2)
            @if($special->pizza2toppings)
                <h6 class="modal-p" id="pizza_2_name" style="display:none;">{{ $special->product2 }} Pizza - {{ $special->pizza2size }}</h6>
                <h5 class="modal-p">Choose {{ $special->pizza2toppings }} Toppings</h5>
                    <div class="row">
                        <input type="hidden" id="number_topping_two" value="{{ $special->pizza2toppings }}">
                        <!--
                        <div class="col-lg-4">
                            <b>Cheese:</b><br>
                            @foreach($customizes as $customize)
                                @if($customize->customize_category == 'Cheeses' and $customize->regular_premium == 'regular')
                                    <label class="form-check-label chee" id="check-label">{{ $customize->name }}
                                        <input class="pizzaTwo form-check-input" onclick="ChangePrice()" name="one-souce" type="checkbox" value="{{ $customize->name }}">
                                        <span class="checkmark"></span>
                                    </label>
                                @endif
                            @endforeach
                        </div>
                        -->
                        <div class="col-lg-6">
                            <b>Meats:</b><br>
                            @foreach($customizes as $customize)
                                @if($customize->customize_category == 'Meats' and $customize->regular_premium == 'regular')

                                    <label class="form-check-label chee" id="check-label">{{ $customize->name }}
                                        <input class="pizzaTwo form-check-input" onclick="ChangePrice()" name="one-souce" type="checkbox" value="{{ $customize->name }}">
                                        <span class="checkmark"></span>
                                    </label>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-lg-6">
                            <b>Veggies:</b><br>
                            @foreach($customizes as $customize)
                                @if($customize->customize_category == 'Veggies' and $customize->regular_premium == 'regular')

                                    <label class="form-check-label chee" id="check-label">{{ $customize->name }}
                                        <input class="pizzaTwo form-check-input" onclick="ChangePrice()" name="one-souce" type="checkbox" value="{{ $customize->name }}">
                                        <span class="checkmark"></span>
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    </div>
                <hr>
            @else
                <h6 class="modal-p" id="pizza_2_name">{{ $special->product2 }} Pizza - {{ $special->pizza2size }}</h6>
                <hr>
            @endif
        @endif


        @if($special->product3)
            @if($special->product3 == 'all')
                <h6 class="modal-p">@if($special->product3size == 'Regular') First @endif {{ $special->product3category }} {{ $special->product3size }}</h6>
                <select name="product_3" id="product_3_name">
                    @foreach($products as $product)
                        @if($product->category->name == $special->product3category)
                            <option value="{{ $product->name }} {{ $special->product3size }}">{{ $product->name }}</option>
                        @endif
                    @endforeach
                </select>
                <hr>

                    @if($special->product3category == 'Chicken Wings')
                        <div class="row">
                            <div class="col-12">
                                <h6>Choose Sauce:</h6>
                            </div>
                            <div class="col-6">
                                <label class="form-check-label chee" id="check-label">Honey Garlic
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Honey Garlic" checked>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Honey Mustard
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Honey Mustard">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Mild
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Mild">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">No Sauce
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="No Sauce">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="form-check-label chee" id="check-label">Medium
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Medium">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Daves Hot Sauce
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Daves Hot Sauce">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">BBQ
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="BBQ">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    @endif

            @else
                <h6 class="modal-p">{{ $special->product3 }} {{ $special->product3size }}</h6>
                <input type="hidden" id="product_3_name" value="{{ $special->product3 }} {{ $special->product3size }}">
                <hr>

                    @if($special->product3category == 'Chicken Wings')
                        <div class="row">
                            <div class="col-12">
                                <h6>Choose Sauce:</h6>
                            </div>
                            <div class="col-6">
                                <label class="form-check-label chee" id="check-label">Honey Garlic
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Honey Garlic" checked>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Honey Mustard
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Honey Mustard">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Mild
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Mild">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">No Sauce
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="No Sauce">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="form-check-label chee" id="check-label">Medium
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Medium">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Daves Hot Sauce
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Daves Hot Sauce">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">BBQ
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="BBQ">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    @endif

            @endif
        @endif


        @if($special->product4)
            @if($special->product4 == 'all')
            <h6 class="modal-p">@if($special->product3size == 'Regular') Second @endif {{ $special->product4category }} {{ $special->product4size }}</h6>
            <select name="product_4" id="product_4_name">
                @foreach($products as $product)
                    @if($product->category->name == $special->product4category)
                        <option value="{{ $product->name }} {{ $special->product4size }}">{{ $product->name }}</option>
                    @endif
                @endforeach
            </select>
                        <hr>
                @if($special->product4category == 'Chicken Wings')
                        <div class="row">
                            <div class="col-12">
                                <h6>Choose Sauce:</h6>
                            </div>
                            <div class="col-6">
                                <label class="form-check-label chee" id="check-label">Honey Garlic
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Honey Garlic" checked>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Honey Mustard
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Honey Mustard">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Mild
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Mild">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">No Sauce
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="No Sauce">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="form-check-label chee" id="check-label">Medium
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Medium">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Daves Hot Sauce
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Daves Hot Sauce">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">BBQ
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="BBQ">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    @endif
            <hr>
            @else
            <h6 class="modal-p">{{ $special->product4 }} {{ $special->product4size }}</h6>
            <input type="hidden" id="product_4_name" value="{{ $special->product4 }} {{ $special->product4size }}">

                        @if($special->product4category == 'Chicken Wings')
                        <div class="row">
                            <div class="col-12">
                                <h6>Choose Sauce:</h6>
                            </div>
                            <div class="col-6">
                                <label class="form-check-label chee" id="check-label">Honey Garlic
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Honey Garlic" checked>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Honey Mustard
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Honey Mustard">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Mild
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Mild">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">No Sauce
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="No Sauce">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="form-check-label chee" id="check-label">Medium
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Medium">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Daves Hot Sauce
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="Daves Hot Sauce">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">BBQ
                                    <input class="form-check-input one_souce_chicken" onclick="ChangePrice()" name="one-souce" type="radio" id="souce_chicken" value="BBQ">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <h6>Additional Sauce ($1.50):</h6>
                            </div>
                            <div class="col-6">
                                <label class="form-check-label chee" id="check-label">Honey Garlic
                                    <input class="form-check-input more_souce_chicken" onclick="SpecialPrice()" name="one-honey" type="checkbox" id="souce_chicken" value="1.5">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Honey Mustard
                                    <input class="form-check-input more_souce_chicken" onclick="SpecialPrice()" name="one-mustard" type="checkbox" id="souce_chicken" value="1.5">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Mild
                                    <input class="form-check-input more_souce_chicken" onclick="SpecialPrice()" name="one-mild" type="checkbox" id="souce_chicken" value="1.5">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Homemade Garlic Sauce
                                    <input class="form-check-input more_souce_chicken" onclick="SpecialPrice()" name="one-homemade" type="checkbox" id="souce_chicken" value="1.5">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="form-check-label chee" id="check-label">Medium
                                    <input class="form-check-input more_souce_chicken" onclick="SpecialPrice()" name="one-medium" type="checkbox" id="souce_chicken" value="1.5">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="form-check-label chee" id="check-label">Daves Hot Sauce
                                    <input class="form-check-input more_souce_chicken" onclick="SpecialPrice()" name="one-daves" type="checkbox" id="souce_chicken" value="1.5">
                                    <span class="checkmark"></span>
                                </label>
                                    <label class="form-check-label chee" id="check-label">BBQ
                                        <input class="form-check-input more_souce_chicken" onclick="SpecialPrice()" name="one-plum" type="checkbox" id="souce_chicken" value="1.5">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
                        </div>
                        @endif
            <hr>
            @endif
        @endif

        @if($special->product5)
            @if($special->product5size)
            <h6 class="modal-p">@if($special->product5size == 'Can') First {{ $special->product5size }} of Pop @else {{ $special->product5 }} {{ strtoupper($special->product5size) }} @endif</h6>
            <select name="product_5" id="product_5_select">
                @foreach($products as $product)
                    @if($product->category->name == $special->product5 and $product->drink_size == $special->product5size)
                        <option value="{{ $product->name }}">{{ $product->name }}</option>
                    @endif
                @endforeach
            </select>

            <hr>

            @else
            <h6 class="modal-p">{{ $special->product5 }}</h6>
            <select name="product_5" id="product_5_select">
                @foreach($products as $product)
                    @if($product->category->name == $special->product5)
                        <option value="{{ $product->name }}">{{ $product->name }}</option>
                    @endif
                @endforeach
            </select>
            <hr>

            @endif
        @endif

        @if($special->product6)
            @if($special->product6size)
            <h6 class="modal-p">@if($special->product5size == 'Can') Second {{ $special->product6size }} of Pop @else {{ $special->product6 }} {{ strtoupper($special->product6size) }} @endif</h6>
            <select name="product_6" id="product_6_select">
                @foreach($products as $product)
                    @if($product->category->name == $special->product6 and $product->drink_size == $special->product6size)
                        <option value="{{ $product->name }}">{{ $product->name }}</option>
                    @endif
                @endforeach
            </select>

            <hr>
            @else
            <h6 class="modal-p">{{ $special->product6 }}</h6>
            <select name="product_6" id="product_6_select">
                @foreach($products as $product)
                    @if($product->category->name == $special->product6)
                        <option value="{{ $product->name }}">{{ $product->name }}</option>
                    @endif
                @endforeach
            </select>
            <hr>
            @endif
        @endif
            <h5 class="modal-p">Special Instructions</h5>
            This section is for cooking & preparation instructions (like 'well-done'), it is not for adding toppings or sides to your order (like 'extra cheese'). (maximum 80 characters)
            <textarea name="special_instruction_special" id="special_instruction_special" cols-6 rows="3" style="margin-top: 10px"></textarea>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="AddSpecial" onclick="YourOrder()" data-dismiss="modal" data-toggle="modal" data-target="">Add to Your Order</button>
    </div>
</form>