@extends('layouts.admin')
@section('title')
    Destination Healths
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Destination Health
            <small>Edit Destination Health</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Destination Health</a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                {{-- @dd($health) --}}
                <form action="{{ route('destination-health.update', $health->id) }}" method="POST" class="form-container"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="destination_id">Destination <span class="required">*</span></label>
                        <select class="form-control" name="destination_id" required>
                            @foreach ($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                    {{ old('destination_id', $health->destination_id) == $destination->id ? 'selected' : '' }}>
                                    {{ $destination->nation->name ?? '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="title"> Name*</label>
                        <input type="text" class="form-control" name="title" value="{{ $health->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description*</label>
                        <input type="description" class="form-control" min="1" name="description"
                            value="{{ $health->description }}" placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                        <label for="iconSelect">Select Health Icon</label>
                        <select class="form-control" id="iconSelect" name="icon" required>
                            <option value="" disabled>Select an option</option>
                            @foreach (config('svgs.icons') as $key => $icon)
                                <option value="{{ $key }}" data-icon="{{ $icon['icon'] }}"
                                    {{ $health->image == $icon['icon'] ? 'selected' : '' }}>
                                    {{ $icon['title'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    
                    <div id="iconPreview" class="mt-3" style="{{ $health->image ? '' : 'display: none;' }} height:30px; width:40px;">
                        {{-- <label>Selected Icon Preview:</label> --}}
                        <div id="selectedIcon">{!! $health->image !!}</div>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Health</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var iconSelect = document.getElementById("iconSelect");
        var iconPreview = document.getElementById("iconPreview");
        var selectedIcon = document.getElementById("selectedIcon");

        // Function to update preview
        function updateIconPreview() {
            var selectedOption = iconSelect.options[iconSelect.selectedIndex];
            var iconHtml = selectedOption.getAttribute("data-icon");

            if (iconHtml) {
                selectedIcon.innerHTML = iconHtml;
                iconPreview.style.display = "block";
            } else {
                iconPreview.style.display = "none";
            }
        }

        // Trigger the function on change
        iconSelect.addEventListener("change", updateIconPreview);

        // Load existing icon if one is selected
        updateIconPreview();
    });
</script>
    
@endpush
