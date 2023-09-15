@extends('admin.layouts.master')

@section('title', 'View List Page')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hotel Room View List</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <a href="{{ route('viewCreate') }}" class="btn btn-info ">Create View</a>
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
                                    @foreach ($views as $view)
                                        <tr>
                                            <td>
                                                {{ $view->id }}
                                            </td>
                                            <td>
                                                {{ $view->name }}
                                            </td>
                                            <td>
                                                {{ getRoomNameByView($view) }}
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="{{ route('viewEdit', $view->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a href="{{ route('viewDelete', $view->id) }}"
                                                    class="btn btn-sm btn-danger">
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
