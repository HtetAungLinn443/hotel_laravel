@extends('admin.layouts.master')
@section('title', 'Room Detail Page')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hotel Room Details</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="row">
                                <h1 class="col-12 text-center text-dark"> {{ $room_data->name }}</h1>

                                <div class="col-12">
                                    @foreach ($room_galleries as $gallery)
                                        <div class="col-md-3 p-1">
                                            <div class="">
                                                <img src="{{ asset('assets/upload/' . $room_data->id . '/' . $gallery->image) }}"
                                                    class="img-thumbnail w-100">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-4 mt-4 offset-2 text-dark">
                                    <p class="" style="font-size: 18px;">
                                        Occupancy :
                                        <span>
                                            {{ $room_data->occupancy }} {{ getSiteSetting()->occupancy }}
                                        </span>
                                    </p>
                                    <p class="" style="font-size: 18px;">
                                        Room Size :
                                        <span>
                                            {{ $room_data->size }} {{ getSiteSetting()->size_unit }}
                                        </span>
                                    </p>
                                    <p class="" style="font-size: 18px;">
                                        Price Per Day :
                                        <span>
                                            {{ $room_data->price_per_day }} {{ getSiteSetting()->price_unit }}
                                        </span>
                                    </p>

                                    @foreach ($amenity_by_room_id as $room_amenity)
                                        <p style="font-size: 18px;">
                                            {{ $room_amenity }}
                                        </p>
                                    @endforeach
                                </div>
                                <div class="col-md-4 mt-4 offset-2 text-dark">
                                    <p class="" style="font-size: 18px;">
                                        View :
                                        <span>
                                            {{ $room_data->getViewNameByRoom->name }}
                                        </span>
                                    </p>
                                    <p class="" style="font-size: 18px;">
                                        Bed Type :
                                        <span>
                                            {{ $room_data->getBedNameByRoom->name }}
                                        </span>
                                    </p>
                                    <p class="" style="font-size: 18px;">
                                        Price Per Day :
                                        <span>
                                            {{ $room_data->extra_bed_price_per_day }} {{ getSiteSetting()->price_unit }}
                                        </span>
                                    </p>
                                    @foreach ($feature_by_room_id as $room_feature)
                                        <p style="font-size: 18px;">
                                            {{ $room_feature }}
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
