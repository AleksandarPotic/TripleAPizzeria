@extends('admin.layouts.app')
@section('active9','active')
@section('body-part')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                New Pizza Topping
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('customize.index') }}">Customizes</a></li>
                <li class="active">New</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-yellow">
                        <div class="box-header with-border">
                            <div class="col-sm-1">
                                <a href="{{ route('customize.index') }}">
                                    <button class="btn btn-warning btn-flat btn-block">Back</button>
                                </a>
                            </div>
                            <div class="col-sm-7 col-sm-offset-2">
                                @include('admin.layouts.errors.error')
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('customize.store') }}" method="POST">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter name" required>
                                </div>
                                <div class="form-group">
                                    <label>Customize category</label>
                                    <select class="form-control" name="customize_category">
                                        <option value="Cheeses" selected>Cheeses</option>
                                        <option value="Meats">Meats</option>
                                        <option value="Veggies">Veggies</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Customize category</label>
                                    <select class="form-control" name="regular_premium">
                                        <option value="regular" selected>Regular</option>
                                        <option value="premium">Premium</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Small Price</label>
                                    <input type="number" name="customize_price" step="any" value="0.80" class="form-control" id="exampleInputName" placeholder="Enter customize small price" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Medium Price</label>
                                    <input type="number" name="medium_price" step="any" value="1.25" class="form-control" id="exampleInputName" placeholder="Enter customize medium price" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Large Price</label>
                                    <input type="number" name="large_price" step="any" value="1.60" class="form-control" id="exampleInputName" placeholder="Enter customize large price" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">XLG Price</label>
                                    <input type="number" name="xlg_price" step="any" value="1.95" class="form-control" id="exampleInputName" placeholder="Enter customize xlg price" required>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
@endsection