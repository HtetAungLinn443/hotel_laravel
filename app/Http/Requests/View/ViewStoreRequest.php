<?php

namespace App\Http\Requests\View;

use Illuminate\Validation\Rule;
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
            'required',
            'min:3',
            'max:20',
            Rule::unique('views')->where(function ($query) {
                return $query
                    ->where('name', $this->name)
                    ->whereNull('deleted_at');
            })
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Room View Name is require!'
        ];
    }
}