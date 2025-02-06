@extends('layouts.admin')
@section('title')
    Company Information
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Company Information
            <small>Edit Information</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">info</a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <form action="/info/{{ $info->id }}" method="POST" class="form-container" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group col-md-6">
                        <label for="name">Name*:</label>
                        <input type="text" class="form-control" value="{{ $info->name }}" name="name" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="address">Address*:</label>
                        <input type="text" class="form-control" value="{{ $info->address }}" name="address" required>
                    </div>

                    {{-- <div class="form-group col-md-6">
                        <label for="address">Full Address*:</label>
                        <input type="text" class="form-control" value="{{ $info->address1 }}" name="address1" required>
                    </div> --}}


                    <div class="form-group col-md-6">
                        <label for="website">Website*:</label>
                        <input type="url" class="form-control" value="{{ $info->website }}" name="website" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="footer_about">Footer About*:</label>
                        <textarea class="form-control" name="footer_about" required>{{ $info->footer_about}}</textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" value="{{ $info->phone }}" name="phone">
                    </div>


                    <div class="form-group col-md-6">
                        <label for="mobile">Mobile:</label>
                        <input type="text" class="form-control" value="{{ $info->mobile }}" name="mobile">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Email*:</label>
                        <input type="email" class="form-control" value="{{ $info->email }}" name="email" required>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="admission_year">Admission Year:</label>
                        <input type="text" class="form-control" value="{{ $info->admission_year }}" name="admission_year">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="admission_season">Admission Season:</label>
                        <input type="text" class="form-control" value="{{ $info->admission_season}}" name="admission_season">
                    </div>


                    <div class="form-group col-md-6">
                        <label for="facebook">Facebook:</label>
                        <input type="url" class="form-control" value="{{ $info->facebook }}" name="facebook">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="linkedIn">LinkedIN:</label>
                        <input type="url" class="form-control" value="{{ $info->linkedIn }}" name="linkedIn">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="twitter">Twitter:</label>
                        <input type="url" class="form-control" value="{{ $info->twitter }}" name="twitter">
                    </div>


                    <div class="form-group col-md-6">
                        <label for="fax">Alternative Phone. No:</label>
                        <input type="text" class="form-control" value="{{ $info->fax }}" name="fax">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pobox">P.O Box:</label>
                        <input type="text" class="form-control" value="{{ $info->pobox }}" name="pobox">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="opens">Opening time:</label>
                        <input type="text" class="form-control" value="{{ $info->opens }}" name="opens">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="closes">Closing time:</label>
                        <input type="text" class="form-control" value="{{ $info->closes }}" name="closes">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="map">Map Url:</label>
                        <input type="text" class="form-control" value="{{ $info->map }}" name="map">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="map">Introduction Video Url:</label>
                        <input type="text" class="form-control" value="{{ $info->intro_video }}" name="intro_video">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="map">Study Destination Video Url:</label>
                        <input type="text" class="form-control" value="{{ $info->study_destination_video }}"
                            name="study_destination_video">
                    </div>


                    <div class="form-group col-md-6">
                        <label for="logo">Company Logo:</label>
                        <input type="file" name="logo" class="form-control"
                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                        <small class="form-text text-muted" id="fileHelp">Leave for old logo</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="favicon">Favicon:</label>
                        <input type="file" name="favicon" class="form-control"
                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                        <small class="form-text text-muted" id="fileHelp">Leave for old favicon</small>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Info</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
