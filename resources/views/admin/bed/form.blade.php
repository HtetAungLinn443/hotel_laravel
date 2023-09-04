@extends('admin.layouts.master')

@section('title', 'Bed ' . (isset($bed_data) ? 'Update' : 'Create') . ' Page')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hotel Room Bed</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <h3>Bed Create</h3>
                        <button onclick="history.back()" class="btn btn-dark">Back</button>
                        <div class="x_content">
                            <br />
                            @if (isset($bed_data))
                                <form action="{{ route('bedUpdate') }}" method="POST" id="createForm">
                                @else
                                    <form action="{{ route('bedStore') }}" method="POST" id="createForm">
                            @endif

                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="bedName">Name<span
                                        class="required">*</span></label>

                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="name" id="bedName"
                                        value="{{ old('name', isset($bed_data) ? $bed_data->name : '') }}"
                                        placeholder="ex. Single Bed" autofocus autocomplete="true" />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error" id="bedName_error">

                                </label>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        @if (isset($bed_data))
                                            <input type="hidden" name="id" value="{{ $bed_data->id }}">
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
                const bed_name = $("#bedName").val();
                const bed_name_length = bed_name.length;

                if (bed_name == '') {
                    $("#bedName_error").text('Please fill hotel room bed name');
                    $("#bedName_error").show();
                    error = true;
                }
                if (bed_name_length < 5 && bed_name != '') {
                    $("#bedName_error").text('Hotel room bed name must be greater then five.');
                    $("#bedName_error").show();
                    error = true;
                }
                if (bed_name_length > 20 && bed_name != '') {
                    $("#bedName_error").text('Hotel room bed name must be less then twenty.');
                    $("#bedName_error").show();
                    error = true;
                }
                if (!error) {
                    $("#bedName_error").hide();
                    $("#createForm").submit();
                }
            });
            // when click reset btn
            $("#reset-btn").click(function() {
                $("#bedName_error").hide();
                $('#bedName').val('');
            })

        })
    </script>
@endsection
