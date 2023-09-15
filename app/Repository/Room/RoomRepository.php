<?php

namespace App\Repository\Room;

use Exception;
use App\Utility;
use App\Constant;
use App\Models\Room;
use App\ReturnMessage;
use App\Models\RoomAmenity;
use App\Models\RoomSpecialFeature;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Repository\Room\RoomRepositoryInterface;

class RoomRepository implements RoomRepositoryInterface
{
    public function getRooms()
    {
        $rooms = Room::select(
            'rooms.id',
            'rooms.name',
            'rooms.size',
            'rooms.occupancy',
            'rooms.view_id',
            'rooms.price_per_day',
            'rooms.extra_bed_price_per_day',
            'rooms.thumbnail_img',
            'bed_types.name as bed_name',
        )
            ->leftJoin('bed_types','bed_types.id','rooms.bed_type_id')
            ->orderBy('rooms.id', 'desc')
            ->whereNull('rooms.deleted_at')
            ->whereNull('bed_types.deleted_at')
            ->get();
        return $rooms;
    }

    public function roomCreated(array $data)
    {
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        DB::beginTransaction();
        try {
            $uniqueName = Utility::getUploadImageName($data['file']);
            $paramObj                           = new Room();
            $paramObj->name                     = $data['name'];
            $paramObj->size                     = $data['room_size'];
            $paramObj->occupancy                = $data['room_occupation'];
            $paramObj->bed_type_id              = $data['room_bed'];
            $paramObj->view_id                  = $data['room_view'];
            $paramObj->description              = $data['description'];
            $paramObj->detail                   = $data['room_details'];
            $paramObj->price_per_day            = $data['room_price'];
            $paramObj->extra_bed_price_per_day  = $data['extra_bed_price'];
            $paramObj->thumbnail_img            = $uniqueName;
            $tempObj                            = Utility::addCreated($paramObj);
            $tempObj->save();

            $destination = public_path('assets/upload/' . $tempObj->id . '/thumb');
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }
            Utility::cropAndResize(
                $data['file'],
                Constant::THUMB_WIDTH,
                Constant::THUMB_HEIGHT,
                $destination,
                $uniqueName
            );
            self::roomSpecialFeatureStore($data['room_feature'], $tempObj->id);
            self::roomAmenityStore($data['room_amenity'], $tempObj->id);
            DB::commit();
            $returnObj['statusCode']    = ReturnMessage::OK;
            $returnObj['insertRoomId']  = $tempObj->id;
            return $returnObj;
        } catch (Exception $e) {
            DB::rollback();
            $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
    }
    public function roomEdit(int $id)
    {
        try{
            $roomData = Room::find($id);
            return $roomData;
        }catch(Exception $e){
            Utility::saveErrorLog($e->getMessage());
            $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
    }

    // public function viewDeleted(int $id)
    // {
    //     $paramObj   = View::find($id);
    //     $tempObj    = Utility::addDelete($paramObj);
    //     $tempObj->save();
    // }

    private static function roomAmenityStore($amenities, $roomId)
    {
        foreach ($amenities as $amenity) {
            $paramObj                   = new RoomAmenity();
            $paramObj->room_id          = $roomId;
            $paramObj->amenity_id       = $amenity;
            $tempObj                    = Utility::addCreated($paramObj);
            $tempObj->save();
        }
        return true;
    }
    private static function roomSpecialFeatureStore($features, $roomId)
    {
        foreach ($features as $feature) {
            $paramObj                       = new RoomSpecialFeature();
            $paramObj->room_id              = $roomId;
            $paramObj->special_feature_id   = $feature;
            $tempObj                        = Utility::addCreated($paramObj);
            $tempObj->save();
        }
        return true;
    }


}
