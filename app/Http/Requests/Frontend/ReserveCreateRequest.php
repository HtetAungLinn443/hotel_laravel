<?php

namespace App\Http\Requests\Frontend;

use App\Rules\CheckBookingAvailability;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckInDateBeforeCheckOutDate;

class ReserveCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'roomId'        => 'required|integer|exists:rooms,id',
            'checkIn'       => 'required|date',
            'checkOut'      => [
                'required',
                'date',
                new CheckInDateBeforeCheckOutDate(),
                new CheckBookingAvailability(
                    request('roomId'),
                    request('checkIn'),
                    request('checkOut'),
                ),
            ],
            'userName'      => 'required',
            'email'         => 'required|email',
            'phone'         => 'required',
            'is_extra_bed'  => 'sometimes|integer'
        ];
    }
}
