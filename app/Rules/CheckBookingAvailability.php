<?php

namespace App\Rules;

use App\Constant;
use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Contracts\Validation\Rule;

class CheckBookingAvailability implements Rule
{
    private $room_id;
    private $booking_check_in;
    private $booking_check_out;

    public function __construct($room_id, $booking_check_in, $booking_check_out)
    {
        $this->room_id              = $room_id;
        $this->booking_check_in     = $booking_check_in;
        $this->booking_check_out    = $booking_check_out;
    }

    public function passes($attribute, $value)
    {
        $check_in_date = Carbon::createFromFormat('m/d/Y', $this->booking_check_in)->format('Y-m-d');
        $check_in_cnt = Booking::where('check_in_date', '<', $check_in_date)
            ->where('check_out_date', '>', $check_in_date)
            ->where('status', Constant::BOOKING_AVAILABLE)
            ->where('room_id', $this->room_id)
            ->whereNull('deleted_at')
            ->count();
        $check_out_date = Carbon::createFromFormat('m/d/Y', $this->booking_check_out)->format('Y-m-d');
        $check_out_cnt = Booking::where('check_in_date', '<', $check_out_date)
            ->where('check_out_date', '>', $check_out_date)
            ->where('status', Constant::BOOKING_AVAILABLE)
            ->where('room_id', $this->room_id)
            ->whereNull('deleted_at')
            ->count();

        return $check_in_cnt === 0 && $check_out_cnt === 0;
    }

    public function message()
    {
        return 'The room you reserve is already taken!';
    }
}
