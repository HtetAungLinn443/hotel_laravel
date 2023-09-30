<?php

namespace App\Repository\SiteSetting;

use App\Utility;
use App\Models\HotelSetting;
use App\Repository\SiteSetting\SiteSettingRepositoryInterface;

class SiteSettingRepository implements SiteSettingRepositoryInterface
{
    public function update(array $data){
        dd($data);
        $paraObj       = HotelSetting::Find($data['id']);
        $paraObj->name = $data['name'];
        $paraObj->email = $data['email'];
        $paraObj->address = $data['address'];
        $paraObj->check_in_time = $data['check_in_time'];
        $paraObj->check_out_time = $data['check_out_time'];
        $paraObj->phone = $data['phone'];
        $paraObj->size_unit = $data['size_unit'];
        $paraObj->occupancy = $data['size_unit'];
        $paraObj->price_unit = $data['size_unit'];
        $paraObj->logo_path = $data['logo_path'];
        $tmpObj = Utility::addUpdate($paraObj);
        $tmpObj->save;


    }
}
