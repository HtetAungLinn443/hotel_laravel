<?php

namespace App\Http\Requests\Room;

use Illuminate\Foundation\Http\FormRequest;

class RoomGalleryCreateRequest extends FormRequest
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
            'file' => 'required|mimes:png,jpg,jpeg,git'
        ];
    }
    public function messages(){
        return [
            'file.required' => 'Please Upload Room Gallery Image',
            'file.mimes'    => 'Gallery Image must be png,jpg,jpeg,git'
        ];
    }
}
