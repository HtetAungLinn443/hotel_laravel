@extends('admin.layouts.master')

@section('title', 'View List Page')

@section('extra_css')
    <style>
        table tbody tr {
            margin: 0 auto;
            line-height: 100px;
        }
    </style>
@endsection

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
                        <a href="{{ route('roomCreate') }}" class="btn btn-info ">Create View</a>
                        <div class="x_content">
                            <br />

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="col-2 text-center">Image</th>
                                        <th class="col-1 text-center">ID</th>
                                        <th class="col-2 text-center">Name</th>
                                        <th class="col-1 text-center">Size</th>
                                        <th class="col-1 text-center">Occupancy</th>
                                        <th class="col-1 text-center">Price Per Day</th>
                                        <th class="col-1 text-center">Extra Bed Price</th>
                                        <th class="col-2 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rooms as $room)
                                        <tr>
                                            <td class=" d-flex justify-content-center align-item-center">
                                                <img src="https://images.pexels.com/photos/12761588/pexels-photo-12761588.jpeg?auto=compress&cs=tinysrgb&w=1600&lazy=load"
                                                    alt="{{ $room->name }}" style="height:100px; overflow:hidden;">
                                            </td>
                                            <td class="text-center">
                                                <span>{{ $room->id }}</span>
                                            </td>
                                            <td class="text-center">
                                                {{ $room->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $room->size }}
                                            </td>
                                            <td class="text-center">
                                                {{ $room->occupancy }}
                                            </td>
                                            <td class="text-center">
                                                {{ $room->price_per_day }}
                                            </td>
                                            <td class="text-center">
                                                {{ $room->extra_bed_price_per_day }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('roomEdit', $room->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="{{ route('roomEdit', $room->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a href="{{ route('roomDelete', $room->id) }}"
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
