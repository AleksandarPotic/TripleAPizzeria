@extends('admin.layouts.app')
@section('active6','active')
@section('body-part')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Roles
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Roles</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All roles</h3>
                            <br>
                            <div class="col-sm-1">
                                    <a href="{{ route('roles.create') }}">
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
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Display Name</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->display_name }}</td>
                                                <td>
                                                    <a href="{{ route('roles.edit',$role->id) }}">
                                                        <button class="btn btn-warning btn-block btn-flat">Update</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form id="delete-form-{{ $role->id }}" method="post" action="{{ route('roles.destroy',$role->id) }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick="if(confirm('Do you really want to delete this role?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $role->id }}').submit();
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
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Display Name</th>
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