@extends('admin.layouts.master')
@section('title', 'Hotel Setting')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hotel Setting</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <button onclick="history.back()" class="btn btn-dark">Back</button>
                        <div class="x_content">
                            <br />
                            <form action="{{ route('settingUpdate') }}" method="POST" id="createForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="name">Hotel
                                        Name<span class="required">*</span></label>

                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name', isset($setting) ? $setting->name : '') }}"
                                            placeholder="ex. Softguide Hotel" autofocus />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide" id=""></label>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="email">Hotel
                                        Email<span class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6">
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ old('email', isset($setting) ? $setting->email : '') }}"
                                            placeholder="ex. softguide@gmail.com" />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide" id=""></label>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="address">Hotel
                                        Address<span class="required">*</span></label>

                                    <div class="col-md-6 col-sm-6">
                                        <textarea name="address" class="form-control" id="address" cols="30" rows="4"
                                            placeholder="Enter Hotel Address">{{ old('email', isset($setting) ? $setting->address : '') }}</textarea>
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide" id=""></label>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="check_in_time">
                                        Check In Time<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class='input-group date' id='check_in_time'>
                                            <input type='text' class="form-control" name="check_in_time"
                                                value="{{ old('check_in_time', isset($setting) ? $setting->check_in_time : '') }}"
                                                placeholder="Choose Check In " />
                                            <span class="input-group-addon">
                                                <span class="">
                                                    <i class="fa-solid fa-clock" style="padding:5px;"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide" id=""></label>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="check_out_time">
                                        Check Out Time<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class='input-group date' id='check_out_time'>
                                            <input type='text' class="form-control" name="check_out_time"
                                                value="{{ old('check_out_time', isset($setting) ? $setting->check_out_time : '') }}"
                                                placeholder="Choose Check Out " />
                                            <span class="input-group-addon">
                                                <span class="">
                                                    <i class="fa-solid fa-clock" style="padding:5px;"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide" id=""></label>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="phone">
                                        Phone<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="phone" id="phone"
                                            value="{{ old('phone', isset($setting) ? $setting->phone : '') }}"
                                            placeholder="ex. 0123222" type="text" />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                        id=""></label>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="size_unit">
                                        Room Size Unit<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="size_unit" id="size_unit"
                                            value="{{ old('size_unit', isset($setting) ? $setting->size_unit : '') }}"
                                            placeholder="ex. mm²" type="text" />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                        id=""></label>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="occupancy">
                                        Occupancy<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="occupancy" id="occupancy"
                                            value="{{ old('occupancy', isset($setting) ? $setting->occupancy : '') }}"
                                            placeholder="ex. People" type="text" />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                        id=""></label>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="price_unit">
                                        Price Unit<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="price_unit" id="price_unit"
                                            value="{{ old('price_unit', isset($setting) ? $setting->price_unit : '') }}"
                                            placeholder="ex. Kyats" type="text" />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                        id=""></label>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="">
                                        Hotel Logo<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 d-flex justify-content-center">
                                        <div
                                            class="preview-wrapper rounded  d-flex justify-content-center align-items-center">
                                            <div class="preview-container">
                                                <a class="thumb-update btn btn-info text-white" style="">Update
                                                    Image</a>
                                                <img src="{{ old('size_unit', asset('assets/images/' . (isset($setting) ? $setting->logo_path : ''))) }}"
                                                    class="preview-img"
                                                    alt="{{ old('size_unit', asset('assets/images/' . (isset($setting) ? $setting->logo_path : ''))) }}" />
                                            </div>
                                        </div>
                                        <input type="file" name="file" id="thumb_file" style="display: none;"
                                            accept="image/*">
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                        id=""></label>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <input type="hidden" name="id"
                                                value="{{ old('id', isset($setting) ? $setting->id : '') }}">
                                            <button type='submit' class="btn btn-primary"
                                                id="submit-btn">Submit</button>
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
            $('#check_in').datetimepicker({
                format: 'hh:mm A'
            });
            $('#check_out').datetimepicker({
                format: 'hh:mm A'
            });
        })
    </script>
@endsection
