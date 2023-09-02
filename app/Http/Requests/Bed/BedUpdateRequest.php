<?php

namespace App\Http\Requests\Bed;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BedUpdateRequest extends FormRequest
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
                'min:5',
                'max:20',
                Rule::unique('bed_types')->where(function ($query) {
                    return $query
                        ->where('name', $this->name)
                        ->whereNull('deleted_at');
                })->ignore($this->id),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Room bed Name is require.',
            'name.min' => 'Room bed name must be at least 5 characters.',
            'name.max' => 'Room bed name must not be greater than 20 characters.',
            'name.unique' => 'This room bed name has already been taken.'
        ];
    }
}
