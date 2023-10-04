@extends('frontend.layouts.master')

@section('title', (getSiteSetting() !== null ? getSiteSetting()->name : '') . '::Room Reserve Page')

@section('title_1')
    <h1 class="mb-4 bread">Room Reservetion</h1>
@endsection

@section('title_2')
    <h1 class="mb-4 bread">Room Reservetion</h1>
@endsection
@section('content')
    <section class="ftco-section contact-section bg-light">
        @if (isset($room))
            <div class="container">
                <h1>{{ $room->name }}</h1>
                @if (session()->has('error_msg'))
                    <div class="alert alert-warning">
                        <span>{{ session('error_msg') }}</span>
                    </div>
                @endif
                <div class="row block-9">
                    <div class="col-md-6 order-md-last d-flex">
                        <form action="{{ route('roomBooking') }}" class="bg-white p-5 contact-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <p id="price_per_day">
                                    Room Price - {{ $room->price_per_day }}
                                </p>
                                <p style="display:none" id="extra_bed_price">
                                    Extra Bed Price - {{ $room->extra_bed_price_per_day }}
                                </p>
                                <p id="total_price">
                                    Total Price - <span class="total_price">{{ $room->price_per_day }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="text" id="checkIn" class="form-control" name="checkIn"
                                    value="{{ old('checkIn') }}" placeholder="Check In Date">
                                @error('checkIn')
                                    <p class="text-danger pl-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" id="checkOut" class="form-control" name="checkOut"
                                    value="{{ old('checkOut') }}" placeholder="Check Out Date">
                                @error('checkOut')
                                    <p class="text-danger pl-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="userName" value="{{ old('userName') }}"
                                    placeholder="Your Name">
                                @error('userName')
                                    <p class="text-danger pl-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="Your Email">
                                @error('email')
                                    <p class="text-danger pl-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="phone" value="{{ old('phone') }}"
                                    placeholder="Your Phone">
                                @error('phone')
                                    <p class="text-danger pl-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group ml-4" style="user-select:none;">
                                <input type="checkbox" class="form-check-input" id="is_extra_bed" name="is_extra_bed"
                                    {{ old('is_extra_bed') ? ' checked' : '' }} value="1">
                                <label for="is_extra_bed">Is extra bed</label>
                                @error('is_extra_bed')
                                    <p class="text-danger pl-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="roomId" value="{{ $room->id }}">
                                <input type="submit" id="submit_btn" value="Booking" class="btn btn-primary py-3 px-5">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 d-flex">
                        @if ($room->getGalleriesByRoom() != null)
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
                    </div>
                </div>
            </div>
        @else
            <h1 class='text-center text-danger'>
                <b>
                    <?php echo $error_message; ?>
                </b>
            </h1>
        @endif
    </section>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#checkIn").datepicker({
                minDate: 0,
                onSelect: function(selectedDate) {
                    var minDate = new Date(selectedDate);
                    minDate.setDate(minDate.getDate() + 1);
                    $("#checkOut").datepicker("option", "minDate", minDate);
                    $("#checkOut").prop("distable", false);
                }
            });

            $("#checkOut").datepicker({
                minDate: 0
            });
            let checkbox = $("#is_extra_bed");
            checkbox.change(function() {
                if (checkbox.is(':checked')) {
                    $("#extra_bed_price").show();
                    calculateRoomPrice(true)
                } else {
                    $("#extra_bed_price").hide();
                    calculateRoomPrice(false)
                }
            })
            $("#checkOut").change(function(){
                if (checkbox.is(':checked')) {
                    $("#extra_bed_price").show();
                    calculateRoomPrice(true)
                } else {
                    $("#extra_bed_price").hide();
                    calculateRoomPrice(false)
                }
            })

            function calculateRoomPrice(is_extra_bed) {
                var room_price = '{{ $room->price_per_day }}';
                var extra_bed_price = '{{ $room->extra_bed_price_per_day }}';
                var checkin_val = $("#checkIn").val();
                var checkout_val = $("#checkOut").val();
                if (checkin_val != '' && checkout_val != '') {
                    var checkin_date = new Date(checkin_val);
                    var checkout_date = new Date(checkout_val);

                    var time_difference = checkout_date - checkin_date;
                    var days_difference = Math.ceil(time_difference / (1000 * 3600 * 24));

                    var total_price = room_price * days_difference;
                }
                if (is_extra_bed) {
                    total_price += extra_bed_price * days_difference;
                }

                $('.total_price').text(total_price.toFixed(2)); // Display total price with 2 decimal places
                $('.htotal_price').val(total_price.toFixed(2));
                // if (is_extra_bed) {
                //     var total_price = parseInt(room_price) + parseInt(extra_bed_price);
                // } else {
                //     var total_price = parseInt(room_price)
                // }
                // $('.total_price').text(total_price);
                // $('.htotal_price').val(total_price);
            }
        })
    </script>
@endsection
