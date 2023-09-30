<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
            'id'                => 'required|integer',
            'name'              => 'required',
            'email'             => 'required|email',
            'address'           => 'required|min:3',
            'check_in_time'     => 'required',
            'check_out_time'    => 'required',
            'phone'             => 'required',
            'size_unit'         => 'required',
            'occupancy'         => 'required',
            'price_unit'        => 'required',
            'file'              => 'sometimes|mimes:png,jpg,jpeg,gif'
        ];
    }
}
