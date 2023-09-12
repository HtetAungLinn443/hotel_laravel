@extends('admin.layouts.master')

@section('title', 'Room Gallery')
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
                    <div class="row m-3">
                        <div class="col-md-3">
                            <div class="image-wrapper shadow-sm">
                                <img src="">
                            </div>
                            <div class="btn-wrapper d-flex justify-content-between ">
                                <a href="" class="btn btn-sm btn-info w-50 "><i class="fa fa-pen-to-square"></i>
                                    Edit</a>
                                <a href="" class="btn btn-sm btn-danger w-50"><i class="fa fa-trash"></i>
                                    Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="x_panel">
                        <h3>Gallery Create</h3>
                        <div class="x_content">
                            <br />
                            <form action="room_gallery.php" method="POST" id="createForm" enctype="multipart/form-data">
                                @csrf
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="room_name">Room
                                        Image<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 d-flex justify-content-center">
                                        <div
                                            class="preview-wrapper rounded  d-flex justify-content-center align-items-center">
                                            <label class="thumb-upload btn btn-info">Upload
                                                Image</label>
                                            <div class="preview-container" style="display:none;">
                                                <a class="thumb-update btn btn-info text-white">Update Image</a>
                                                <img src="" class="preview-img" />
                                            </div>
                                        </div>
                                        <input type="file" name="file" id="thumb_file" value=""
                                            style="display: none;" accept="image/*">
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                        id="thumb_error"></label>
                                </div>

                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3 d-flex justify-content-between">
                                            <button type='submit' class="btn btn-primary" id="submit-btn">Upload</button>
                                            <button type='reset' class="btn btn-success" id="reset-btn">Reset</button>
                                            <a class="btn btn-dark" href="room_list.php">Next</a>
                                            <input type="hidden" name="room_id" value="">
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
