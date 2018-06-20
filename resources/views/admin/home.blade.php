@extends('admin.layouts.app')
@section('active1','active')
@section('body-part')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <h1>Welcome to Dashboard Triple A Pizza</h1>
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
        </section>
        @if(Auth::user()->role->display_name == 'Workman')
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('orders.index') }}"><button class="btn btn-info btn-flat">Go to Order</button></a>
                    </div>
                </div>
            </section>
        @endif

    @can('admins.view', Auth::user())
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner" id="orders_count">
                            <h3>{{ $orders->count() }}</h3>

                            <p>Online Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a @can('orders', Auth::user()) href="{{ route('orders.index') }}" @endcan class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner" id="finished_count">
                            <h3>{{ $finishedOrders->count() }}</h3>

                            <p>Order History</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-cart"></i>
                        </div>
                        <a @can('orders', Auth::user()) href="{{ route('finishedOrders.index') }}" @endcan class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner" id="users_count">
                            <h3>{{ $users->count() }}</h3>

                            <p>Customers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a @can('users.view', Auth::user()) href="{{ route('users.index') }}" @endcan class="small-box-footer" style="color: rgb(218,140,16);">More info <i class="fa fa-arrow-circle-right" style="display: none"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner" id="products_count">
                            <h3>{{ $productsAll->count() }}</h3>

                            <p>Items on the Menu</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                        <a @can('products.view', Auth::user()) href="#" @endcan class="small-box-footer" style="color: rgb(0,149,81);">More info <i class="fa fa-arrow-circle-right" style="display: none"></i></a>
                    </div>
                </div>
            </div>
            @endcan
                <!-- /.row -->
            <div class="row">
                @can('admins.view', Auth::user())
                <div class="col-md-4">
                    <!-- USERS LIST -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Admins</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                                @foreach($admins as $admin)
                                    <li>
                                        <img src="{{ Storage::url($admin->image) }}" alt="User Image">
                                        <a class="users-list-name" href="#">{{ $admin->name }}</a>
                                        <span class="users-list-date">{{ $admin->created_at->diffForHumans() }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="{{ route('admins.index') }}" class="uppercase">View All Admins</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>
                <!-- /.col -->
                @endcan
            @can('products.view', Auth::user())
                <!-- PRODUCT LIST -->
                <div class="col-sm-8">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Recently Added Products</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">
                                @foreach($products as $product)
                                    <li class="item">
                                        <div class="product-info" style="margin-left: 10px;">
                                            <a href="{{ route('products.edit',$product->id) }}" class="product-title">
                                                {{ $product->name }}
                                            </a>
                                            <br>
                                            <span class="product-description">
                                                Category: {{ $product->category->name }}<br>
                                                Descriptions: {{ $product->descriptions }}
                                            </span>
                                        </div>
                                    </li>
                                    <!-- /.item -->
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                @endcan
            </div>
            @can('admins.view', Auth::user())
            <div class="row">
                <div class="col-lg-7">
                    <!-- quick email widget -->
                    <div class="box box-warning">
                        <div class="box-header">
                            <i class="fa fa-envelope"></i>

                            <h3 class="box-title">Send an Email to all TripleA Subscribers</h3>
                            <!-- tools box -->

                        </div>
                        <div class="box-body">
                            <div class="callout callout-success" id="send_success" style="display: none">
                                <h4>Successfully send!</h4>
                            </div>
                            <div class="callout callout-danger" id="send_danger" style="display: none">
                                <h4>Email not send!</h4>
                            </div>
                            <form action="{{ route('admin.send') }}" method="POST" id="form">
                                @csrf
                                <div class="form-group">
                                    <label for="emailto" id="label_emailto" style="display: none; color: rgb(217,83,79);">You need to enter an email!</label>
                                </div>
                                <div>
                          <textarea class="textarea" id="body_message" placeholder="Message" name="body_message"
                                    style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                                <div class="box-footer clearfix">
                                    <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                                        <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Calendar -->
                    <div class="box box-solid bg-yellow-gradient">
                        <div class="box-header">
                            <i class="fa fa-calendar"></i>

                            <h3 class="box-title">Calendar</h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-warning btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                        </div>
                    </div>
                    <!-- /.box -->

                </div>
                <!-- ./col -->
            </div>
                @endcan
        </section>
    </div>
    <!-- /.content-wrapper -->

@endsection
@section('script-part')
<script>

    $(document).ready(function () {

        $("#emailto").click(function () {
            $("#emailto").css({"border": "", "background-color": ""});
            $("#label_emailto").hide();
        });

        $("#sendEmail").click(function () {
            var body_message = $("#body_message").val();

                $.post('/admin/home/send', {'body_message': body_message ,'_token': $('input[name=_token]').val()}, function (data) {
                    if (data == 'yes') {
                        $("#form")[0].reset();
                        $("#send_success").show(200);
                        setTimeout(function(){ $("#send_success").hide(200); }, 3000);

                    }else {
                        $("#form")[0].reset();

                        $("#send_danger").show(200);
                        setTimeout(function(){ $("#send_danger").hide(200); }, 3000);
                    }
                });
        });
    });

</script>
@endsection