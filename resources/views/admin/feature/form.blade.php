@extends('admin.layouts.master')

@section('title', 'Hotel Booking:: Admin')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hotel Room View</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <h3>View Create</h3>
                        <button onclick="history.back()" class="btn btn-dark">Back</button>
                        <div class="x_content">
                            <br />
                            @if (isset($feature_data))
                                <form action="{{ route('featureUpdate') }}" method="POST" id="createForm">
                                @else
                                    <form action="{{ route('featureStore') }}" method="POST" id="createForm">
                            @endif

                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="featureName">Name<span
                                        class="required">*</span></label>

                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="name" id="featureName"
                                        value="{{ old('name', isset($feature_data) ? $feature_data->name : '') }}"
                                        placeholder="ex. Lake View" autofocus autocomplete="true" />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error" id="featureName_error">

                                </label>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        @if (isset($feature_data))
                                            <input type="hidden" name="id" value="{{ $feature_data->id }}">
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
    <script>
        $(document).ready(function() {
            $("#submit-btn").click(function() {
                let error = false;
                const feature_name = $("#featureName").val();
                const feature_name_length = feature_name.length;

                if (feature_name == '') {
                    $("#featureName_error").text('Please fill hotel room feature name');
                    $("#featureName_error").show();
                    error = true;
                }
                if (feature_name_length < 5 && feature_name != '') {
                    $("#featureName_error").text('Hotel room feature name must be greater then five.');
                    $("#featureName_error").show();
                    error = true;
                }
                if (feature_name_length > 100 && feature_name != '') {
                    $("#featureName_error").text('Hotel room feature name must be less then 100.');
                    $("#featureName_error").show();
                    error = true;
                }
                if (!error) {
                    $("#featureName_error").hide();
                    $("#createForm").submit();
                }
            });
            // when click reset btn
            $("#reset-btn").click(function() {
                $("#featureName_error").hide();
                $('#featureName').val('');
            })

        })
    </script>
@endsection
