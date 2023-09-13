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
use PhpParser\Node\Expr;

class RoomGalleryRepository implements RoomGalleryRepositoryInterface
{
    public function getRoomGallerires(int $id)
    {
        try {
            $room_galleries = RoomGallery::select('id', 'room_id', 'image')
                ->orderBy('id', 'desc')
                ->where('room_id', $id)
                ->whereNull('deleted_at')
                ->get();
            return $room_galleries;
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
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

            $destination = public_path('assets/upload/' . $data['room_id']);
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

    public function roomGalleryEdit(int $id)
    {
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $returnObj['gallery_res']   = RoomGallery::find($id);
            $returnObj['statusCode']    = ReturnMessage::OK;
            return $returnObj;
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            $returnObj['statusCode']    = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
    }
    public function roomGalleryUpdate(array $data)
    {
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $uniqueName         = Utility::getUploadImageName($data['file']);
            $paramObj           = RoomGallery::find($data['gallery_id']);
            $oldImageName       = $paramObj->image;
            $paramObj->image    = $uniqueName;
            $tempObj            = Utility::addUpdate($paramObj);
            $tempObj->save();
            $destination = public_path('assets/upload/' . $data['room_id']);
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }
            $oldImagePath = public_path('assets/upload/' . $data['room_id'] . '/' . $oldImageName);
            unlink($oldImagePath);
            Utility::cropAndResize(
                $data['file'],
                Constant::UPLOAD_WIDTH,
                Constant::UPLOAD_HEIGHT,
                $destination,
                $uniqueName
            );
            $returnObj['statusCode']    = ReturnMessage::OK;
            return $returnObj;
        } catch (Exception $e) {
            $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
    }

    public function roomGalleryDelete(int $id)
    {
        $paramObj   = RoomGallery::find($id);
        $tempObj    = Utility::addDelete($paramObj);
        $tempObj->save();
    }
}
