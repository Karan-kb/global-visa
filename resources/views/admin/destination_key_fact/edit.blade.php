@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME') }} | Edit dest
@endsection

@push('css')
    <style>
        .box {
            border: 2px solid #ccc;
            padding: 12px;
            margin-bottom: 20px;
            margin-top: 50px;
        }
    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit dest
            <small>Modify dest</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('destinations.index') }}">dests</a></li>
            <li class="active">Edit dest</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit dest</h3>
                    </div>

                    <!-- Form Start -->
                    <form class="form" method="post"
                        action="{{ route('destination-key-facts.update', $destinationKeyFact->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Method spoofing for PUT request -->
                        <div class="box-body">
                            <!-- Display validation errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li style="font-size: smaller;">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- General Section -->
                            <div class="row">
                                <!-- Destination Field -->
                                <div class="form-group col-md-6">
                                    <label for="destination_id">Destination <span class="required">*</span></label>
                                    <select class="form-control" name="destination_id" id="destination_id" required>
                                        @foreach ($destinations as $destination)
                                            <option value="{{ $destination->id }}"
                                                {{ old('destination_id', $destinationKeyFact->destination_id) == $destination->id ? 'selected' : '' }}>
                                                {{ $destination->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('destination_id')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                           
                                <div class="form-group col-md-6">
                                    <label for="language">Language <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="language" id="language"
                                        value="{{ old('language', $destinationKeyFact->language) }}"
                                        placeholder="Enter language" required>
                                    @error('language')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                         
                                <div class="form-group col-md-6">
                                    <label for="required_exams">Required Exams</label>
                                    <input type="text" class="form-control" name="required_exams" id="required_exams"
                                        value="{{ old('required_exams', $destinationKeyFact->required_exams) }}"
                                        placeholder="Enter Required Exams">
                                    @error('required_exams')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                         
                                <div class="form-group col-md-6">
                                    <label for="degrees">Degrees</label>
                                    <input type="text" class="form-control" name="degrees" id="degrees"
                                        value="{{ old('degrees', $destinationKeyFact->degrees) }}"
                                        placeholder="Enter Degree">
                                    @error('degrees')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                             
                                <div class="form-group col-md-6">
                                    <label for="intakes">In-Take</label>
                                    <input type="text" class="form-control" name="intakes" id="intakes"
                                        value="{{ old('intakes', $destinationKeyFact->intakes) }}"
                                        placeholder="Enter Intake">
                                    @error('intakes')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Visa Field -->
                                <div class="form-group col-md-6">
                                    <label for="visa">Visas</label>
                                    <input type="text" class="form-control" name="visa" id="visa"
                                        value="{{ old('visa', $destinationKeyFact->visa) }}" placeholder="Enter Visa">
                                    @error('visa')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <!-- Cost of Study Field -->
                                <div class="form-group col-md-6">
                                    <label for="cost_of_study">Cost of Study</label>
                                    <textarea class="form-control ckeditor" name="cost_of_study" id="cost_of_study" placeholder="Enter Cost of Study">{{ old('cost_of_study', $destinationKeyFact->cost_of_study) }}</textarea>
                                    @error('cost_of_study')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Source of Funding Field -->
                                <div class="form-group col-md-6">
                                    <label for="source_of_funding">Source of Funding</label>
                                    <input type="text" class="form-control" name="source_of_funding"
                                        id="source_of_funding"
                                        value="{{ old('source_of_funding', $destinationKeyFact->source_of_funding) }}"
                                        placeholder="Enter Source of Funding">
                                    @error('source_of_funding')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Form Footer -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@push('js')
    <!-- CKEditor Script -->

    <script>
        $(document).ready(function() {
            // Initialize CKEditor for Requirement, Scholarship, and In-Take
            CKEDITOR.replace('requirement', {
                toolbar: [{
                        name: 'basicstyles',
                        items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat']
                    },
                    {
                        name: 'paragraph',
                        items: ['NumberedList', 'BulletedList', 'Blockquote']
                    },
                    {
                        name: 'styles',
                        items: ['Format', 'FontSize']
                    },
                    {
                        name: 'links',
                        items: ['Link', 'Unlink']
                    },
                    {
                        name: 'insert',
                        items: ['Image', 'Table']
                    },
                    {
                        name: 'tools',
                        items: ['Maximize']
                    }
                ]
            });
            CKEDITOR.replace('scholarship');
            CKEDITOR.replace('in_take');
        });
    </script>
@endpush
