@extends('admin.layouts.master')

@section('title', 'View ' . (isset($view_data) ? 'Update' : 'Create') . ' Page')

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
                            @if (isset($view_data))
                                <form action="{{ route('viewUpdate') }}" method="POST" id="createForm">
                                @else
                                    <form action="{{ route('viewStore') }}" method="POST" id="createForm">
                            @endif

                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="viewName">Name<span
                                        class="required">*</span></label>

                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="name" id="viewName"
                                        value="{{ old('name', isset($view_data) ? $view_data->name : '') }}"
                                        placeholder="ex. Lake View" autofocus autocomplete="true" />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error" id="viewName_error">

                                </label>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        @if (isset($view_data))
                                            <input type="hidden" name="id" value="{{ $view_data->id }}">
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
                const view_name = $("#viewName").val();
                const view_name_length = view_name.length;

                if (view_name == '') {
                    $("#viewName_error").text('Please fill hotel room view name');
                    $("#viewName_error").show();
                    error = true;
                }
                if (view_name_length < 5 && view_name != '') {
                    $("#viewName_error").text('Hotel room view name must be greater then five.');
                    $("#viewName_error").show();
                    error = true;
                }
                if (view_name_length > 20 && view_name != '') {
                    $("#viewName_error").text('Hotel room view name must be less then twenty.');
                    $("#viewName_error").show();
                    error = true;
                }
                if (!error) {
                    $("#viewName_error").hide();
                    $("#createForm").submit();
                }
            });
            // when click reset btn
            $("#reset-btn").click(function() {
                $("#viewName_error").hide();
                $('#viewName').val('');
            })

        })
    </script>
@endsection
