<!doctype html>
<html lang="en">
<head>
    @include('admin.layouts.head')

</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
    @section($product->category->name,'active')
    @section('activeCategory','active')
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    @section('body-part')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Edit Product
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="{{ route('products.index',['category='.$product->category->slug]) }}">{{ $product->category->name }}</a></li>
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
                                    <a href="{{ route('products.index',['category='.$product->category->slug]) }}">
                                        <button class="btn btn-warning btn-flat btn-block">Back</button>
                                    </a>
                                </div>
                                <div class="col-sm-7 col-sm-offset-2">
                                    @include('admin.layouts.errors.error')
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('products.update',$product->id) }}" method="POST" id="form-id" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" id="id" value="{{ $product->id }}">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{ $product->name }}" required>
                                    </div>
                                    @if($product->category->name == 'Calzones' or $product->category->name == 'Sauces' or $product->category->name == 'Drinks' or $product->category->name == 'Munchies' or $product->category->name == 'Desserts' or $product->category->name == "Donairs" or $product->category->name == 'Burgers' or $product->category->name == 'Seafood' or $product->category->name == 'Chicken' or $product->category->name == 'Chicken Wings' or $product->category->name == 'Sandwiches')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Price</label>
                                            <input type="number" step="any" class="form-control" name="price" id="price" placeholder="Enter price" value="{{ $product->price }}">
                                        </div>
                                    @endif
                                    @if($product->category->name == 'Burgers')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Platter</label>
                                            <input type="number" step="any" name="platter" class="form-control" id="platter" value="{{ $product->platter }}" placeholder="Enter platter">
                                        </div>
                                    @endif
                                    @if($product->category->name == "Pizza" or $product->category->name == "Donairs" or $product->category->name == "Poutine" or $product->category->name == "Wraps" or $product->category->name == 'Subs' or $product->category->name == 'Garlic Fingers' or $product->category->name == "Salads" or $product->category->name == 'Appetizers' or $product->category->name == "Nachos")
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Small</label>
                                            <input type="number" step="any" name="small" class="form-control" id="small" placeholder="Enter price for small" value="{{ $product->small }}">
                                        </div>
                                    @endif
                                    @if($product->category->name == "Pizza" or $product->category->name == 'Garlic Fingers')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Medium</label>
                                            <input type="number" step="any" name="medium" class="form-control" id="medium" placeholder="Enter price for medium" value="{{ $product->medium }}">
                                        </div>
                                    @endif
                                    @if($product->category->name == "Pizza" or $product->category->name == "Donairs" or $product->category->name == "Poutine" or $product->category->name == "Wraps" or $product->category->name == 'Subs' or $product->category->name == 'Garlic Fingers' or $product->category->name == "Salads" or $product->category->name == 'Appetizers' or $product->category->name == "Nachos")
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Large</label>
                                            <input type="number" step="any" name="large" class="form-control" id="large" placeholder="Enter price for large" value="{{ $product->large }}">
                                        </div>
                                    @endif
                                    @if($product->category->name == "Pizza" or $product->category->name == 'Garlic Fingers')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">XLG</label>
                                            <input type="number" step="any" name="xlg" class="form-control" id="xlg" placeholder="Enter price for XLG" value="{{ $product->xlg }}">
                                        </div>
                                    @endif
                                    @if ($product->category->name == "Nachos" or $product->category->name == "Donairs" or $product->category->name == "Calzones")
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Extra Small Cheese or Meats</label>
                                            <input type="number" step="any" name="extra_small" class="form-control" id="e_small" value="{{ $product->extra_small }}" placeholder="Enter price for extra small">
                                        </div>
                                    @endif
                                    @if ($product->category->name == "Nachos" or $product->category->name == "Calzones")
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Extra Large Cheese or Meats</label>
                                            <input type="number" step="any" name="extra_large" class="form-control" id="e_large" value="{{ $product->extra_large }}" placeholder="Enter price for extra large">
                                        </div>
                                    @endif
                                    @if ($product->category->name == "Nachos" or $product->category->name == "Donairs" or $product->category->name == 'Calzones')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Extra cheese</label>
                                            <div class="checkbox">
                                                <label><input type="radio" id="extra_cheese_id" name="extra_cheese" value="0" @if(!$product->extra_cheese) checked @endif>No</label>
                                                <label><input type="radio" id="extra_cheese_id" name="extra_cheese" value="1" @if($product->extra_cheese) checked @endif>Yes</label>
                                            </div>
                                            <label for="exampleInputPrice">Extra meat</label>
                                            <div class="checkbox">
                                                <label><input type="radio" id="extra_meat_id" name="extra_meat" value="0" @if(!$product->extra_meat) checked @endif>No</label>
                                                <label><input type="radio" id="extra_meat_id" name="extra_meat" value="1" @if($product->extra_meat) checked @endif>Yes</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($product->category->name == "Appetizers" or $product->category->name == "Donairs" or $product->category->name == 'Subs')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Number of Pieces - Small</label>
                                            <input type="text" name="small_size" class="form-control" id="s_small" value="{{ $product->small_size }}" placeholder="Enter dimension for small">
                                        </div>
                                    @endif
                                    @if ($product->category->name == "Appetizers" or $product->category->name == "Donairs" or $product->category->name == 'Subs')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Number of Pieces - Large</label>
                                            <input type="text" name="large_size" class="form-control" id="s_large" value="{{ $product->large_size }}" placeholder="Enter dimension for large">
                                        </div>
                                    @endif
                                    @if ($product->category->name == "Nachos" or $product->category->name == 'Wraps' or $product->category->name == 'Sauces' or $product->category->name == "Donairs" or $product->category->name == 'Subs' or $product->category->name == 'Garlic Fingers' or $product->category->name == "Calzones")
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Small donair</label>
                                            <input type="number" step="any" name="donair_small" class="form-control" id="d_small" value="{{ $product->donair_small }}" placeholder="Enter donair for small">
                                        </div>
                                    @endif
                                    @if ($product->category->name == "Nachos" or $product->category->name == 'Wraps' or $product->category->name == 'Sauces' or $product->category->name == "Donairs" or $product->category->name == 'Subs' or $product->category->name == 'Garlic Fingers' or $product->category->name == "Calzones")
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Large donair</label>
                                            <input type="number" step="any" name="donair_large" class="form-control" id="d_large" value="{{ $product->donair_large }}" placeholder="Enter donair for large">
                                        </div>
                                    @endif
                                    @if ($product->category->name == "Wraps" or $product->category->name == "Poutine")
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Specialty wraps</label>
                                            <div class="checkbox">
                                                <label><input type="radio" name="specialty" value="0" @if(!$product->specialty) checked @endif>No</label>
                                                <label><input type="radio" name="specialty" value="1" @if($product->specialty) checked @endif>Yes</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($product->category->name == "Donairs")
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Options for souce(on it or on side)</label>
                                            <div class="checkbox">
                                                <label><input type="radio" name="options_for_souce" value="0" @if(!$product->options_for_souce) checked @endif>No</label>
                                                <label><input type="radio" name="options_for_souce" value="1" @if($product->options_for_souce) checked @endif>Yes</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if($product->category->name == 'Seafood')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Extra piece</label>
                                            <input type="number" step="any" name="extra_piece" class="form-control" id="e_piece" value="{{ $product->extra_piece }}" placeholder="Enter extra piece">
                                        </div>
                                    @endif
                                    @if($product->category->name == 'Drinks')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Drink size</label>
                                            <select class="form-control" name="drink_size" id="category">
                                                <option value="2l" @if($product->drink_size == '2l') selected @endif>2l</option>
                                                <option value="500ml" @if($product->drink_size == '500ml') selected @endif>500ml</option>
                                                <option value="Can" @if($product->drink_size == 'Can') selected @endif>Can</option>
                                            </select>
                                        </div>
                                    @endif
                                    @if($product->category->name == 'Chicken Wings' or $product->category->name == 'Chicken')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Homemade garlic souce</label>
                                            <input type="number" step="any" name="homemade_garlic_souce" class="form-control" id="homemade_s" value="{{ $product->homemade_garlic_souce }}" placeholder="Enter homemade souce">
                                        </div>
                                    @endif
                                    @if($product->category->name == 'Munchies')
                                        <div class="form-group">
                                            <label>Category {{ $product->category->name }}</label>
                                            <select class="form-control" name="product_ctgy" id="category">
                                                <option value="Chips" @if($product->product_ctgy == "Chips") selected @endif>Chips</option>
                                                <option value="Chocolate Bars" @if($product->product_ctgy == "Chocolate Bars") selected @endif>Chocolate Bars</option>
                                            </select>
                                        </div>
                                    @endif
                                    @if($product->category->name == 'Desserts')
                                        <div class="form-group">
                                            <label>Category {{ $product->category->name }}</label>
                                            <select class="form-control" name="product_ctgy" id="category">
                                                <option value="Homemade Ice Cream Sandwiches" @if($product->product_ctgy == "Homemade Ice Cream Sandwiches") selected @endif>Homemade Ice Cream Sandwiches</option>
                                                <option value="MilkShakes" @if($product->product_ctgy == "MilkShakes") selected @endif>MilkShakes</option>
                                                <option value="Haagen Dazs (500 ml)" @if($product->product_ctgy == "Haagen Dazs (500 ml)") selected @endif>Haagen Dazs (500 ml)</option>
                                                <option value="Ben & Jerry's (500 ml)" @if($product->product_ctgy == "Ben & Jerry's (500 ml)") selected @endif>Ben & Jerry's (500 ml)</option>
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInputPoints">Description</label>
                                        <input type="text" class="form-control" name="descriptions" id="descriptions" placeholder="Description" value="{{ $product->descriptions }}">
                                    </div>

                                    @if($product->category->name == "Pizza")
                                        <div class="box-body">
                                            <div class="col-lg-2">
                                                <label for="name">Cheese Regular</label>
                                                <div class="checkbox">
                                                    @foreach($customizes as $customize)
                                                        @if($customize->customize_category == 'Cheeses' and $customize->regular_premium == 'regular')
                                                            <label><input type="checkbox" name="customize[]" value="{{ $customize->id }}"
                                                                          @foreach($product->customizes as $pro_customize)
                                                                          @if($pro_customize->id == $customize->id)
                                                                          checked
                                                                        @endif
                                                                        @endforeach
                                                                >{{ $customize->name }}</label><br>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="name">Meats Regular</label>
                                                <div class="checkbox">
                                                    @foreach($customizes as $customize)
                                                        @if($customize->customize_category == 'Meats' and $customize->regular_premium == 'regular')
                                                            <label><input type="checkbox" name="customize[]" value="{{ $customize->id }}"
                                                                          @foreach($product->customizes as $pro_customize)
                                                                          @if($pro_customize->id == $customize->id)
                                                                          checked
                                                                        @endif
                                                                        @endforeach>{{ $customize->name }}</label><br>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="name">Veggies Regular</label>
                                                <div class="checkbox">
                                                    @foreach($customizes as $customize)
                                                        @if($customize->customize_category == 'Veggies' and $customize->regular_premium == 'regular')
                                                            <label><input type="checkbox" name="customize[]" value="{{ $customize->id }}"
                                                                          @foreach($product->customizes as $pro_customize)
                                                                          @if($pro_customize->id == $customize->id)
                                                                          checked
                                                                        @endif
                                                                        @endforeach>{{ $customize->name }}</label><br>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="name">Cheese Premium</label>
                                                <div class="checkbox">
                                                    @foreach($customizes as $customize)
                                                        @if($customize->customize_category == 'Cheeses' and $customize->regular_premium == 'premium')
                                                            <label><input type="checkbox" name="premium[]" value="{{ $customize->id }}"
                                                                          @foreach($product->customizes as $pro_customize)
                                                                          @if($pro_customize->id == $customize->id)
                                                                          checked
                                                                        @endif
                                                                        @endforeach
                                                                >{{ $customize->name }}</label><br>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="name">Meats Premium</label>
                                                <div class="checkbox">
                                                    @foreach($customizes as $customize)
                                                        @if($customize->customize_category == 'Meats' and $customize->regular_premium == 'premium')
                                                            <label><input type="checkbox" name="premium[]" value="{{ $customize->id }}"
                                                                          @foreach($product->customizes as $pro_customize)
                                                                          @if($pro_customize->id == $customize->id)
                                                                          checked
                                                                        @endif
                                                                        @endforeach>{{ $customize->name }}</label><br>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="name">Veggies Premium</label>
                                                <div class="checkbox">
                                                    @foreach($customizes as $customize)
                                                        @if($customize->customize_category == 'Veggies' and $customize->regular_premium == 'premium')
                                                            <label><input type="checkbox" name="premium[]" value="{{ $customize->id }}"
                                                                          @foreach($product->customizes as $pro_customize)
                                                                          @if($pro_customize->id == $customize->id)
                                                                          checked
                                                                        @endif
                                                                        @endforeach>{{ $customize->name }}</label><br>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" id="submit_form" class="btn btn-primary btn-flat">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    @show

    @include('admin.layouts.footer')
</div>

<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        });
    });

    $(document).ready(function () {

        $("#category").change(function () {

            var category = $("#category").val();

            if (category == '2') {
                $("#customize_pizza").slideDown(300);
            } else {
                $("#customize_pizza").slideUp(500);
            }

        });
    });
</script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('admin/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

</body>
</html>