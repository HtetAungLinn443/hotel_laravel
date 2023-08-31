<?php

namespace App\Http\Requests\View;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ViewUpdateRequest extends FormRequest
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


    public function rules()
    {

        return [
            'name' => [
                'required',
                'min:3',
                'max:20',
                Rule::unique('views')->where(function ($query) {
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
            'name.required' => 'Room View Name is require.',
            'name.min' => 'Room view name must be at least 3 characters.',
            'name.max' => 'Room view name must not be greater than 20 characters.',
            'name.unique' => 'This Room name has already been taken.'
        ];
    }
}