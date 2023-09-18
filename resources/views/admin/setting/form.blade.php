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
                            <form action="" method="POST" id="createForm" enctype="multipart/form-data">

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="name">Hotel
                                        Name<span class="required">*</span></label>

                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="" placeholder="ex. Softguide Hotel" autofocus />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide" id=""></label>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="email">Hotel
                                        Email<span class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6">
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="" placeholder="ex. softguide@gmail.com" />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide" id=""></label>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="address">Hotel
                                        Address<span class="required">*</span></label>

                                    <div class="col-md-6 col-sm-6">
                                        <textarea name="address" class="form-control" id="address" cols="30" rows="4"
                                            placeholder="Enter Hotel Address"></textarea>
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide" id=""></label>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="check_in">
                                        Check In Time<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class='input-group date' id='check_in'>
                                            <input type='text' class="form-control" name="check_in" value=""
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
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="check_out">
                                        Check Out Time<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class='input-group date' id='check_out'>
                                            <input type='text' class="form-control" name="check_out" value=""
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
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="outline_phone">
                                        Outlin Phone<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="outline_phone" id="outline_phone" value=""
                                            placeholder="ex. 0123222" type="number" />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                        id=""></label>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="online_phone">
                                        Onlin Phone<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="online_phone" id="online_phone" value=""
                                            placeholder="ex. 0911223344" type="number" />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                        id=""></label>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="size_unit">
                                        Room Size Unit<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="size_unit" id="size_unit" value=""
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
                                        <input class="form-control" name="occupancy" id="occupancy" value=""
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
                                        <input class="form-control" name="price_unit" id="price_unit" value=""
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
                                            <label class="thumb-upload btn btn-info" style="">Upload
                                                Image</label>
                                            <div class="preview-container">
                                                <a class="thumb-update btn btn-info text-white" style="">Update
                                                    Image</a>
                                                <img src="" class="preview-img" />
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
                                            <button type='submit' class="btn btn-primary"
                                                id="submit-btn">Submit</button>
                                            <button type='reset' class="btn btn-success" id="reset-btn">Reset</button>
                                            <input type="hidden" name="id" value="">
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
