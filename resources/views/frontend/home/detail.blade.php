@extends('frontend.layouts.master')

@section('title', (getSiteSetting() !== null ? getSiteSetting()->name :'').'::Room Details Page')
@section('title_1')
<p class="breadcrumbs mb-2"><span class="mr-2"><a href="">Home</a></span></p>
<h1 class="mb-4 bread">Rooms Details</h1>
@endsection
@section('title_2')
<p class="breadcrumbs mb-2"><span class="mr-2"><a href="#">Home</a></span> <span class="mr-2"><a href="#">Rooms</a></span> <span>Rooms Single</span></p>
<h1 class="mb-4 bread">Rooms Details</h1>
@endsection
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @if ($room->getGalleriesByRoom() !== null)
                            <div class="col-md-12 ftco-animate">
                                <div class="single-slider owl-carousel">
                                    @foreach ($room->getGalleriesByRoom as $gallery)
                                        <div class="item">
                                            <div class="room-img"
                                                style="background-image: url({{ asset('assets/upload/' . $room->id . '/' . $gallery->image) }});">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
                            <h2 class="mb-4">{{ $room->name }} <span>- ({{ $room->occupancy }}
                                    {{ getSiteSetting() != null ? getSiteSetting()->occupancy : '' }})</span>
                            </h2>
                            <p>
                                {{ $room->detail }}
                            </p>
                            <div class="d-md-flex mt-5 mb-5">
                                <ul class="list">
                                    <li><span>Max:</span> {{ $room->occupancy }}
                                        {{ getSiteSetting() != null ? getSiteSetting()->occupancy : '' }}</li>
                                    <li><span>Size:</span> {{ $room->size }}
                                        {{ getSiteSetting() != null ? getSiteSetting()->size_unit : '' }}</li>
                                    <li><span>Price Per Day:</span> {{ $room->price_per_day }}
                                        {{ getSiteSetting() != null ? getSiteSetting()->price_unit : '' }}</li>
                                </ul>
                                <ul class="list ml-md-5">
                                    <li><span>View:</span> {{ $room->getViewNameByRoom->name }}</li>
                                    <li><span>Bed:</span> {{ $room->getBedNameByRoom->name }}</li>
                                    <li><span>Extra Bed Price Per Day:</span> {{ $room->extra_bed_price_per_day }}
                                        {{ getSiteSetting() != null ? getSiteSetting()->price_unit : '' }}
                                    </li>
                                </ul>
                            </div>
                            <p>
                                {{ $room->description }}
                            </p>
                            <div class="">
                                <a href="{{ route('roomReserve',$room->id) }}" title="Reserve" class="btn btn-primary py-3 px-5">Reserve</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate pl-md-5">

                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Amenities</h3>
                            @foreach ($amenities as $amenity)
                                <li><a href="#" title="{{ $amenity->name }}">{{ $amenity->name }}
                                        <span>(@if ($amenity->type == 0)
                                                General
                                                @elseif ($amenity->type == 1)
                                                Bathroom
                                                @else
                                                Other
                                            @endif)
                                        </span>
                                    </a>
                                </li>
                            @endforeach

                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Specail Feature</h3>
                        @foreach ($features as $feature)
                        <div class=" mb-4 d-flex">
                            <div class="text">
                                <h3 class="heading"><a href="#" title="{{ $feature->name }}">{{ $feature->name }}</a></h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
