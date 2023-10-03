<?php

namespace App\Http\Requests\Amenity;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AmenityUpdateRequest extends FormRequest
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
            'name' => [
                'required',
                'min:3',
                'max:40',
                Rule::unique('amenities')->where(function ($query) {
                    return $query
                        ->where('name', $this->name)
                        ->where('type', $this->type)
                        ->whereNull('deleted_at');
                })->ignore($this->id),
            ],
            'type' => [
                'required',
            ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Room amenity name is require.',
            'name.min' => 'Room amenity name must be at least three characters.',
            'name.max' => 'Room amenity name must not be greater than 40 characters.',
            'name.unique' => 'This room amenity name has already been taken.',
            'type.required' => 'Please choose room amenity type.',
        ];
    }
}
