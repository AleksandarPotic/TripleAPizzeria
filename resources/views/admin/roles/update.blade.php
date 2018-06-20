@extends('admin.layouts.app')
@section('active6','active')
@section('body-part')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                New Role
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('roles.index') }}">Roles</a></li>
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
                                <a href="{{ route('roles.index') }}">
                                    <button class="btn btn-warning btn-flat btn-block">Back</button>
                                </a>
                            </div>
                            <div class="col-sm-7 col-sm-offset-2">
                                @include('admin.layouts.errors.error')
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('roles.update',$role->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputName" value="{{ $role->name }}" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Display name</label>
                                    <input type="text" class="form-control" name="display_name" id="exampleInputName" value="{{ $role->display_name }}" placeholder="Enter display name">
                                </div>
                                <div class="box-body">

                                    <div class="col-lg-2">
                                        <label for="name">All roles</label>
                                        <div class="checkbox">
                                            @foreach($permissions as $permission)
                                                    <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}" @foreach($role->permissions as $role_permit)
                                                        @if($role_permit->id == $permission->id)
                                                        checked
                                                                @endif
                                                                @endforeach>{{ $permission->name }}</label><br>
                                            @endforeach
                                        </div>
                                    </div>
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