<?php

namespace App\Http\Requests\View;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ViewCreateRequest extends FormRequest
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
                Rule::unique('views')->where(function ($query) {
                    return $query
                        ->where('name', $this->name)
                        ->whereNull('deleted_at');
                }),
            ]
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Room view Name is require.',
            'name.min' => 'Room view name must be at least 5 characters.',
            'name.max' => 'Room view name must not be greater than 20 characters.',
            'name.unique' => 'This Room view name has already been taken.'
        ];
    }
}
