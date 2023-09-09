<?php

namespace App\Http\Requests\Room;

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
                                        Rule::unique('rooms')->where(function($query){
                                            return $query->where('name',$this->name)
                                                        ->whereNull('deleted_at');
                                        }),
                                        ],
            'room_size'             => ['required','integer'],
            'room_occupation'       => ['required','integer'],
            'room_bed'              => ['required','integer'],
            'room_view'             => ['required','integer'],
            'description'           => ['required'],
            'room_details'          => ['required'],
            'room_price'            => ['required'],
            'extra_bed_price'       => ['required'],
            'room_amenity'          => ['required'],
            'room_feature'          => ['required']
        ];
    }

    public function messages(){
        return[
            'name.required' => 'You have to fill room name',
            'name.unique'   => 'Room name is already exit',
            'room_size.required' => 'You have to fill room size',
            'room_size.integer' => 'Room size must be number',
            'room_occupation.required' => 'You have to fill room occupation',
            'room_occupation.integer' => 'Room occupation must be number',

        ];
    }
}
