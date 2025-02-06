@extends('layouts.admin')
@section('title')
Company Information    
@endsection
@section('content')
    <!-- Content Header (Blog header) -->
    <section class="content-header">
      <h1>
        Company Information
        <small>Add/Modify Information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Info</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Company Information Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
                <a href="/info/{{$info->id}}/edit" class="btn btn-primary">
                    Edit Info
                </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Information Title</th>
                    <th>Information</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1?>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Name</td>
                    <td>{{$info->name}}</td>
                </tr>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Address</td>
                    <td>{{$info->address}}</td>
                </tr>
                 {{-- <tr>
                    <td>{{$i++}}</td>
                    <td>Full Address</td>
                    <td>{{$info->address1}}</td>
                </tr> --}}
                <tr>
                    <td>{{$i++}}</td>
                    <td>Website</td>
                    <td>{{$info->website}}</td>
                </tr>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Phone</td>
                    <td>{{$info->phone}}</td>
                </tr>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Mobile</td>
                    <td>{{$info->mobile}}</td>
                </tr>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Email</td>
                    <td>{{$info->email}}</td>
                </tr>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Logo</td>
                    <td><img src="/storage/info/{{$info->logo}}" class="img-fluid" width="50px" width="50px"></td>
                </tr>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Favicon</td>
                    <td><img src="/storage/info/{{$info->favicon}}" class="img-fluid" width="50px" width="50px"></td>
                </tr>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Admission Year</td>
                    <td>{{$info->admission_year}}</td>
                </tr>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Admission Season</td>
                    <td>{{$info->admission_season}}</td>
                </tr>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Facebook</td>
                    <td>{{$info->facebook}}</td>
                </tr>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Youtube</td>
                    <td>{{$info->linkedIn}}</td>
                </tr>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Twitter</td>
                    <td>{{$info->twitter}}</td>
                </tr>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Opening time</td>
                    <td>{{$info->opens}}</td>
                </tr>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Closing Time</td>
                    <td>{{$info->closes}}</td>
                </tr>
                 <tr>
                    <td>{{$i++}}</td>
                    <td>Map</td>
                    <td>{{$info->map}}</td>
                </tr>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Introduction Video</td>
                    <td>{{$info->intro_video}}</td>
                </tr><tr>
                    <td>{{$i++}}</td>
                    <td>Study Destination Video</td>
                    <td>{{$info->study_destination_video}}</td>
                </tr>
                <tr>
                    <td>{{$i++}}</td>
                    <td>Alternative Phone. No</td>
                    <td>{{$info->fax}}</td>
                </tr>
                <tr>
                    <td>{{$i}}</td>
                    <td>P.O Box</td>
                    <td>{{$info->pobox}}</td>
                </tr>

            </tbody>
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