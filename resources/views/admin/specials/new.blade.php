@extends('admin.layouts.app')
@section('active12','active')
@section('body-part')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                New Special
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('specials.index') }}">Users</a></li>
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
                                <a href="{{ route('specials.index') }}">
                                    <button class="btn btn-warning btn-flat btn-block">Back</button>
                                </a>
                            </div>
                            <div class="col-sm-7 col-sm-offset-2">
                                @include('admin.layouts.errors.error')
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('specials.store') }}" method="POST">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputName" placeholder="Enter name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPrice">Description</label>
                                    <input type="text" class="form-control" name="descriptions" id="exampleInputPrice" placeholder="Enter description" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPrice">Price</label>
                                    <input type="number" name="price" step="any" class="form-control" id="exampleInputPrice" placeholder="Enter price" required>
                                </div>
                                <div class="form-group">
                                    <label>Pizza 1</label>
                                    <select class="form-control" name="product1">
                                        <option value="">No</option>
                                        <option value="all">All</option>
                                        @foreach($products as $product)
                                            @if($product->category->name == 'Pizza')
                                                <option value="{{ $product->name }}">{{ $product->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Size</label>
                                    <input type="text" class="form-control" name="pizza1size" id="exampleInputName" placeholder="Enter size">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Number of Topping(s)</label>
                                    <input type="number" class="form-control" name="pizza1toppings" id="exampleInputName" placeholder="Enter number">
                                </div>
                                <div class="form-group">
                                    <label>Pizza 2</label>
                                    <select class="form-control" name="product2">
                                        <option value="">No</option>
                                        <option value="all">All</option>
                                        @foreach($products as $product)
                                            @if($product->category->name == 'Pizza')
                                                <option value="{{ $product->name }}">{{ $product->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Size</label>
                                    <input type="text" class="form-control" name="pizza2size" id="exampleInputName" placeholder="Enter size">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Number of Topping(s)</label>
                                    <input type="number" class="form-control" name="pizza2toppings" id="exampleInputName" placeholder="Enter number">
                                </div>
                                <div class="form-group">
                                    <label>Product 3</label>
                                    <select class="form-control" name="product3">
                                        <option value="">No</option>
                                        <option value="all">All</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->name }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product 3 Category</label>
                                    <select class="form-control" name="product3category">
                                        <option value="">No</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Size of product 3</label>
                                    <input type="text" class="form-control" name="product3size" id="exampleInputName" placeholder="Enter size">
                                </div>
                                <div class="form-group">
                                    <label>Product 4</label>
                                    <select class="form-control" name="product4">
                                        <option value="">No</option>
                                        <option value="all">All</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->name }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product 4 Category</label>
                                    <select class="form-control" name="product4category">
                                        <option value="">No</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Size of product 4</label>
                                    <input type="text" class="form-control" name="product4size" id="exampleInputName" placeholder="Enter size">
                                </div>


                                <div class="form-group">
                                    <label>Product 5</label>
                                    <select class="form-control" name="product5">
                                        <option value="">No</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Size of product 5</label>
                                    <input type="text" class="form-control" name="product5size" id="exampleInputName" placeholder="Enter size">
                                </div>

                                <div class="form-group">
                                    <label>Product 6</label>
                                    <select class="form-control" name="product6">
                                        <option value="">No</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Size of product 6</label>
                                    <input type="text" class="form-control" name="product6size" id="exampleInputName" placeholder="Enter size">
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