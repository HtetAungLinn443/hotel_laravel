<?php

namespace App\Repository\Room;

use App\Models\Room;
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

    // public function viewCreated(array $data)
    // {
    //     $returnObj = array();
    //     $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
    //     try {
    //         $paramObj           = new View();
    //         $paramObj->name     = $data['name'];
    //         $tempObj            = Utility::addCreated($paramObj);
    //         $tempObj->save();
    //         $returnObj['statusCode'] = ReturnMessage::OK;
    //         return $returnObj;
    //     } catch (Exception $e) {
    //         $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
    //         return $returnObj;
    //     }
    // }

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
