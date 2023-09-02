<?php

namespace App\Http\Requests\Amenity;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AmenityCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:40',
                Rule::unique('amenities')->where(function ($query) {
                    return $query
                        ->where('name', $this->name)
                        ->whereNull('deleted_at');
                }),
            ],
            'type' => [
                'required',
            ]
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Room bed Name is require.',
            'name.min' => 'Room bed name must be at least three characters.',
            'name.max' => 'Room bed name must not be greater than 20 characters.',
            'name.unique' => 'This Room bed name has already been taken.',
            'type.required' => 'Please choose room amenity type.',
        ];
    }
}
