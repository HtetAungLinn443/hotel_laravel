<?php

namespace App\Http\Requests\Room;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RoomCreateRequest extends FormRequest
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
            'name'                  => [
                'required',
                Rule::unique('rooms')->where(function ($query) {
                    return $query->where('name', $this->name)
                        ->whereNull('deleted_at');
                }),
            ],
            'room_size'             => ['required', 'integer'],
            'room_occupation'       => ['required', 'integer'],
            'room_bed'              => ['required', 'integer'],
            'room_view'             => ['required', 'integer'],
            'description'           => ['required'],
            'room_details'          => ['required'],
            'room_price'            => ['required', 'integer'],
            'extra_bed_price'       => ['required', 'integer'],
            'room_amenity'          => ['required'],
            'room_feature'          => ['required'],
            'file'                  => 'required|mimes:png,jpg,jpeg,gif|file'
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'You have to fill room name.',
            'name.unique'               => 'Room name is already exit.',
            'room_size.required'        => 'You have to fill room size.',
            'room_size.integer'         => 'Room size must be number.',
            'room_occupation.required'  => 'You have to fill room occupation.',
            'room_occupation.integer'   => 'Room occupation must be number.',
            'room_bed.required'         => 'You have to choose room bed.',
            'room_bed.integer'          => 'Room bed must be number.',
            'room_view.required'        => 'You have to choose room view.',
            'room_view.integer'         => 'Room view must be number.',
            'description.required'      => 'You have to fill room description.',
            'room_details.required'     => 'You have to fill room detail.',
            'room_price.required'       => 'You have to fill room price.',
            'room_price.integer'        => 'Room price must be number.',
            'extra_bed_price.required'  => 'You have to fill room extra bed price.',
            'extra_bed_price.integer'   => 'Room extra bed price must be number.',
            'room_amenity'              => 'You have to choose room amenity.',
            'room_feature'              => 'You have to choose room special feature.',
            'file.required'             => 'You have to upload thumbnail image.',
            'file.mimes'                => 'Thumbnail image only can upload png, jpg, jpeg, gif, web.',
            'file.file'                 => 'Thumbnail image only can upload file type.',
        ];
    }
}
