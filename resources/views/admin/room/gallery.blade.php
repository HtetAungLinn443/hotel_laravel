@extends('admin.layouts.master')

@section('title', 'Room Gallery' . (isset($gallery_update) ? 'Update' : 'Create') . ' Page')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hotel Room Gallery</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    @if (isset($room_galleries) && count($room_galleries) > 0)
                        <div class="row m-3">
                            @foreach ($room_galleries as $gallery)
                                <div class="col-md-3">
                                    <div class="image-wrapper shadow-sm">
                                        <img src="{{ asset('assets/upload/' . $id . '/' . $gallery->image) }}">
                                    </div>
                                    <div class="btn-wrapper d-flex justify-content-between ">
                                        <a href="{{ route('roomGalleryEdit', $gallery->id) }}"
                                            class="btn btn-sm btn-info w-50 "><i class="fa fa-pen-to-square"></i>
                                            Edit</a>
                                        <a href="{{ route('roomGalleryDelete', $gallery->id) }}"
                                            class="btn btn-sm btn-danger w-50"
                                            onclick="return confirm('Are you sure you went delete room gallery')"><i
                                                class="fa fa-trash"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="x_panel">
                        <h3>Gallery Create</h3>
                        <div class="x_content">
                            <br />
                            @if (isset($gallery_update))
                                <form action="{{ route('roomGalleryUpdate') }}" method="POST" id="createForm"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="gallery_id" value="{{ $gallery_update->id }}">
                                @else
                                    <form action="{{ route('roomGalleryStore') }}" method="POST" id="createForm"
                                        enctype="multipart/form-data">
                            @endif
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="room_name">Room
                                    Image<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 d-flex justify-content-center">
                                    <div class="preview-wrapper rounded  d-flex justify-content-center align-items-center">
                                        <label class="thumb-upload btn btn-info"
                                            style="display:{{ isset($gallery_update) ? 'none' : '' }};">Upload
                                            Image</label>
                                        <div class="preview-container"
                                            style="display:{{ isset($gallery_update) ? '' : 'none' }};">
                                            <a class="thumb-update btn btn-info text-white ">Update
                                                Image</a>
                                            @if (isset($gallery_update))
                                                <img src="{{ asset('assets/upload/' . $gallery_update->room_id . '/' . $gallery_update->image) }}"
                                                    class="preview-img" />
                                            @else
                                                <img src="" class="preview-img" />
                                            @endif
                                        </div>
                                    </div>
                                    <input type="file" name="file" id="thumb_file" value=""
                                        style="display: none;" accept="image/*">
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide" id="thumb_error"></label>
                            </div>

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3 d-flex justify-content-between">
                                        <button type='submit' class="btn btn-primary" id="submit-btn">Upload</button>
                                        <button type='reset' class="btn btn-success" id="reset-btn">Reset</button>
                                        <a class="btn btn-dark" href="{{ route('roomLists') }}">Next</a>
                                        <input type="hidden" name="room_id"
                                            value="{{ isset($gallery_update) ? $gallery_update->room_id : $id }}">
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
@endsection
