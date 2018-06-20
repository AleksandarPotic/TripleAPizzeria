<!doctype html>
<html lang="en">
<head>
    @include('admin.layouts.head')
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
    @section($categoryName,'active')
    @section('activeCategory','active')
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    @section('body-part')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    New {{ $categoryName }}
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="{{ route('products.index') }}">Products</a></li>
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
                                    <a href="{{ route('products.index',['category='.$categorySlug]) }}">
                                        <button class="btn btn-warning btn-flat btn-block">Back</button>
                                    </a>
                                </div>
                                <div class="col-sm-7 col-sm-offset-2">
                                    @include('admin.layouts.errors.error')
                                    <div class="alert alert-success alert-dismissible" id="success-alert" style="display: none">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <i class="icon fa fa-check"></i> Product successfully added!
                                    </div>
                                    <div class="alert alert-danger alert-dismissible" id="danger-alert" style="display: none;">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <i class="icon fa fa-ban"></i> Product wasn't added!
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('products.store') }}" method="post" id="form-id" enctype="multipart/form-data">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
                                    </div>
                                    @if($categoryName == 'Calzones' or $categoryName == 'Sauces' or $categoryName == 'Drinks' or $categoryName == "Donairs" or $categoryName == 'Burgers' or $categoryName == 'Seafood' or $categoryName == 'Chicken' or $categoryName == 'Chicken Wings' or $categoryName == 'Sandwiches' or $categoryName == 'Munchies' or $categoryName == 'Desserts')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Price</label>
                                            <input type="number" step="any" name="price" class="form-control" id="price" placeholder="Enter price">
                                        </div>
                                    @endif
                                    @if($categoryName == 'Burgers')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Platter</label>
                                            <input type="number" step="any" name="platter" class="form-control" id="platter" placeholder="Enter platter">
                                        </div>
                                    @endif
                                    @if ($categoryName == "Pizza" or $categoryName == "Donairs" or $categoryName == 'Poutine' or $categoryName == 'Wraps' or $categoryName == 'Subs' or $categoryName == 'Garlic Fingers' or $categoryName == "Salads" or $categoryName == 'Appetizers' or $categoryName == 'Nachos')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Small</label>
                                            <input type="number" step="any" name="small" class="form-control" id="small" placeholder="Enter price for small">
                                        </div>
                                    @endif
                                    @if ($categoryName == "Pizza" or $categoryName == 'Garlic Fingers')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Medium</label>
                                            <input type="number" step="any" name="medium" class="form-control" id="medium" placeholder="Enter price for medium">
                                        </div>
                                    @endif
                                    @if ($categoryName == "Pizza" or $categoryName == "Donairs" or $categoryName == 'Poutine' or $categoryName == 'Wraps' or $categoryName == 'Subs' or $categoryName == 'Garlic Fingers' or $categoryName == "Salads" or $categoryName == 'Appetizers' or $categoryName == 'Nachos')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Large</label>
                                            <input type="number" step="any" name="large" class="form-control" id="large" placeholder="Enter price for large">
                                        </div>
                                    @endif
                                    @if ($categoryName == "Pizza" or $categoryName == 'Garlic Fingers')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">XLG</label>
                                            <input type="number" step="any" name="xlg" class="form-control" id="xlg" placeholder="Enter price for XLG">
                                        </div>
                                    @endif
                                    @if ($categoryName == "Nachos" or $categoryName == "Donairs" or $categoryName == 'Calzones')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Extra Small Cheese or Meats</label>
                                            <input type="number" step="any" name="extra_small" class="form-control" id="e_small" @if ($categoryName == "Nachos") value="2" @endif placeholder="Enter price for extra small">
                                        </div>
                                    @endif
                                    @if ($categoryName == "Nachos" or $categoryName == 'Calzones')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Extra Large Cheese or Meats</label>
                                            <input type="number" step="any" name="extra_large" class="form-control" id="e_large" @if ($categoryName == "Nachos") value="3" @endif placeholder="Enter price for extra large">
                                        </div>
                                    @endif
                                    @if ($categoryName == "Nachos" or $categoryName == "Donairs" or $categoryName == 'Calzones')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Extra cheese</label>
                                            <div class="checkbox">
                                                <label><input type="radio" id="extra_cheese_id" name="extra_cheese" value="0">No</label>
                                                <label><input type="radio" id="extra_cheese_id" name="extra_cheese" value="1" checked>Yes</label>
                                            </div>
                                            <label for="exampleInputPrice">Extra meat</label>
                                            <div class="checkbox">
                                                <label><input type="radio" id="extra_meat_id" name="extra_meat" value="0" >No</label>
                                                <label><input type="radio" id="extra_meat_id" name="extra_meat" value="1" checked>Yes</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($categoryName == "Appetizers" or $categoryName == "Donairs" or $categoryName == 'Subs')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Number of Pieces - Small</label>
                                            <input type="text" name="small_size" class="form-control" id="s_small" placeholder="Enter dimension for small">
                                        </div>
                                    @endif
                                    @if ($categoryName == "Appetizers" or $categoryName == 'Subs' or $categoryName == "Donairs")
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Number of Pieces - Large</label>
                                            <input type="text" name="large_size" class="form-control" id="s_large" placeholder="Enter dimension for large">
                                        </div>
                                    @endif
                                    @if($categoryName == 'Nachos' or $categoryName == 'Wraps' or $categoryName == 'Sauces' or $categoryName == "Donairs" or $categoryName == 'Subs' or $categoryName == 'Garlic Fingers' or $categoryName == 'Calzones')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Small donair</label>
                                            <input type="number" step="any" name="donair_small" class="form-control" id="d_small" placeholder="Enter donair for small">
                                        </div>
                                    @endif
                                    @if($categoryName == 'Nachos' or $categoryName == 'Wraps' or $categoryName == 'Sauces' or $categoryName == "Donairs" or $categoryName == 'Subs' or $categoryName == 'Garlic Fingers' or $categoryName == 'Calzones')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Large donair</label>
                                            <input type="number" step="any" name="donair_large" class="form-control" id="d_large" placeholder="Enter donair for large">
                                        </div>
                                    @endif
                                    @if ($categoryName == "Wraps" or $categoryName == "Poutine")
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Specialty wraps</label>
                                            <div class="checkbox">
                                                <label><input type="radio" name="specialty" value="0" checked>No</label>
                                                <label><input type="radio" name="specialty" value="1">Yes</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($categoryName == "Donairs")
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Options for souce(on it or on side)</label>
                                            <div class="checkbox">
                                                <label><input type="radio" name="options_for_souce" value="0" checked>No</label>
                                                <label><input type="radio" name="options_for_souce" value="1">Yes</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if($categoryName == 'Seafood')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Extra piece</label>
                                            <input type="number" step="any" name="extra_piece" class="form-control" id="e_piece" placeholder="Enter extra piece">
                                        </div>
                                    @endif
                                    @if($categoryName == 'Chicken Wings' or $categoryName == 'Chicken')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Homemade garlic souce</label>
                                            <input type="number" step="any" name="homemade_garlic_souce" class="form-control" id="homemade_s" value="1.50" placeholder="Enter homemade souce">
                                        </div>
                                    @endif
                                    @if($categoryName == 'Munchies')
                                        <div class="form-group">
                                            <label>Category {{ $categoryName }}</label>
                                            <select class="form-control" name="product_ctgy" id="category">
                                                <option value="Chips" selected>Chips</option>
                                                <option value="Chocolate Bars">Chocolate Bars</option>
                                            </select>
                                        </div>
                                    @endif
                                    @if($categoryName == 'Drinks')
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Drink size</label>
                                            <select class="form-control" name="drink_size" id="category">
                                                <option value="2l" selected>2l</option>
                                                <option value="500ml">500ml</option>
                                                <option value="Can">Can</option>
                                            </select>
                                        </div>
                                    @endif
                                    @if($categoryName == 'Desserts')
                                        <div class="form-group">
                                            <label>Category {{ $categoryName }}</label>
                                            <select class="form-control" name="product_ctgy" id="category">
                                                <option value="Homemade Ice Cream Sandwiches" selected>Homemade Ice Cream Sandwiches</option>
                                                <option value="MilkShakes">MilkShakes</option>
                                                <option value="Haagen Dazs (500 ml)">Haagen Dazs (500 ml)</option>
                                                <option value="Ben & Jerry's (500 ml)">Ben & Jerry's (500 ml)</option>
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInputPoints">Description</label>
                                        <input type="text" name="descriptions" class="form-control" placeholder="Description">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category" id="category">
                                            <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                                        </select>
                                    </div>
                                    @if ($categoryName == "Pizza")
                                        <div class="box-body">
                                            <div class="col-lg-2">
                                                <label for="name">Cheese Regular</label>
                                                <div class="checkbox">
                                                    @foreach($customizes as $customize)
                                                        @if($customize->customize_category == 'Cheeses' and $customize->regular_premium == 'regular')
                                                            <label><input type="checkbox" name="customize[]" value="{{ $customize->id }}">{{ $customize->name }}</label><br>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="name">Meats Regular</label>
                                                <div class="checkbox">
                                                    @foreach($customizes as $customize)
                                                        @if($customize->customize_category == 'Meats' and $customize->regular_premium == 'regular')
                                                            <label><input type="checkbox" name="customize[]" value="{{ $customize->id }}">{{ $customize->name }}</label><br>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="name">Veggies Regular</label>
                                                <div class="checkbox">
                                                    @foreach($customizes as $customize)
                                                        @if($customize->customize_category == 'Veggies' and $customize->regular_premium == 'regular')
                                                            <label><input type="checkbox" name="customize[]" value="{{ $customize->id }}">{{ $customize->name }}</label><br>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="name">Cheese Premium</label>
                                                <div class="checkbox">
                                                    @foreach($customizes as $customize)
                                                        @if($customize->customize_category == 'Cheeses' and $customize->regular_premium == 'premium')
                                                            <label><input type="checkbox" name="premium[]" value="{{ $customize->id }}">{{ $customize->name }}</label><br>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="name">Meats Premium</label>
                                                <div class="checkbox">
                                                    @foreach($customizes as $customize)
                                                        @if($customize->customize_category == 'Meats' and $customize->regular_premium == 'premium')
                                                            <label><input type="checkbox" name="premium[]" value="{{ $customize->id }}">{{ $customize->name }}</label><br>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="name">Veggies Premium</label>
                                                <div class="checkbox">
                                                    @foreach($customizes as $customize)
                                                        @if($customize->customize_category == 'Veggies' and $customize->regular_premium == 'premium')
                                                            <label><input type="checkbox" name="premium[]" value="{{ $customize->id }}">{{ $customize->name }}</label><br>
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