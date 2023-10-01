@extends('admin.layouts.master')

@section('title', 'Special Feature List Page')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hotel Room Special Feature List</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <a href="{{ route('featureCreate') }}" class="btn btn-info ">Create View</a>
                        <div class="x_content">
                            <br />

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="col-4">ID</th>
                                        <th class="col-5">Name</th>
                                        <th class="col-3 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($features as $feature)
                                        <tr>
                                            <td>
                                                {{ $feature->id }}
                                            </td>
                                            <td>
                                                {{ $feature->name }}
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="{{ route('featureEdit', $feature->id) }}"
                                                    class="btn btn-sm btn-info"
                                                    title="{{ route('featureEdit', $feature->id) }}">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a href="{{ route('featureDelete', $feature->id) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you went delete room special feature')"
                                                    title="{{ route('featureDelete', $feature->id) }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
