@extends('frontend.layouts.master')

@section('title', 'Hotel Booking')
@section('content')

    <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <form action="#" class="booking-form aside-stretch">
                        <div class="row">
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap align-self-stretch py-3 px-4">
                                        <label for="#">Check-in Date</label>
                                        <input type="text" class="form-control checkin_date" placeholder="Check-in date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap align-self-stretch py-3 px-4">
                                        <label for="#">Check-out Date</label>
                                        <input type="text" class="form-control checkout_date"
                                            placeholder="Check-out date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap align-self-stretch py-3 px-4">
                                        <label for="#">Room</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Suite</option>
                                                    <option value="">Family Room</option>
                                                    <option value="">Deluxe Room</option>
                                                    <option value="">Classic Room</option>
                                                    <option value="">Superior Room</option>
                                                    <option value="">Luxury Room</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex">
                                <div class="form-group d-flex align-self-stretch">
                                    <a href="#"
                                        class="btn btn-primary py-5 py-md-3 px-4 align-self-stretch d-block"><span>Check
                                            Availability <small>Best Price Guaranteed!</small></span></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Welcome to Harbor Lights Hotel</span>
                    <h2 class="mb-4">You'll Never Want To Leave</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-reception-bell"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Friendly Service</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services active py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-serving-dish"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Get Breakfast</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md px-md-1 d-flex align-sel Searchf-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-car"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Transfer Services</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-spa"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Suits &amp; SPA</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md pl-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="ion-ios-bed"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Cozy Rooms</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.components.about')
    <section class="ftco-section ftco-no-pb ftco-room">
        <div class="container-fluid px-0">
            <div class="row no-gutters justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">{{ getSiteSetting() !== null ? getSiteSetting()->name : '' }}</h2>
                </div>
            </div>

            <div class="row no-gutters">

                @if ($result_row >= 1)
                    @php
                        $counter = 0;
                    @endphp

                    @foreach ($result as $row)
                        @php
                            $id = $row['id'];
                            $thumb = $row['thumbnail_img'];
                            $thumb_full_path = $base_url . 'assets/upload/' . $id . '/thumb/' . $thumb;
                            $price = $row['price_per_day'];
                            $name = $row['name'];
                            $room_detail = $base_url . 'room/details/' . $id;
                            $counter++;
                            if ($counter < 3 || $counter > 4) {
                                $class1 = '';
                                $class2 = 'left-arrow';
                            } else {
                                $class1 = 'order-md-last';
                                $class2 = 'right-arrow';
                            }
                        @endphp

                        <div class="col-lg-6">
                            <div class="room-wrap d-md-flex ftco-animate">
                                <a href="{{ $room_detail }}" title="{{ $name }}" class="img {{ $class1 }}"
                                    style="background-image: url({{ $thumb_full_path }});"></a>
                                <div class="half {{ $class2 }} d-flex align-items-center">
                                    <div class="text p-4 text-center">
                                        <p class="star mb-0"><span class="ion-ios-star"></span><span
                                                class="ion-ios-star"></span><span class="ion-ios-star"></span><span
                                                class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                                        <p class="mb-0"><span
                                                class="price mr-1">{{ $price . '(' . $setting['price_unit'] . ')' }}</span>
                                            <span class="per">per night</span>
                                        </p>
                                        <h3 class="mb-3"><a href="{{ $room_detail }}">{{ $name }}</a></h3>
                                        <p class="pt-1"><a href="{{ $room_detail }}"
                                                class="btn-custom px-3 py-2 rounded">View Details <span
                                                    class="icon-long-arrow-right"></span></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    @include('frontend.components.instagram')
@endsection
