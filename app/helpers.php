<?php
use App\Models\HotelSetting;

function hotelSetting()
{
    $data = HotelSetting::first();

    return $data;
}