<?php

namespace App\Repository\SiteSetting;

use Exception;
use App\Utility;
use App\ReturnMessage;
use App\Models\HotelSetting;
use Intervention\Image\Facades\Image;
use App\Repository\SiteSetting\SiteSettingRepositoryInterface;

class SiteSettingRepository implements SiteSettingRepositoryInterface
{
    public function update(array $data){
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try{
            $paramObj                   = HotelSetting::find($data['id']);
            $paramObj->name             = $data['name'];
            $paramObj->email            = $data['email'];
            $paramObj->address          = $data['address'];
            $paramObj->check_in_time    = $data['check_in_time'];
            $paramObj->check_out_time   = $data['check_out_time'];
            $paramObj->phone            = $data['phone'];
            $paramObj->size_unit        = $data['size_unit'];
            $paramObj->occupancy        = $data['occupancy'];
            $paramObj->price_unit       = $data['price_unit'];
            if (array_key_exists('file', $data)) {
                $uniqueName = Utility::getUploadImageName($data['file']);
                $paramObj->logo_path    = $uniqueName;
            }
            $tmpObj = Utility::addUpdate($paramObj);
            $tmpObj->save();
            if (array_key_exists('file', $data)) {
                $destination = public_path('assets/images');
                if (!file_exists($destination)) {
                    mkdir($destination, 0777, true);
                }
                $resizeImage = Image::make($data['file'])
                                ->resize(100, 100)
                                ->encode();
                $resizeImage->save($destination . '/' . $uniqueName);
            }
            $returnObj['statusCode'] = ReturnMessage::OK;
            return $returnObj;
        } catch(Exception $e) {
            $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }

    }
}
