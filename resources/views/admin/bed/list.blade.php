@extends('admin.layouts.master')

@section('title', 'Bed List Page')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hotel Room Bed Lists</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <a href="{{ route('bedCreate') }}" class="btn btn-info ">Create Bed</a>
                        <div class="x_content">
                            <br />

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="col-3">ID</th>
                                        <th class="col-3">Name</th>
                                        <th class="col-3">Room Name</th>
                                        <th class="col-3 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($beds as $bed)
                                        <tr>
                                            <td>
                                                {{ $bed->id }}
                                            </td>
                                            <td>
                                                {{ $bed->name }}
                                            </td>
                                            <td>
                                                <span>{{ getRoomNameByBed($bed) }}</span>
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="{{ route('bedEdit', $bed->id) }}" class="btn btn-sm btn-info"
                                                    title="{{ route('bedEdit', $bed->id) }}">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a href="{{ route('bedDelete', $bed->id) }}" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you went delete room bed')"
                                                    title="{{ route('bedDelete', $bed->id) }}">
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
