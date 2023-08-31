@extends('admin.layouts.master')

@section('title','Hotel Booking:: Admin')

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
                        <form action="{{ route('viewStore') }}" method="POST" id="createForm">
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="viewName">Name<span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="name" id="viewName" value="" placeholder="ex. Lake View" autofocus />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error" id="viewName_error">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </label>
                            </div>

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type='submit' class="btn btn-primary" id="submit-btn">Submit</button>
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
