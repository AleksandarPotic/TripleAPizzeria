@extends('admin.layouts.app')
@section('active8','active')
@section('body-part')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Order History
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Order History</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Order History</h3>
                            <br>
                            <br>
                            <div class="col-sm-1">
                                <a href="{{ route('finishedOrders.destroy') }}">
                                    <button class="btn btn-danger btn-flat">Delete Order History</button>
                                </a>
                            </div>
                            <div class="col-sm-6 col-sm-offset-3">
                                @include('admin.layouts.errors.error')
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Order Type</th>
                                        <th>Total Price($)</th>
                                        <th>Date & Time</th>
                                        <th>Time Wanted</th>
                                        <th>Information</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($finishedOrders as $finishedOrder)
                                        <tr>
                                            <td>{{ $finishedOrder->id }}</td>
                                            <td>{{ $finishedOrder->name }}</td>
                                            <th>{{ strtoupper($finishedOrder->order_type) }}</th>
                                            <td>{{ $finishedOrder->total_price }}</td>
                                            <td>{{ date('Y-m-d h:i A',strtotime($finishedOrder->created_at)) }}</td>
                                            <td>@if($finishedOrder->order_time_type == 'Order For Later') {{ $finishedOrder->order_time }} @else ASAP @endif</td>
                                            <td>
                                                <button class="btn btn-info btn-block btn-flat" onclick="InfoId({{ $finishedOrder->id }})" data-toggle="modal" data-target="#modalinformation-{{ $finishedOrder->id }}">Info</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Order Type</th>
                                        <th>Total Price($)</th>
                                        <th>Date & Time</th>
                                        <th>Time Wanted</th>
                                        <th>Information</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Info Modal -->
                            <div class="modal fade modal-information">

                                <div class="modal-dialog" id="modal-css">
                                    <div class="modal-content">
                                        <p id="modal-info">

                                        </p>
                                        <div class="modal-footer">
                                            <button type="button" id="close_id" class="btn btn-default btn-flat pull-right" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /. Info modal -->
                        </div>
                        <!-- /.box-body -->
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

@endsection
@section('script-part')

    <script>

        function InfoId(x){
            $(".modal-information").attr('id','modalinformation-'+ x);
            $("#order-id").val(x);

            $.post('/admin/finishedOrder/info', {'id': x,'_token': $('input[name=_token]').val()}, function (data) {
                $("#modal-info").html(data);
            });
        }

    </script>

    @endsection