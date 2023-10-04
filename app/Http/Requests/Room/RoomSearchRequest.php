<?php

namespace App\Http\Requests\Room;

use App\Rules\DateFormat;
use Illuminate\Foundation\Http\FormRequest;

class RoomSearchRequest extends FormRequest
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
            'check_in'  => ['required', new DateFormat],
            'check_out' => ['required', new DateFormat],
        ];
    }
}
