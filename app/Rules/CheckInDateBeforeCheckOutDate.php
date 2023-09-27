<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class CheckInDateBeforeCheckOutDate implements Rule
{
    public function passes($attribute, $value)
    {
        $checkInDate = Carbon::parse(request('checkIn'));
        $checkOutDate = Carbon::parse(request('checkOut'));

        return $checkInDate->lt($checkOutDate);
    }

    public function message()
    {
        return 'The check-in date must be before the check-out date.';
    }
}
