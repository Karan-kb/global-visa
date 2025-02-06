@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME') }} | Sliders
@endsection

@push('css')
    <style>
        .row-id {
            display: none;
        }

        .td-flex {
            display: inline-flex;
        }

        .dd-handle {
            cursor: move;
        }

        .dd3-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dd3-content img {
            max-width: 50px;
            height: auto;
            margin-right: 10px;
        }

        .content-right {
            display: flex;
            gap: 10px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('backend/assets/jquery-nestable.css') }}" />
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sliders
            <small>Manage Sliders</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Dashboard</a></li>
            <li class="active">Sliders</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Sliders</h3>
                    </div>

                    <!-- Search and Create Button -->
                    <div class="box-tools">
                        <div class="row">
                            <div class="col-md-9 col-sm-8 pl-0">
                                @if (count($sliders) > 0)
                                    <input type="text" class="form-control" id="slider-search"
                                        placeholder="Search slider" onkeyup="searchList()">
                                @endif
                            </div>
                            <div class="col-md-3 col-sm-4 px-0">
                                <a href="{{ route('slider.create') }}" class="btn btn-success btn-block">
                                    <i class="fa fa-plus"></i> &nbsp; Create
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Sliders List -->
                    <div class="box-body">
                        @if (count($sliders) > 0)
                            <div class="dd nestable-with-handle" id="nestable">
                                <ol class="dd-list" id="sortable">
                                    @foreach ($sliders as $slider)
                                        <li class="dd-item dd3-item" data-id="{{ $slider->id }}">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content"
                                                style="display: flex; align-items: center; justify-content: space-between;">
                                                <!-- Left Content -->
                                                <div style="display: flex; align-items: center; gap: 12px;">
                                                    <img style="height:36px; width:36px;"
                                                        src="{{ asset('storage/slider/thumb_' . $slider->image) }}"
                                                        alt="{{ $slider->title }}">
                                                    <b class="search-title">{{ $slider->title }}</b>
                                                    <span>|</span>
                                                    <i
                                                        class="badge {{ $slider->status == 1 ? 'badge-primary' : 'badge-danger' }}">
                                                        {{ $slider->status == 1 ? 'Displayed' : 'Not Displayed' }}
                                                    </i>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div style="display: flex; gap: 8px;">
                                                    <a href="{{ route('slider.edit', $slider->id) }}"
                                                        class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form method="post" action="/slider/{{ $slider->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button style="border-radius:50%"
                                                            onclick="return confirm('Are You Sure...Do you want to delete this Slider?')"
                                                            class="btn btn btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>&nbsp;&nbsp;
                                    @endforeach

                                </ol>
                            </div>
                        @else
                            <div class="text-center">
                                <h3>No Sliders Found!</h3>
                            </div>
                        @endif
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

    <!-- View Modal -->
    <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalContent">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-12 mb-2">
                                <strong>Title</strong>
                                <p class="text-muted" id="modalSliderTitle"></p>
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <strong>Youtube URL</strong>
                                <p class="text-muted" id="modalyoutube_url"></p>
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <strong>Button Text</strong>
                                <p class="text-muted" id="modalbutton_text"></p>
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <strong>Button URL</strong>
                                <p class="text-muted" id="modalbutton_url"></p>
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <strong>Slider Image</strong>
                                <img src="" alt="image" id="image_content" class="img-fluid">
                            </div>

                            <div class="col-12 col-md-6 mb-2">
                                <strong>Image</strong>
                                <img src="" alt="image_1" id="image_1" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ARE YOU SURE?</h4>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete this item?</p>
                </div>
                <div class="modal-footer">
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">NO</button>
                        <button type="submit" class="btn btn-primary">YES</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('backend/assets/jquery.nestable.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Delete Slider
            $('body').on('click', '#delete', function() {
                var id = $(this).data('id');
                $('#id').val(id);
            });

            // Quick View
            $(document).on('click', '.open-modal', function(e) {
                e.preventDefault();
                let url = $(this).data('url');

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        $('#modalTitle').text(response.data.heading);
                        $('#modalSliderTitle').html(response.data.title);
                        $('#modalbutton_text').html(response.data.button_text);
                        $('#modalbutton_url').html(response.data.button_url);
                        $('#modalyoutube_url').html(response.data.youtube_url);
                        $('#image_content').attr('src', response.data.image);
                        $('#dataModal').modal('show');
                    },
                    error: function(xhr) {
                        if (xhr.status === 404) {
                            toastr.error('Data not found.');
                        } else {
                            toastr.error('An error occurred. Please try again later.');
                        }
                    }
                });
            });

            // Search List
            function searchList() {
                var filter = $("#slider-search").val().toUpperCase();
                var input = $("#sortable").find(".search-title");
                for (var i = 0; i < input.length; i++) {
                    if (input[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                        $("#sortable").find(".dd-item")[i].style.display = "";
                    } else {
                        $("#sortable").find(".dd-item")[i].style.display = "none";
                    }
                }
            }

            // Nestable Sorting
            $("#nestable").nestable({
                group: 1,
                maxDepth: 1,
            }).on('change', function(e) {
                var list = e.length ? e : $(e.target);
                $.ajax({
                    method: "POST",
                    url: "",
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        list_order: list.nestable('serialize'),
                        table: "sliders"
                    },
                    success: function(response) {
                        var obj = jQuery.parseJSON(response);
                        if (obj.status == 'success') {
                            toastr.success("Content Sorted Successfully");
                        } else {
                            toastr.error("Sorry Something Went Wrong!!");
                        }
                    }
                }).fail(function() {
                    toastr.error("Something Went Wrong!");
                });
            });
        });
    </script>
@endpush
