<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

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
            'checkOut'      => 'required|date',
            'userName'      => 'required',
            'email'         => 'required|email',
            'phone'         => 'required',
            'is_extra_bed'  => 'sometimes|integer'
        ];
    }
}
