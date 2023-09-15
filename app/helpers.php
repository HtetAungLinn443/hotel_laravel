<?php

use App\Models\HotelSetting;

if (!function_exists('getSiteSetting')) {
    function getSiteSetting()
    {
        $data = HotelSetting::first();
        return $data;
    }
}

if(!function_exists('getRoomNameByView')){
    function getRoomNameByView($view)
    {
        $room_name = '';
        if($view->getRoomsByView() != null){
            // dd($view->getRoomsByView);
            foreach($view->getRoomsByView as $room){
                $room_name .= $room->name ;
            }
            return rtrim($room_name, ',');
        }

    }
}
