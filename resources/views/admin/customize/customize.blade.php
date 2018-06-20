@extends('admin.layouts.app')
@section('active9','active')
@section('body-part')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pizza Toppings
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Customizes</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Toppings</h3>
                            <br>
                            <div class="col-sm-1">
                                    <a href="{{ route('customize.create') }}">
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
                                        <th>Small Price($)</th>
                                        <th>Medium Price($)</th>
                                        <th>Large Price($)</th>
                                        <th>XLG Price($)</th>
                                        <th>Regular or Premium</th>
                                        <th>Customize Category</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customizes as $customize)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $customize->name }}</td>
                                            <td>{{ number_format($customize->customize_price,2) }}</td>
                                            <td>{{ number_format($customize->medium_price,2) }}</td>
                                            <td>{{ number_format($customize->large_price,2) }}</td>
                                            <td>{{ number_format($customize->xlg_price,2) }}</td>
                                            <td>{{ $customize->regular_premium }}</td>
                                            <td>{{ $customize->customize_category }}</td>
                                                <td>
                                                    <a href="{{ route('customize.edit',$customize->id) }}">
                                                        <button class="btn btn-warning btn-block btn-flat">Update</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form id="delete-form-{{ $customize->id }}" method="post" action="{{ route('customize.destroy',$customize->id) }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick="if(confirm('Do you really want to delete this customize?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $customize->id }}').submit();
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
                                        <th>Small Price($)</th>
                                        <th>Medium Price($)</th>
                                        <th>Large Price($)</th>
                                        <th>XLG Price($)</th>
                                        <th>Regular or premium</th>
                                        <th>Customize Category</th>
                                            <th>Update</th>
                                            <th>Delete</th>
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