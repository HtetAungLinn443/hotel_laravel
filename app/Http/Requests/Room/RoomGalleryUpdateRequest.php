<?php

namespace App\Http\Requests\Room;

use Illuminate\Foundation\Http\FormRequest;

class RoomGalleryUpdateRequest extends FormRequest
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
            'room_id'   => 'required|integer',
            'file'      => 'sometimes|mimes:png,jpg,jpeg,gif'
        ];
    }
    public function messages()
    {
        return [
            'room_id.required'  => 'Room Id is Required.',
            'room_id.integer'   => 'Room Id must be Number.',
            'file.mimes'        => 'Gallery Image must be png,jpg,jpeg,gif.'
        ];
    }
}
