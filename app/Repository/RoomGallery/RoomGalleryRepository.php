<?php

namespace App\Repository\RoomGallery;

use Exception;
use App\Utility;
use App\Constant;
use App\ReturnMessage;
use App\Models\RoomAmenity;
use App\Models\RoomGallery;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Repository\RoomGallery\RoomGalleryRepositoryInterface;

class RoomGalleryRepository implements RoomGalleryRepositoryInterface
{
    public function getRoomGallerires(int $id)
    {
        $room_galleries = RoomGallery::select('id', 'room_id', 'image')
            ->orderBy('id', 'desc')
            ->where('room_id',$id)
            ->whereNull('deleted_at')
            ->get();
        return $room_galleries;
    }

    public function roomGalleryStore(array $data)
    {
        DB::connection()->enableQueryLog();
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        DB::beginTransaction();
        try {
            $uniqueName = Utility::getUploadImageName($data['file']);
            $paramObj                           = new RoomGallery();
            $paramObj->room_id                  = $data['room_id'];
            $paramObj->image                    = $uniqueName;
            $tempObj                            = Utility::addCreated($paramObj);
            $tempObj->save();

            $destination = public_path('assets/upload/' . $data['room_id'] );
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }
            Utility::cropAndResize(
                $data['file'],
                Constant::UPLOAD_WIDTH,
                Constant::UPLOAD_HEIGHT,
                $destination,
                $uniqueName
            );
            DB::commit();
            $returnObj['statusCode']    = ReturnMessage::OK;
            Utility::saveDebugLog('Room Store');
            return $returnObj;
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            DB::rollback();
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
