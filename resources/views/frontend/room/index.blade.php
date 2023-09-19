@extends('frontend.layouts.master')

@section('title', (getSiteSetting() !== null ? getSiteSetting()->name : '') . '::Room Lists Page')

@section('title_1')
<h2>More than a hotel... an experience</h2>
<h1 class="mb-3">Hotel for the whole family, all year round.</h1>
@endsection

@section('title_2')
<h2>Harbor Lights Hotel &amp; Resort</h2>
<h1 class="mb-3">It feels like staying in your own home.</h1>
@endsection
@section('content')
    <section class="ftco-section ftco-no-pb ftco-room">
        <div class="container-fluid px-0">
            <div class="row no-gutters justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Harbor Lights Rooms</span>
                    <h2 class="mb-4">Hotel Master's Rooms</h2>
                </div>
            </div>
            <div class="row no-gutters">
                @if (count($rooms))
                    @php
                        $counter = 0;
                        $line = 1;
                    @endphp
                    @foreach ($rooms as $row)
                        @php
                            $id = $row['id'];
                            $thumb = $row['thumbnail_img'];
                            $thumb_full_path = asset('assets/upload/' . $id . '/thumb/' . $thumb);
                            $price = $row['price_per_day'];
                            $name = $row['name'];
                            $counter++;
                            if ($line % 2 == 0) {
                                $class1 = 'order-md-last';
                                $class2 = 'right-arrow';
                            } else {
                                $class1 = '';
                                $class2 = 'left-arrow';
                            }

                            if ($counter == 2) {
                                $counter = 0;
                                $line++;
                            }
                        @endphp
                        <div class="col-lg-6">
                            <div class="room-wrap d-md-flex ftco-animate">
                                <a href="{{ route('userRoomDetails',$id) }}" title="{{ $name }}" class="img {{ $class1 }}"
                                    style="background-image: url('{{ $thumb_full_path }}');"></a>
                                <div class="half {{ $class2 }} d-flex align-items-center">
                                    <div class="text p-4 text-center">
                                        <p class="star mb-0"><span class="ion-ios-star"></span><span
                                                class="ion-ios-star"></span><span class="ion-ios-star"></span><span
                                                class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                                        <p class="mb-0"><span class="price mr-1">{{ $price }}
                                                ({{ getSiteSetting() !== null ? getSiteSetting()->price_unit:''}})</span><span
                                                class="per">per night</span></p>
                                        <h3 class="mb-3"><a href="{{ route('userRoomDetails',$id) }}">{{ $name }}</a></h3>
                                        <p class="pt-1"><a href="{{ route('userRoomDetails',$id) }}"
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

@endsection
