<?php

use App\Models\HotelSetting;

if (!function_exists('getSiteSetting')) {
    function getSiteSetting()
    {
        $data = HotelSetting::first();
        return $data;
    }
}
