 <div class="modal-header col-sm-12">
     <div class="col-sm-1"><h4><b>Name</b></h4></div>
     <div class="col-sm-5" id="modal-name"><h4>{{ $order->name }}</h4></div>
     <div class="col-sm-1"><h4><b>Email</b></h4></div>
     <div class="col-sm-5" id="modal-email"><h4>{{ $order->email }}</h4></div>
     <div class="col-sm-1"><h4><b>Number</b></h4></div>
     <div class="col-sm-5" id="modal-number"><h4>{{ $order->number }}</h4></div>
     @if($order->address)
     <div class="col-sm-1"><h4><b>Address</b></h4></div>
     <div class="col-sm-5" id="modal-address"><h4>{{ $order->street_number }} {{ $order->address }}</h4></div>
     @endif
     @if($order->buzzer)
     <div class="col-sm-1"><h4><b>Buzzer</b></h4></div>
     <div class="col-sm-5" id="modal-address"><h4>{{ $order->buzzer }}</h4></div>
     @endif
     @if($order->apartment_number)
     <div class="col-sm-2"><h4><b>Apartment Number</b></h4></div>
     <div class="col-sm-4" id="modal-address"><h4>{{ $order->apartment_number }}</h4></div>
     @endif
     <div class="col-sm-1"><h4><b>Date & Time</b></h4></div>
     <div class="col-sm-5" id="modal-postal"><h4>{{ date('Y-m-d h:i A',strtotime($order->created_at)) }}</h4></div>
     @if($order->postal_code)
         <div class="col-sm-1"><h4><b>Postal code</b></h4></div>
         <div class="col-sm-5" id="modal-postal"><h4>{{ $order->postal_code }}</h4></div>
     @endif
     <div class="col-sm-12" id="modal-postal">
         <h4><b>Payment Type:</b> <font color="red">{{ $order->payment_type }}</font></h4>
     </div>
     @if($order->transaction_id)
     <div class="col-sm-12" id="modal-postal">
         <h4><b>Transaction ID:</b> <font color="red">{{ $order->transaction_id }}</font></h4>
     </div>
     @endif
     <div class="col-sm-12" id="modal-postal">
         <h4><b>Special Instructions:</b> <font color="red">{{ $order->specify_text_order }}</font></h4>
     </div>
     <div class="col-sm-12" id="modal-postal">
         <h4><b>Time Wanted:</b> <font color="red">@if($order->order_time_type == 'Order For Later') {{ $order->order_time }} @else ASAP @endif</font></h4>
         <input type="hidden" id="order_time_status" @if($order->order_time_type == 'Order For Later') value="1" @endif>
     </div>
 </div>
 <div class="modal-body col-sm-12">
     <div class="table-responsive">
         <table id="exampleInfo" class="table table-bordered table-striped">
             <head>
                 <tr>
                     <th>Name</th>
                     <th>Quantity</th>
                     <th>Size</th>
                     <th>Customization/Extras</th>
                     <th>No Toppings</th>
                     <th>Special Instructions</th>
                     <th>Subtotal Price($)</th>
                 </tr>
             </head>
             <body>
                 @foreach($items as $item)
                     <tr>
                         <td>
                             <h4>{{ $item->name }} @if($item->options->description_special) - {{ $item->options->description_special }} @endif</h4>
                         </td>
                         <td>
                             <h4>{{ $item->qty }}</h4>
                         </td>
                         <td>
                             <h4>{{ strtoupper($item->options->size) }}</h4>
                         </td>
                         <td>
                             <h4>
                                 @if($item->options->choose_calzones) <b>Oven Baked or Deep-Fried:</b> {{ $item->options->choose_calzones }}<br> @endif
                                 @if($item->options->donairs_topping) Toppings: {{ substr($item->options->donairs_topping,0,-2) }}<br> @endif
                                 @if($item->options->cheese_size) <b>Extra Cheese:</b> {{ $item->options->cheese_size }}<br> @endif
                                 @if($item->options->meat_size) <b>Extra Meat:</b> {{ $item->options->meat_size }}<br> @endif
                                 @if($item->options->peppers) <b>Extra Peppers:</b> {{ substr($item->options->peppers,0,-2) }}<br> @endif
                                 @if($item->options->donair_size) <b>Donair Sauce:</b> {{ $item->options->donair_size }}<br> @endif
                                 @if($item->options->product_category == 'Seafood') @if($item->options->extra_piece) <b>Extra Piece:</b> Yes<br> @else <b>Extra Piece:</b> No<br> @endif @endif
                                 @if($item->options->one_souce_chicken) <b>Sauce:</b> {{ substr($item->options->one_souce_chicken,0,-2) }}<br> @endif
                                 @if($item->options->product_category == 'Chicken Wings')  @if($item->options->more_souce_chicken) <b>Extra Sauces:</b> {{ substr($item->options->more_souce_chicken,0,-2) }}<br> @endif @endif
                                 @if($item->options->product_category == 'Chicken') @if($item->options->more_souce_chicken) <b>Additional Sauces:</b> {{ substr($item->options->more_souce_chicken,0, -2) }}<br> @endif @endif
                                 @if($item->options->product_category == 'Chicken Wings' or $item->options->product_category == 'Chicken') @if($item->options->homemade_garlic_souce) <b>Homemade Garlic Sauce:</b> Yes<br> @else <b>Homemade Garlic Sauce:</b> No<br> @endif @endif
                                 @if($item->options->options_for_souce) <b>Option for Sauce:</b> {{ $item->options->options_for_souce }}<br> @endif
                                 @if($item->options->crust) <b>Crust:</b> {{ $item->options->crust }}<br> @endif
                                 @if($item->options->crust_type) <b>Crust Type:</b> {{ $item->options->crust_type }}<br> @endif
                                 @if($item->options->cheeses_name) <b>Cheese:</b> @foreach($item->options->cheeses_name as $topping) {{ $topping }},  @endforeach <br> @endif
                                 @if($item->options->meats_name) <b>Meats:</b> @foreach($item->options->meats_name as $topping) {{ $topping }},  @endforeach <br> @endif
                                 @if($item->options->veggies_name) <b>Veggies:</b> @foreach($item->options->veggies_name as $topping) {{ $topping }},  @endforeach <br> @endif
                                     @if($item->options->product_category == 'Special')
                                         @if($item->options->pizza1special) <b>{{ $item->options->pizza1special }}</b> <br>@endif
                                         @if($item->options->toppingpizza1special) <b>Toppings:</b> {{ substr($item->options->toppingpizza1special,0,-2) }} <br>@endif
                                         @if($item->options->pizza2special) <b>{{ $item->options->pizza2special }}</b> <br>@endif
                                         @if($item->options->toppingpizza2special) <b>Toppings:</b> {{ substr($item->options->toppingpizza2special,0,-2) }} <br>@endif
                                         @if($item->options->product3special) <b>{{ $item->options->product3special }}</b> <br>@endif
                                         @if($item->options->product4special) <b>{{ $item->options->product4special }}</b> <br>@endif
                                         @if($item->options->one_souce_chicken_special) <b>Sauce:</b> {{ $item->options->one_souce_chicken_special }} <br>@endif
                                             @if($item->options->more_souce_chicken_special) <b>Extra Sauce:</b> {{ substr($item->options->more_souce_chicken_special,0,-2) }} <br>@endif
                                         @if($item->options->product5special) <b>{{ $item->options->product5special }}</b> <br>@endif
                                         @if($item->options->product6special) <b>{{ $item->options->product6special }}</b> <br>@endif
                                     @endif
                             </h4>
                         </td>
                         <td>
                             <h4>
                                 @if($item->options->no_toppings) @foreach($item->options->no_toppings as $topping) @if($topping) <b style="color: red;">{{ strtoupper($topping) }}</b><br>@endif @endforeach @endif
                             </h4>
                         </td>
                         <td>
                             <h4>
                                 @if($item->options->specify_text) <font color="red"><b>{{ strtoupper($item->options->specify_text) }}</b></font><br> @endif
                                     @if($item->options->special_instruction_special) <b style="color: red;">{{ $item->options->special_instruction_special }}</b> <br>@endif
                             </h4>
                         </td>
                         <td>
                             <h4>{{ number_format($item->price * $item->qty,2) }}</h4>
                         </td>
                     </tr>
                 @endforeach
                 <tr>
                     <td>

                     </td>
                     <td>

                     </td>
                     <td>

                     </td>
                     <td>

                     </td>
                     <td>

                     </td>
                     <td class="text-right">
                         <h4><b>Total Price($):</b></h4>
                     </td>
                     <td>
                         <h4><b>{{ $order->total_price }}</b></h4>
                     </td>
                 </tr>
             </body>
         </table>
     </div>
 </div>