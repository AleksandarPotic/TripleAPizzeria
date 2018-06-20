@extends('admin.layouts.app')
@section('active7','active')
@section('body-part')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                MessageBox
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Messages</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Messages</h3>
                            <br>
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td>{{ $comment->first_name }}</td>
                                            <td>{{ $comment->last_name }}</td>
                                            <td>{{ $comment->email }}</td>
                                            <td>{{ $comment->comment }}</td>
                                            <td>
                                                <form id="delete-form-{{ $comment->id }}" method="post" action="{{ route('message.destroy',$comment->id) }}" style="display: none;">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                                <a href="" onclick="if(confirm('Do you really want to delete this comment?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $comment->id }}').submit();
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <!-- quick email widget -->
                        <div class="box box-warning">
                            <div class="box-header">
                                <i class="fa fa-envelope"></i>

                                <h3 class="box-title">Send Email</h3>
                                <!-- tools box -->
                            </div>
                            <div class="box-body">
                                <div class="callout callout-success" id="send_success" style="display: none">
                                    <h4>Successfully send!</h4>
                                </div>
                                <div class="callout callout-danger" id="send_danger" style="display: none">
                                    <h4>Email not send!</h4>
                                </div>
                                <form action="{{ route('admin.send') }}" method="POST" id="form">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="emailto" name="emailto" placeholder="Email to:">
                                        <label for="emailto" id="label_emailto" style="display: none; color: rgb(217,83,79);">You need to enter an email!</label>
                                    </div>
                                    <div>
                          <textarea class="textarea" id="body_message" placeholder="Message" name="body_message"
                                    style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                    <div class="box-footer clearfix">
                                        <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                                            <i class="fa fa-arrow-circle-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
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

        $(document).ready(function () {

            $("#emailto").click(function () {
                $("#emailto").css({"border": "", "background-color": ""});
                $("#label_emailto").hide();
            });

            $("#sendEmail").click(function () {
                var emailto = $("#emailto").val();
                var body_message = $("#body_message").val();

                if (emailto != '') {

                    $.post('/admin/home/send', {'emailto': emailto,'body_message': body_message ,'_token': $('input[name=_token]').val()}, function (data) {
                        if (data == 'yes') {
                            $("#form")[0].reset();
                            $("#send_success").show(200);
                            setTimeout(function(){ $("#send_success").hide(200); }, 3000);

                        }else {
                            $("#form")[0].reset();

                            $("#send_danger").show(200);
                            setTimeout(function(){ $("#send_danger").hide(200); }, 3000);
                        }
                    });
                } else {

                    $("#emailto").css({"border": "1px solid rgb(217,83,79)"});
                    $("#label_emailto").show();
                }
            });
        });

    </script>
@endsection