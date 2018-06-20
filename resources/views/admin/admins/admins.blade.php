@extends('admin.layouts.app')
@section('active5','active')
@section('body-part')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Admins
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Admins</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Admins</h3>
                            <br>
                            <div class="col-sm-1">
                                    <a href="{{ route('admins.create') }}">
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Role</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $admin)
                                        <tr>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td><img src="{{ Storage::url($admin->image) }}" width="100px" height="100px" alt="User Image"></td>
                                            <td>{{ $admin->role->display_name }}</td>
                                                <td>
                                                    <a href="{{ route('admins.edit',$admin->id) }}">
                                                        <button class="btn btn-warning btn-block btn-flat">Update</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form id="delete-form-{{ $admin->id }}" method="post" action="{{ route('admins.destroy',$admin->id) }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick="if(confirm('Do you really want to delete this admin?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $admin->id }}').submit();
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Role</th>
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