@extends('admin.layouts.master')

@section('title', 'Booking List Page')

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
                        <a href="{{ route('featureCreate') }}" class="btn btn-info ">Create View</a>
                        <div class="x_content">
                            <br />

                            <table id="" class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="">ID</th>
                                        <th class="">CheckIn Date</th>
                                        <th class="">CheckOut Date</th>
                                        <th class="">Room</th>
                                        <th class="">Customer Name</th>
                                        <th class="col-2 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lists as $list)
                                        <tr>
                                            <td>
                                                {{ $list->id }}
                                            </td>
                                            <td>
                                                {{ $list->check_in_date }}
                                            </td>
                                            <td>
                                                {{ $list->check_out_date }}
                                            </td>
                                            <td>
                                                {{ $list->getRoomById->name }}
                                            </td>
                                            <td>
                                                {{ $list->getCustomerById->name }}
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="" class="btn btn-sm btn-info" title="">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a href="" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you went delete room special feature')"
                                                    title="">
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
