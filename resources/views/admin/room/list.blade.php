@extends('admin.layouts.master')

@section('title', 'View List Page')

@section('extra_css')
    <style>
        table tbody tr {
            margin: 0 auto;
            line-height: 80px;
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
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Size</th>
                                        <th class="text-center">Occupancy</th>
                                        <th class="text-center">Bed</th>
                                        <th class="text-center">View</th>
                                        <th class="text-center">Price Per Day</th>
                                        <th class="text-center">Extra Bed Price</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rooms as $room)
                                        <tr>
                                            <td class="text-center">
                                                <span>{{ $room->id }}</span>
                                            </td>
                                            <td class=" d-flex justify-content-center align-item-center">
                                                <img src="{{ asset('assets/upload/' . $room->id . '/thumb/' . $room->thumbnail_img) }}"
                                                    alt="{{ $room->name }}" style="height:80px; overflow:hidden;">
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
                                                {{ $room->bed_name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $room->getViewNameByRoom->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $room->price_per_day }}
                                            </td>
                                            <td class="text-center">
                                                {{ $room->extra_bed_price_per_day }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('roomGalleryIndex', $room->id) }}"
                                                    class="btn btn-sm btn-info"
                                                    title="{{ route('roomGalleryIndex', $room->id) }}">
                                                    <i class="fa-solid fa-image"></i>
                                                </a>
                                                <a href="{{ route('roomDetail', $room->id) }}" class="btn btn-sm btn-info"
                                                    title="{{ route('roomDetail', $room->id) }}">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="{{ route('roomEdit', $room->id) }}" class="btn btn-sm btn-info"
                                                    title="{{ route('roomEdit', $room->id) }}">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a href="{{ route('roomDelete', $room->id) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you went delete room')"
                                                    title="{{ route('roomDelete', $room->id) }}">
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
