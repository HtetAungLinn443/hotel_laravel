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
                                <form action="{{ route('roomUpdate') }}" method="POST" id="createForm"
                                    enctype="multipart/form-data">
                                @else
                                    <form action="{{ route('roomStore') }}" method="POST" id="createForm"
                                        enctype="multipart/form-data">
                            @endif
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Room
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
                                    <input type="file" name="file" id="thumb_file" style="display: none;"
                                        accept="image/*">
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide" id="thumb_error"></label>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="room_name">Room
                                    Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="name" id="room_name" placeholder="ex. Dulex Room "
                                        autofocus value="{{ old('name') }}" />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error " id="room_name_error"></label>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"
                                    for="room_occupation">Occupation<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" class="form-control" name="room_occupation" id="room_occupation"
                                        placeholder="ex. 1" min="1" max="12"
                                        value="{{ old('room_occupation') }}" />
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
                                            <option value="{{ $bed->id }}"
                                                {{ old('room_bed') == $bed->id ? 'selected' : '' }}>{{ $bed->name }}
                                            </option>
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
                                        placeholder="Enter room size" value="{{ old('room_size') }}" />
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
                                            <option value="{{ $view->id }}"
                                                {{ old('room_view') == $view->id ? 'selected' : '' }}>{{ $view->name }}
                                            </option>
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
                                        placeholder="ex. 100$" value="{{ old('room_price') }}" />
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
                                        id="extra_bed_price" placeholder="ex. 30$"
                                        value="{{ old('extra_bed_price') }}" />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id="extra_bed_price_error"></label>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"
                                    for="description">Description<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea name="description" id="description" class="form-control" placeholder="Description" rows="4">{{ old('description') }}</textarea>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id="description_error"></label>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"
                                    for="room_details">Details<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea name="room_details" id="room_details" class="form-control" placeholder="Details" rows="4">{{ old('room_details') }}</textarea>
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
                                                            value="{{ $amenity['id'] }}" name="room_amenity[]"
                                                            {{ is_array(old('room_amenity')) && in_array($amenity['id'], old('room_amenity')) ? 'checked' : '' }}>
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
                                                    name="room_feature[]"
                                                    {{ is_array(old('room_feature')) && in_array($feature->id, old('room_feature')) ? 'checked' : '' }}>
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
                                        <button type='submit' class="btn btn-primary" id="submit-btns">Submit</button>
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
    @if (session()->has('error_msg'))
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ session()->get('error_msg') }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @endif
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
    @error('room_size')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('room_occupation')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('room_bed')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('room_view')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('description')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('room_details')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('room_price')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('extra_bed_price')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('room_amenity')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('room_feature')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('file')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
@endsection
