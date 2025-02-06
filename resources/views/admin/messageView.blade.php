@extends('layouts.admin')
@section('title')
    {{ $message->name }}'s Inquiry
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Inquiry
            <small>Inquiry Details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Inquiry</a></li>

        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-6">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Inquiry Details</h3>
                    </div>

                    <a href="/message" class="btn btn-info" style="margin-left:10px;"><i class="fa fa-arrow-left"></i>
                    </a>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped">

                            <tr>
                                <th>Name</th>

                                <td>{{ $message->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>

                                <td>{{ $message->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>

                                <td>{{ $message->phone }}</td>
                            </tr>

                            <tr>
                                <th>Destination</th>

                                <td>{{ $message->destination->nation->name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Subject</th>

                                <td>{{ $message->subject }}</td>
                            </tr>
                            <tr>
                                <th>Message</th>

                                <td>{{ $message->message }}</td>
                            </tr>


                        </table>
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
@endsection
