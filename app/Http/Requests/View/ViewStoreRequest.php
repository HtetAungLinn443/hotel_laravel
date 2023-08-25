<?php

namespace App\Http\Requests\View;

use Illuminate\Foundation\Http\FormRequest;

class ViewStoreRequest extends FormRequest
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
            'name' => 'required|min:3|max:20|unique:views,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Room View Name is require!'
        ];
    }
}