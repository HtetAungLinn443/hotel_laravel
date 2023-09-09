<?php

namespace App\Repository\Room;

use Exception;
use App\Utility;
use App\Models\Room;
use App\Models\View;
use App\ReturnMessage;
use App\Models\Amenity;
use App\Models\BedType;
use App\Models\SpecialFeature;
use App\Repository\Room\RoomRepositoryInterface;


class RoomRepository implements RoomRepositoryInterface
{
    public function getRooms()
    {
        $rooms = Room::select(
            'id',
            'name',
            'size',
            'occupancy',
            'price_per_day',
            'extra_bed_price_per_day',
            'thumbnail_img',
        )
            ->orderBy('id', 'desc')
            ->whereNull('deleted_at')
            ->get();
        return $rooms;
    }

    public function roomCreated(array $data)
    {
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paramObj                           = new View();
            $paramObj->name                     = $data['name'];
            $paramObj->size                     = $data['room_size'];
            $paramObj->occupancy                = $data['room_occupation'];
            $paramObj->bed_type_id              = $data['room_bed'];
            $paramObj->view_id                  = $data['room_view'];
            $paramObj->description              = $data['description'];
            $paramObj->detail                   = $data['room_details'];
            $paramObj->price_per_day            = $data['room_price'];
            $paramObj->extra_bed_price_per_day  = $data['extra_bed_price'];
            // $paramObj->thumbnail_img            = $data['thumbnail_img'];
            
            $tempObj                = Utility::addCreated($paramObj);
            $tempObj->save();
            $returnObj['statusCode'] = ReturnMessage::OK;
            return $returnObj;
        } catch (Exception $e) {
            $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
    }

    // public function viewUpdated(array $data)
    // {
    //     $returnObj                  = array();
    //     $returnObj['statusCode']    = ReturnMessage::INTERNAL_SERVER_ERROR;
    //     try {
    //         $paramObj   = View::find($data['id']);
    //         $paramObj->name = $data['name'];
    //         $tempObj    = Utility::addUpdate($paramObj);
    //         $tempObj->save();
    //         $returnObj['statusCode'] = ReturnMessage::OK;
    //         return $returnObj;
    //     } catch (Exception $e) {
    //         $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
    //         return $returnObj;
    //     }
    // }

    // public function viewDeleted(int $id)
    // {
    //     $paramObj   = View::find($id);
    //     $tempObj    = Utility::addDelete($paramObj);
    //     $tempObj->save();
    // }
}
