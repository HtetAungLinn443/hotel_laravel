@extends('admin.layouts.master')

@section('title', 'Hotel Booking:: Admin')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hotel Room Amenity Lists</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <a href="{{ route('amenityCreate') }}" class="btn btn-info ">Create Amenity</a>
                        <div class="x_content">
                            <br />

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="col-3 text-center">ID</th>
                                        <th class="col-3 text-center">Name</th>
                                        <th class="col-3 text-center">Type</th>
                                        <th class="col-3 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($amenitys as $amenity)
                                        <tr>
                                            <td>
                                                {{ $amenity->id }}
                                            </td>
                                            <td>
                                                {{ $amenity->name }}
                                            </td>
                                            <td>
                                                @if ($amenity->type == 0)
                                                    General
                                                @elseif ($amenity->type == 1)
                                                    Bathroom
                                                @elseif ($amenity->type == 2)
                                                    Other
                                                @endif
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="{{ route('amenityEdit', $amenity->id) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a href="{{ route('amenityDelete', $amenity->id) }}"
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
