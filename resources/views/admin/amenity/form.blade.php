@extends('admin.layouts.master')

@section('title', 'Amenity ' . (isset($amenity_data) ? 'Update' : 'Create') . ' Page')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hotel Room Amenity</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <h3>Amenity Create</h3>
                        <button onclick="history.back()" class="btn btn-dark">Back</button>
                        <div class="x_content">
                            <br />
                            @if (isset($amenity_data))
                                <form action="{{ route('amenityUpdate') }}" method="POST" id="createForm">
                                @else
                                    <form action="{{ route('amenityStore') }}" method="POST" id="createForm">
                            @endif

                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="amenityName">Name<span
                                        class="required">*</span></label>

                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="name" id="amenityName"
                                        value="{{ old('name', isset($amenity_data) ? $amenity_data->name : '') }}"
                                        placeholder="ex. 43” LED TV" autofocus autocomplete="true" />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error" id="amenityName_error">

                                </label>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Type<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">

                                    @if (isset($amenity_data))
                                        <select class="form-control" name="type" id="selectForm">
                                            <option value="">Choose option</option>
                                            <option value="0"
                                                {{ old('type', $amenity_data->type) == '0' ? 'selected' : '' }}>General
                                            </option>
                                            <option value="1"
                                                {{ old('type', $amenity_data->type) == '1' ? 'selected' : '' }}>Bathroom
                                            </option>
                                            <option value="2"
                                                {{ old('type', $amenity_data->type) == '2' ? 'selected' : '' }}>Other
                                            </option>
                                        </select>
                                    @else
                                        <select class="form-control" name="type" id="selectForm">
                                            <option value="">Choose option</option>
                                            <option value="0" {{ old('type') == '0' ? 'selected' : '' }}>General
                                            </option>
                                            <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>Bathroom
                                            </option>
                                            <option value="2" {{ old('type') == '2' ? 'selected' : '' }}>Other
                                            </option>
                                        </select>
                                    @endif
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id="selectForm_error"></label>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        @if (isset($amenity_data))
                                            <input type="hidden" name="id" value="{{ $amenity_data->id }}">
                                        @endif
                                        <button type='button' class="btn btn-primary" id="submit-btn">Submit</button>
                                        <button type='reset' class="btn btn-success" id="reset-btn">Reset</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra_script')
    @error('name')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    <script>
        $(document).ready(function() {
            $("#submit-btn").click(function() {
                let error = false;
                const amenity_name = $("#amenityName").val();
                const amenity_name_length = amenity_name.length;
                const select_form = $("#selectForm").val();
                if (amenity_name == '') {
                    $("#amenityName_error").text('Please fill hotel room amenity name');
                    $("#amenityName_error").show();
                    error = true;
                }
                if (amenity_name_length < 3 && amenity_name != '') {
                    $("#amenityName_error").text('Hotel room amenity name must be greater then three.');
                    $("#amenityName_error").show();
                    error = true;
                }
                if (amenity_name_length > 20 && amenity_name != '') {
                    $("#amenityName_error").text('Hotel room amenity name must be less then twenty.');
                    $("#amenityName_error").show();
                    error = true;
                }
                if (select_form == '') {
                    $("#selectForm_error").text('Please choose anemity type');
                    $("#selectForm_error").show();
                    error = true;
                } else {
                    $("#selectForm_error").hide();
                }
                if (!error) {
                    $("#amenityName_error").hide();
                    $("#createForm").submit();
                }
            });
            // when click reset btn
            $("#reset-btn").click(function() {
                $("#amenityName_error").hide();
                $('#amenityName').val('');
            })

        })
    </script>
@endsection
