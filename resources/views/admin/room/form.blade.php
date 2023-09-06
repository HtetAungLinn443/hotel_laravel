@extends('admin.layouts.master')

@section('title', 'Room ' . (isset($room_data) ? 'Update' : 'Create') . ' Page')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hotel Room </h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <h3>Room Create</h3>
                        <button onclick="history.back()" class="btn btn-dark">Back</button>
                        <div class="x_content">
                            <br />
                            @if (isset($room_data))
                                <form action="{{ route('roomUpdate') }}" method="POST" id="createForm">
                                @else
                                    <form action="{{ route('roomStore') }}" method="POST" id="createForm">
                            @endif
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="room_name">Room
                                    Thumbnail<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 d-flex justify-content-center">
                                    <div class="preview-wrapper rounded  d-flex justify-content-center align-items-center">
                                        <label class="thumb-upload btn btn-info">Upload
                                            Image</label>
                                        <div class="preview-container" style="display:none;">
                                            <a class="thumb-update btn btn-info text-white">Update Image</a>
                                            <img src="" class="preview-img" />
                                        </div>
                                    </div>
                                    <input type="file" name="thumb_file" id="thumb_file" value=""
                                        style="display: none;" accept="image/*">
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide" id="thumb_error"></label>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="room_name">Room
                                    Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="room_name" id="room_name" placeholder="ex. Lake View"
                                        autofocus value="" />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error " id="room_name_error"></label>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"
                                    for="room_occupation">Occupation<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" class="form-control" name="room_occupation" id="room_occupation"
                                        placeholder="ex. 1" min="1" max="12" value="" />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id="room_occupation_error"></label>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="room_bed">Bed<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="room_bed" id="room_bed" class="form-control">
                                        <option value="">Choose Bed Type</option>
                                        @foreach ($bed_list as $bed)
                                            <option value="{{ $bed->id }}">{{ $bed->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id="room_bed_error"></label>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="room_size">Room
                                    Size<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" class="form-control" name="room_size" id="room_size"
                                        placeholder="Enter room size" value="" />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id="room_size_error"></label>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="room_view">Room
                                    View<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="room_view" id="room_view" class="form-control">
                                        <option value="">Choose View</option>
                                        @foreach ($view_list as $view)
                                            <option value="{{ $view->id }}">{{ $view->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id="room_view_error"></label>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="room_price">Room Price
                                    Per Day<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" class="form-control" name="room_price" id="room_price"
                                        placeholder="ex. 100$" value="" />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id="room_price_error"></label>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="extra_bed_price">Extra
                                    Bed Price Per
                                    Day<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" class="form-control" name="extra_bed_price"
                                        id="extra_bed_price" placeholder="ex. 30$" value="" />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id="extra_bed_price_error"></label>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"
                                    for="description">Description<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea name="description" id="description" class="form-control" placeholder="Description" rows="4"></textarea>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id="description_error"></label>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"
                                    for="room_details">Details<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea name="room_details" id="room_details" class="form-control" placeholder="Details" rows="4"></textarea>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id="room_details_error"></label>
                            </div>

                            <div class="field item form-group my-3">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Room Amenity<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">

                                    @foreach ($amenity_groups as $type => $amenities)
                                        <div class="amenity-group">
                                            <h5 class="col-md-12 mt-3">
                                                @if ($type == 0)
                                                    General
                                                @elseif ($type == 1)
                                                    Bathroom
                                                @else
                                                    Other
                                                @endif
                                            </h5>
                                            @foreach ($amenities as $amenity)
                                                <div class="col-md-6">
                                                    <label>
                                                        <input type="checkbox" class="mr-2"
                                                            value="{{ $amenity['id'] }}" name="room_amenity[]">
                                                        {{ $amenity['name'] }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach


                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id="room_amenity_error"></label>

                            </div>

                            <div class="field item form-group">

                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="">Room Special
                                    Feature<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">

                                    @foreach ($feature_list as $feature)
                                        <div class="col-md-12">
                                            <label>
                                                <input type="checkbox" class="mr-2" value="{{ $feature->id }}"
                                                    name="room_feature[]">
                                                {{ $feature['name'] }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id="room_feature_error"></label>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        @if (isset($room_data))
                                            <input type="hidden" name="id" value="{{ $room_data->id }}">
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
    <script src="{{ asset('assets/backend/js/pages/room_create_update.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#submit-btn").click(function() {
                let error = false;
                const room_name = $("#roomName").val();
                const room_name_length = room_name.length;

                if (room_name == '') {
                    $("#roomName_error").text('Please fill hotel room room name');
                    $("#roomName_error").show();
                    error = true;
                }
                if (room_name_length < 5 && room_name != '') {
                    $("#roomName_error").text('Hotel room room name must be greater then five.');
                    $("#roomName_error").show();
                    error = true;
                }
                if (room_name_length > 20 && room_name != '') {
                    $("#roomName_error").text('Hotel room room name must be less then twenty.');
                    $("#roomName_error").show();
                    error = true;
                }
                if (!error) {
                    $("#roomName_error").hide();
                    $("#createForm").submit();
                }
            });
            // when click reset btn
            $("#reset-btn").click(function() {
                $("#roomName_error").hide();
                $('#roomName').val('');
            })

        })
    </script>
@endsection
