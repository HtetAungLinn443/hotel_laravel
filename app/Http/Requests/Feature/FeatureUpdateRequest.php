<?php

namespace App\Http\Requests\Feature;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FeatureUpdateRequest extends FormRequest
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
                'max:100',
                Rule::unique('special_features')->where(function ($query) {
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
            'name.required' => 'Room special feature name is require.',
            'name.min' => 'Room special feature name must be at least 5 characters.',
            'name.max' => 'Room special feature name must not be greater than 100 characters.',
            'name.unique' => 'This room special feature name has already been taken.'
        ];
    }
}
