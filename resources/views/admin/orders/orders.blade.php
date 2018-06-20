@extends('admin.layouts.app')
@section('active4','active')
@section('body-part')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <div class="col-sm-1">
                    Orders
                </div>
                <p id="update_status">
                    <input type="hidden" id="value_status" value="{{ $status->status }}">
                </p>
                <div class="col-sm-3">
                    <label class="switch">
                        <input type="checkbox" id="status_on_off" @if($status->status == '1') checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Online Orders</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Orders</h3><br>
                            <button class="btn btn-flat btn-success" data-toggle="modal" data-target="#model-finish-all">Clear All Orders</button>
                            <br>
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="alert alert-danger alert-dismissible" id="alert-danger" style="display: none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-ban"></i>The order was rejected!
                                </div>
                                <div class="alert alert-info alert-dismissible" id="alert-info" style="display: none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-check"></i>The Email was sent successfully!
                                </div>
                                <div class="alert alert-success alert-dismissible" id="alert-finish" style="display: none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-check"></i>Clear Order!
                                </div>
                                <div class="alert alert-success alert-dismissible" id="alert-finish-all" style="display: none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-check"></i>Clear All Orders!
                                </div>
                                <div class="alert alert-success alert-dismissible" id="alert-s-on" style="display: none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-check"></i>Orders ON!
                                </div>
                                <div class="alert alert-danger alert-dismissible" id="alert-s-off" style="display: none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-ban"></i>Orders OFF!
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="count_orders1" value="{{ $orders->count() }}">
                        <div style="display: none;" id="reload_status">
                            <input type="hidden" id="count_orders2" value="{{ $orders->count() }}">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped">
                                    <thead>
                                    @if($orders->count() != 0)
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Order Type</th>
                                        <th>Total Price</th>
                                        <th>Date & Time</th>
                                        <th>Time Wanted</th>
                                        <th>Info</th>
                                        <th>Clear</th>
                                        <th>Print</th>
                                    </tr>
                                    @endif
                                    </thead>
                                    <tbody>
                                    @if($orders->count() != 0)
                                        @foreach($orders as $order)
                                            <tr id="tr-{{ $order->id }}" style="@if(!$order->status) background-color:white @else background-color:lightgreen @endif;  ">
                                                <td>{{ $order->id }}</td>
                                                <input type="hidden" id="status_id{{ $order->id }}" value="{{ $order->status }}">
                                                <td id="id-name-{{ $order->id }}">{{ $order->name }}</td>
                                                <th>{{ strtoupper($order->order_type) }}</th>
                                                <td id="id-totalPrice-{{ $order->id }}">{{ $order->total_price }}</td>
                                                <!--
                                                <td>@if($order->minutes) {{ $order->minutes }} minute(s) @else - @endif</td>
                                                -->
                                                <td>{{ date('Y-m-d h:i A',strtotime($order->created_at)) }}</td>
                                                <td>@if($order->order_time_type == 'Order For Later') {{ $order->order_time }} @else ASAP @endif</td>
                                                <td>
                                                    <button class="btn btn-info btn-block btn-flat" onclick="InfoId({{ $order->id }}); StatusOrder({{ $order->status }})" data-toggle="modal" data-target="#modalinformation-{{ $order->id }}">Info</button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success btn-block btn-flat" onclick="FinishedOrder({{ $order->id }})" data-toggle="modal" data-target="#model-finish" @if(!$order->status) disabled @endif>Clear</button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-warning btn-block btn-flat" onclick="Print('divname{{ $order->id }}')" @if(!$order->status) disabled @endif>Print</button>
                                                </td>
                                                <!-- Print -->
                                                <td style="display: none;">
                                                    <div id="divname{{ $order->id }}">
                                                        <h4><b>USER INFORMATION:</b></h4>
                                                        <table class="table table-bordered">
                                                            <thead style="border-bottom: 2px solid black">
                                                            <tr>
                                                                <th>Name: {{ $order->name }}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Email: {{ $order->email }}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Number: {{ $order->number }}</th>
                                                            </tr>
                                                            @if($order->street_number)
                                                            <tr>
                                                                <th>Address: {{ $order->street_number }} {{ $order->address }}</th>
                                                            </tr>
                                                            @endif
                                                            @if($order->buzzer)
                                                            <tr>
                                                                <th>Buzzer: {{ $order->buzzer }}</th>
                                                            </tr>
                                                            @endif
                                                            @if($order->apartment_number)
                                                            <tr>
                                                                <th>Apartment number: {{ $order->apartment_number }}</th>
                                                            </tr>
                                                            @endif
                                                            @if($order->postal_code)
                                                            <tr>
                                                                <th>Postal Code: {{ $order->postal_code }}</th>
                                                            </tr>
                                                            @endif
                                                            <tr>
                                                                <th>Payment Type: {{ $order->payment_type }} </th>
                                                            </tr>
                                                            @if($order->transaction_id)
                                                            <tr>
                                                                <th>Transaction ID: {{ $order->transaction_id }} </th>
                                                            </tr>
                                                            @endif
                                                            @if($order->specify_text_order)
                                                            <tr>
                                                                <th>Special Instructions: {{ $order->specify_text_order }}</th>
                                                            </tr>
                                                            @endif
                                                            <tr>
                                                                <th>Order Type: {{ $order->order_type }}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Time Wanted: @if($order->order_time_type == 'Order For Later') {{ $order->order_time }} @else ASAP @endif</th>
                                                            </tr>
                                                            </thead>
                                                        </table>
                                                        <h4><b>ORDER:</b></h4>
                                                        <table class="table table-bordered">
                                                            <thead style="border-bottom: 2px solid black">
                                                            @foreach(unserialize($order->cart) as $item)
                                                                <tr>
                                                                    <td>
                                                                        Name: <h4>{{ $item->name }}</h4>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Qty: <h4>{{ $item->qty }}</h4>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Size: <h4>{{ strtoupper($item->options->size) }}</h4>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Customization/Extras: <h4>
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
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        No toppings: <h4>
                                                                            @if($item->options->no_toppings) @foreach($item->options->no_toppings as $topping) @if($topping) <b style="color:red;">{{ strtoupper($topping) }}</b><br>@endif @endforeach @endif
                                                                        </h4>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Special instructions: <h4>
                                                                            @if($item->options->specify_text) <font color="red"><b>{{ strtoupper($item->options->specify_text) }}</b></font><br> @endif
                                                                            @if($item->options->special_instruction_special) <b style="color: red;">{{ $item->options->special_instruction_special }}</b> <br>@endif
                                                                        </h4>
                                                                    </td>
                                                                </tr>
                                                                <tr style="border-bottom: 2px solid black">
                                                                    <td>
                                                                        Price($): <h4>{{ $item->price * $item->qty }}</h4>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td class="text-left">
                                                                    <h4><b>Total Price($): {{ $order->total_price }}</b></h4>
                                                                </td>
                                                            </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </td>
                                                <!-- ./Print -->
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>
                                                <div class="alert alert-warning alert-dismissible">
                                                    <i class="icon fa fa-warning"></i>There are no Online Orders at the moment.
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Modal Delete -->
                        <div class="modal fade modal-delete" id="model-de" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <input type="hidden" id="del_id" value="">
                                        <p>Do you really want to reject this order?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-flat delete-submit" data-dismiss="modal">Reject</button>
                                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Modal For Finished -->
                        <div class="modal fade modal-delete" id="model-finish" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <input type="hidden" id="finish_id" value="">
                                        <p>Do you really want to clear this order?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success btn-flat" id="finish_button" data-dismiss="modal">Clear</button>
                                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Modal For Finished -->
                        <div class="modal fade modal-delete" id="model-finish-all" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <input type="hidden" id="finish_id" value="">
                                        <p>Do you really want to clear all orders?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success btn-flat" id="finish_all_button" data-dismiss="modal" onclick="ClearAll()">Clear All Orders</button>
                                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Info Modal -->
                        <div class="modal fade modal-information">

                            <div class="modal-dialog" id="modal-css">
                                <div class="modal-content">
                                    <p id="modal-info">

                                    </p>
                                    <div class="modal-footer">
                                        <div class="col-lg-12" id="decline-div">
                                            <div class="col-lg-2 col-lg-offset-4">
                                                <button class="btn btn-success btn-block btn-flat" value="" id="accept-button">Accept</button>
                                            </div>
                                            <div class="col-lg-2">
                                                <button class="btn btn-danger btn-block btn-flat" value="" id="decline-button" data-dismiss="modal" data-toggle="modal" data-target="#model-de">Reject</button>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-lg-12" id="accept-div">
                                            <div class="col-lg-4 col-lg-offset-4">
                                                <input type="number" id="enter-minutes" class="form-control" placeholder="Enter minute(s)" required>
                                                <label for="enter-minutes" id="label_minutes" style="display: none; color: rgb(217,83,79);">You need to enter minutes!</label>

                                                <input type="hidden" id="send-email">
                                                <input type="hidden" id="order-id">
                                                <input type="hidden" id="order-status">
                                                <input type="hidden" id="order-time-status-1">
                                                <br>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="button" id="done_submit" onclick="SubmitMail()" class="btn btn-primary btn-flat btn-block" data-dismiss="modal">Done</button>
                                                <br>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="button" id="close_id" class="btn btn-default btn-flat btn-block" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-lg-offset-4" id="alert-success" style="display: none">
                                            <div class="alert alert-success alert-dismissible">
                                                <i class="icon fa fa-check"></i>The order was accepted!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /. Info modal -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <audio id="myAudio">
        <source src="{{ asset('song/sound.mp3') }}" type="audio/mpeg">
    </audio>
@endsection
@section('script-part')

    <script>

        function Print(x) {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(x).innerHTML;

            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
            location.reload();
        }

        function ClearAll() {
            var x = 'yes';
            $.post('/admin/orders/clearAll', {'id': x,'_token': $('input[name=_token]').val()}, function (data) {
                $("#alert-finish-all").show(200);
                setTimeout(function(){ $("#alert-finish-all").hide(200); }, 3000);
            });
        }
        
        function StatusOrder(status) {
            if (status) {
                $("#decline-div").css({'display': 'none'});
                $("#accept-div").css({'display': ''});
            } else {
                $("#accept-div").css({'display': 'none'});
                $("#decline-div").css({'display': ''});
            }
        }
        function FinishedOrder(x) {
            $("#finish_id").val(x);
        }

        function InfoId(x){
            $(".modal-information").attr('id','modalinformation-'+ x);
            $("#order-id").val(x);
            $("#accept-button").val(x);
            $("#decline-button").val(x);
            $("#enter-minutes").val('');

            //alert($("#myAudio").currentTime);
            $("#myAudio").trigger('pause');

            $.post('/admin/orders/info', {'id': x,'_token': $('input[name=_token]').val()}, function (data) {
                $("#modal-info").html(data);
                var order_time_status = $("#order_time_status").val();
                $("#order-time-status-1").val(order_time_status);

                if (order_time_status == '1')
                {
                    $("#accept-div").css({'display': 'none'});
                }
            });
        }
        function SubmitMail(){
            var minutes = $("#enter-minutes").val();
            var id = $("#order-id").val();

            if (minutes == ''){
                $("#done_submit").attr('data-dismiss','');
                $("#enter-minutes").css({"border": "1px solid rgb(217,83,79)"});
                $("#label_minutes").show();
            } else {
                $("#done_submit").attr('data-dismiss','modal');
                $.post('/admin/orders/done', {'id': id, 'minutes': minutes, '_token': $('input[name=_token]').val()}, function (data) {
                    if (data == 'yes') {
                        $("#table_id").load(location.href + " #table_id");
                        $("#alert-info").show(200);
                        setTimeout(function(){ $("#alert-info").hide(200); }, 3000);
                    }
                });
            }
        }

        $(document).ready(function () {

            $("#finish_button").click(function () {

                var x = $("#finish_id").val();

                $.post('/admin/orders/finish', {'id': x,'_token': $('input[name=_token]').val()}, function (data) {
                    if (data == 'yes') {
                        $("#alert-finish").show(200);
                        setTimeout(function(){ $("#alert-finish").hide(200); }, 3000);
                    }
                });

            });

            $("#decline-button").click(function () {

                var x = $("#decline-button").val();
                $(".delete-submit").val(x);
            });

            $('.delete-submit').click(function () {

                var id = $('.delete-submit').val();
                $.post('/admin/orders/destroy', {'id': id,'_token': $('input[name=_token]').val()}, function (data) {
                    $("#table_id").load(location.href + " #table_id");
                    $("#alert-danger").show(200);
                    setTimeout(function(){ $("#alert-danger").hide(200); }, 3000);
                });
            });

            $('#accept-button').click(function () {

                var x = $('#accept-button').val();
                var status = $("#status_id" + x).val();
                if (status) {
                    //$('#tr-' + x).css("background-color", "lightgreen");
                    $.post('/admin/orders/status', {'id': x,'_token': $('input[name=_token]').val()}, function (data) {
                        $("#table_id").load(location.href + " #table_id");
                        $("#alert-success").show(200);
                        setTimeout(function(){ $("#alert-success").hide(200); }, 3000);
                        $("#decline-div").css({'display': 'none'});

                        var order_time_status = $("#order-time-status-1").val();
                        if (order_time_status == '1')
                        {
                            $("#accept-div").css({'display': 'none'});
                        } else {
                            $("#accept-div").css({'display': ''});
                        }
                    });
                };
            });

            $("#enter-minutes").click(function () {
                $("#enter-minutes").css({"border": ""});
                $("#label_minutes").hide();
            });
            $("#close_id").click(function () {
                $("#enter-minutes").css({"border": ""});
                $("#label_minutes").hide();
            });

            $("#status_on_off").change(function () {
                var value = $("#value_status").val();
                $.post('/admin/orders/onOff', {'value': value,'_token': $('input[name=_token]').val()}, function (data) {
                    if (data == '1') {
                        $("#alert-s-on").show(200);
                        setTimeout(function(){ $("#alert-s-on").hide(200); }, 2000);
                    } else {
                        $("#alert-s-off").show(200);
                        setTimeout(function(){ $("#alert-s-off").hide(200); }, 2000);
                    }
                });
            });


            var song = $("#myAudio");

            var i = $("#count_orders1").val();

            setInterval(function() {

                //$("#update_status").load(location.href + " #update_status");
                $("#reload_status").load(location.href + " #reload_status");
                var y = $("#count_orders2").val();

                if (y > i) {

                    $("#table_id").load(location.href + " #table_id");
                    song.trigger('play');
                }

                i = y;

            }, 2000);

            $("#myAudio").on('ended',function () {
                $("#myAudio").trigger('play');
            })

        });

    </script>
    @endsection