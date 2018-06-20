@extends('admin.layouts.app')
@section($categoryName,'active')
@section('activeCategory','active')
@section('body-part')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $categoryName }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">{{ $categorySlug }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Products</h3>
                            <br>
                            <div class="col-sm-1">
                                    <a href="{{ route('products.create',['category='.$categorySlug]) }}">
                                        <button class="btn btn-success btn-flat">New</button>
                                    </a>
                            </div>
                            <div class="col-sm-6 col-sm-offset-2">
                                @include('admin.layouts.errors.error')
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        @if($categoryName == 'Calzones' or $categoryName == 'Sauces' or $categoryName == 'Drinks' or $categoryName == 'Donairs' or $categoryName == 'Burgers' or $categoryName == 'Seafood' or $categoryName == 'Chicken' or $categoryName == 'Chicken Wings' or $categoryName == 'Sandwiches' or $categoryName == 'Munchies' or $categoryName == 'Desserts')
                                            <th>Price($)</th>
                                        @endif
                                        @if($categoryName == 'Burgers')
                                            <th>Platter($)</th>
                                        @endif
                                        @if($categoryName == 'Pizza' or $categoryName == 'Donairs' or $categoryName == 'Poutine' or $categoryName == 'Wraps' or $categoryName == 'Salads' or $categoryName == 'Subs' or $categoryName == 'Appetizers' or $categoryName == 'Nachos' or $categoryName == 'Garlic Fingers')
                                            <th>Small($)</th>
                                        @endif
                                        @if($categoryName == 'Pizza' or $categoryName == 'Garlic Fingers')
                                            <th>Medium($)</th>
                                        @endif
                                        @if($categoryName == 'Pizza' or $categoryName == 'Donairs' or $categoryName == 'Poutine' or $categoryName == 'Wraps' or $categoryName == 'Salads' or $categoryName == 'Subs' or $categoryName == 'Appetizers' or $categoryName == 'Nachos' or $categoryName == 'Garlic Fingers')
                                            <th>Large($)</th>
                                        @endif
                                        @if($categoryName == 'Pizza' or $categoryName == 'Garlic Fingers')
                                            <th>XLG($)</th>
                                        @endif
                                        @if($categoryName == 'Nachos' or $categoryName == "Donairs" or $categoryName == 'Calzones')
                                            <th>Extra Small Cheese or Meats($)</th>
                                        @endif
                                        @if($categoryName == 'Nachos' or $categoryName == 'Calzones')
                                            <th>Extra Large Cheese or Meats($)</th>
                                        @endif
                                        @if($categoryName == 'Nachos' or $categoryName == "Donairs" or $categoryName == 'Calzones')
                                            <th>Extra Cheese</th>
                                        @endif
                                        @if($categoryName == 'Nachos' or $categoryName == "Donairs" or $categoryName == 'Calzones')
                                            <th>Extra Meat</th>
                                        @endif
                                        @if($categoryName == 'Appetizers' or $categoryName == 'Donairs' or $categoryName == 'Subs')
                                            <th>Number of Pieces - Small</th>
                                        @endif
                                        @if($categoryName == 'Appetizers' or $categoryName == 'Donairs' or $categoryName == 'Subs')
                                            <th>Number of Pieces - Large</th>
                                        @endif
                                        @if($categoryName == 'Nachos' or $categoryName == 'Sauces' or $categoryName == "Donairs" or $categoryName == 'Subs' or $categoryName == 'Calzones' or $categoryName == 'Garlic Fingers')
                                            <th>Donair Small</th>
                                        @endif
                                        @if($categoryName == 'Nachos' or $categoryName == 'Sauces' or $categoryName == "Donairs" or $categoryName == 'Subs' or $categoryName == 'Calzones' or $categoryName == 'Garlic Fingers')
                                            <th>Donair Large</th>
                                        @endif
                                        @if($categoryName == 'Wraps')
                                            <th>Specialty</th>
                                        @endif
                                        @if($categoryName == 'Donairs')
                                            <th>Option for Sauce</th>
                                        @endif
                                        @if($categoryName == 'Munchies' or $categoryName == 'Desserts')
                                            <th>{{ $categoryName }} category</th>
                                        @endif
                                        @if($categoryName == 'Seafood')
                                            <th>Extra Piece</th>
                                        @endif
                                        @if($categoryName == 'Chicken Wings' or $categoryName == 'Chicken')
                                            <th>Homemade Garlic Sauce</th>
                                        @endif
                                        @if($categoryName == 'Pizza')
                                            <th>Toppings</th>
                                        @endif
                                            <th>Update</th>
                                            <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->descriptions }}</td>
                                            @if($categoryName == 'Calzones' or $categoryName == 'Sauces' or $categoryName == 'Drinks' or $categoryName == 'Donairs' or $categoryName == 'Burgers' or $categoryName == 'Seafood' or $categoryName == 'Chicken' or $categoryName == 'Chicken Wings' or $categoryName == 'Sandwiches' or $categoryName == 'Munchies' or $categoryName == 'Desserts')
                                                <td>{{ $product->price }}</td>
                                            @endif
                                            @if($categoryName == 'Burgers')
                                                <td>{{ $product->platter }}</td>
                                            @endif
                                            @if($categoryName == 'Pizza' or $categoryName == 'Donairs' or $categoryName == 'Poutine' or $categoryName == 'Wraps' or $categoryName == 'Subs' or $categoryName == 'Salads' or $categoryName == 'Appetizers' or $categoryName == 'Nachos' or $categoryName == 'Garlic Fingers')
                                                <td>{{ $product->small }}</td>
                                            @endif
                                            @if($categoryName == 'Pizza' or $categoryName == 'Garlic Fingers')
                                                <td>{{ $product->medium }}</td>
                                            @endif
                                            @if($categoryName == 'Pizza' or $categoryName == 'Donairs' or $categoryName == 'Poutine' or $categoryName == 'Wraps' or $categoryName == 'Subs' or $categoryName == 'Salads' or $categoryName == 'Appetizers' or $categoryName == 'Nachos' or $categoryName == 'Garlic Fingers')
                                                <td>{{ $product->large }}</td>
                                            @endif
                                            @if($categoryName == 'Pizza' or $categoryName == 'Garlic Fingers')
                                                <td>{{ $product->xlg }}</td>
                                            @endif
                                            @if($categoryName == 'Nachos' or $categoryName == "Donairs" or $categoryName == 'Calzones')
                                                <td>{{ $product->extra_small }}</td>
                                            @endif
                                            @if($categoryName == 'Nachos' or $categoryName == 'Calzones')
                                                <td>{{ $product->extra_large }}</td>
                                            @endif
                                            @if($categoryName == 'Nachos' or $categoryName == "Donairs" or $categoryName == 'Calzones')
                                                <td>@if($product->extra_cheese) Yes @else No @endif</td>
                                            @endif
                                            @if($categoryName == 'Nachos' or $categoryName == "Donairs" or $categoryName == 'Calzones')
                                                <td>@if($product->extra_meat) Yes @else No @endif</td>
                                            @endif
                                            @if($categoryName == 'Appetizers' or $categoryName == 'Donairs' or $categoryName == 'Subs')
                                                <td>{{ $product->small_size }}</td>
                                            @endif
                                            @if($categoryName == 'Appetizers' or $categoryName == 'Donairs' or $categoryName == 'Subs')
                                                <td>{{ $product->large_size }}</td>
                                            @endif
                                            @if($categoryName == 'Nachos' or $categoryName == 'Sauces' or $categoryName == "Donairs" or $categoryName == 'Subs' or $categoryName == 'Calzones' or $categoryName == 'Garlic Fingers')
                                                <td>{{ $product->donair_small }}</td>
                                            @endif
                                            @if($categoryName == 'Nachos' or $categoryName == 'Sauces' or $categoryName == "Donairs" or $categoryName == 'Subs' or $categoryName == 'Calzones' or $categoryName == 'Garlic Fingers')
                                                <td>{{ $product->donair_large }}</td>
                                            @endif
                                            @if($categoryName == 'Wraps')
                                                <td>@if($product->specialty) Yes @else No @endif</td>
                                            @endif
                                            @if($categoryName == 'Donairs')
                                                <td>@if($product->options_for_souce) Yes @else No @endif</td>
                                            @endif
                                            @if($categoryName == 'Munchies' or $categoryName == 'Desserts')
                                                <td>{{ $product->product_ctgy }}</td>
                                            @endif
                                            @if($categoryName == 'Seafood')
                                                <td>{{ $product->extra_piece }}</td>
                                            @endif
                                            @if($categoryName == 'Chicken Wings' or $categoryName == 'Chicken')
                                                <td>{{ $product->homemade_garlic_souce }}</td>
                                            @endif
                                            @if($categoryName == 'Pizza')
                                                <td>
                                                    @foreach($product->customizes as $pro_customize)
                                                        {{ $pro_customize->name }}<br>
                                                        @endforeach
                                                </td>
                                            @endif
                                                <td>
                                                    <a href="{{ route('products.edit',$product->id) }}">
                                                        <button class="btn btn-warning btn-block btn-flat">Update</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form id="delete-form-{{ $product->id }}" method="post" action="{{ route('products.destroy',$product->id) }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick="if(confirm('Do you really want to delete this product?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $product->id }}').submit();
                                                            }else{
                                                            event.preventDefault();
                                                            }">
                                                        <button class="btn btn-danger btn-flat btn-block">Delete</button>
                                                    </a>
                                                </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        @if($categoryName == 'Calzones' or $categoryName == 'Sauces' or $categoryName == 'Drinks' or $categoryName == 'Donairs' or $categoryName == 'Burgers' or $categoryName == 'Seafood' or $categoryName == 'Chicken' or $categoryName == 'Chicken Wings' or $categoryName == 'Sandwiches' or $categoryName == 'Munchies' or $categoryName == 'Desserts')
                                            <th>Price($)</th>
                                        @endif
                                        @if($categoryName == 'Burgers')
                                            <th>Platter($)</th>
                                        @endif
                                        @if($categoryName == 'Pizza' or $categoryName == 'Donairs' or $categoryName == 'Poutine' or $categoryName == 'Wraps' or $categoryName == 'Subs' or $categoryName == 'Salads' or $categoryName == 'Appetizers' or $categoryName == 'Nachos' or $categoryName == 'Garlic Fingers')
                                            <th>Small($)</th>
                                        @endif
                                        @if($categoryName == 'Pizza' or $categoryName == 'Garlic Fingers')
                                            <th>Medium($)</th>
                                        @endif
                                        @if($categoryName == 'Pizza' or $categoryName == 'Donairs' or $categoryName == 'Poutine' or $categoryName == 'Wraps' or $categoryName == 'Subs' or $categoryName == 'Salads' or $categoryName == 'Appetizers' or $categoryName == 'Nachos' or $categoryName == 'Garlic Fingers')
                                            <th>Large($)</th>
                                        @endif
                                        @if($categoryName == 'Pizza' or $categoryName == 'Garlic Fingers')
                                            <th>XLG($)</th>
                                        @endif
                                        @if($categoryName == 'Nachos' or $categoryName == "Donairs" or $categoryName == 'Calzones')
                                            <th>Extra Small Cheese or Meats($)</th>
                                        @endif
                                        @if($categoryName == 'Nachos' or $categoryName == 'Calzones')
                                            <th>Extra Large Cheese or Meats($)</th>
                                        @endif
                                        @if($categoryName == 'Nachos' or $categoryName == "Donairs" or $categoryName == 'Calzones')
                                            <th>Extra cheese</th>
                                        @endif
                                        @if($categoryName == 'Nachos' or $categoryName == "Donairs" or $categoryName == 'Calzones')
                                            <th>Extra meat</th>
                                        @endif
                                        @if($categoryName == 'Appetizers' or $categoryName == 'Donairs' or $categoryName == 'Subs')
                                            <th>Number of Pieces - Small</th>
                                        @endif
                                        @if($categoryName == 'Appetizers' or $categoryName == 'Donairs' or $categoryName == 'Subs')
                                            <th>Number of Pieces - Large</th>
                                        @endif
                                        @if($categoryName == 'Nachos' or $categoryName == 'Sauces' or $categoryName == "Donairs" or $categoryName == 'Subs' or $categoryName == 'Calzones' or $categoryName == 'Garlic Fingers')
                                            <th>Donair small</th>
                                        @endif
                                        @if($categoryName == 'Nachos' or $categoryName == 'Sauces' or $categoryName == "Donairs" or $categoryName == 'Subs' or $categoryName == 'Calzones' or $categoryName == 'Garlic Fingers')
                                            <th>Donair large</th>
                                        @endif
                                        @if($categoryName == 'Wraps')
                                            <th>Specialty</th>
                                        @endif
                                        @if($categoryName == 'Donairs')
                                            <th>Options for souce</th>
                                        @endif
                                        @if($categoryName == 'Munchies' or $categoryName == 'Desserts')
                                            <th>{{ $categoryName }} category</th>
                                        @endif
                                        @if($categoryName == 'Seafood')
                                            <th>Extra piece</th>
                                        @endif
                                        @if($categoryName == 'Chicken Wings' or $categoryName == 'Chicken')
                                            <th>Homemade garlic souce</th>
                                        @endif
                                        @if($categoryName == 'Pizza')
                                            <th>Toppings</th>
                                        @endif
                                        @can('products.update', Auth::user())
                                            <th>Update</th>
                                        @endcan
                                        @can('products.delete', Auth::user())
                                            <th>Delete</th>
                                        @endcan
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
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