<?php

namespace App\Repository\Room;

use Exception;
use App\Utility;
use App\Constant;
use App\Models\Room;
use App\ReturnMessage;
use App\Models\Booking;
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
            ->leftJoin('bed_types', 'bed_types.id', 'rooms.bed_type_id')
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
            $returnObj['insertRoomId'] = $tempObj->id;
            return $returnObj;
        } catch (Exception $e) {
            DB::rollback();
            $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
    }
    public function roomEdit(int $id)
    {
        try {
            $roomData = Room::find($id);
            return $roomData;
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
    }

    public function roomUpdated(array $data)
    {
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        DB::beginTransaction();
        try {
            $id = $data['id'];
            $paramObj                           = Room::find($id);
            $paramObj->name                     = $data['name'];
            $paramObj->size                     = $data['room_size'];
            $paramObj->occupancy                = $data['room_occupation'];
            $paramObj->bed_type_id              = $data['room_bed'];
            $paramObj->view_id                  = $data['room_view'];
            $paramObj->description              = $data['description'];
            $paramObj->detail                   = $data['room_details'];
            $paramObj->price_per_day            = $data['room_price'];
            $paramObj->extra_bed_price_per_day  = $data['extra_bed_price'];
            if (array_key_exists('file', $data)) {
                $uniqueName = Utility::getUploadImageName($data['file']);
                $paramObj->thumbnail_img            = $uniqueName;
            }
            $tempObj                            = Utility::addUpdate($paramObj);
            $tempObj->save();
            self::deleteRoomAmenity($id);
            self::deleteRoomSpecialFeature($id);
            self::roomAmenityStore($data['room_amenity'], $id);
            self::roomSpecialFeatureStore($data['room_feature'], $id);
            if (array_key_exists('file', $data)) {
                $destination = public_path('assets/upload/' . $id . '/thumb');
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
            }
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
    public function roomDeleted(int $id)
    {
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paramObj   = Room::find($id);
            $tempObj    = Utility::addDelete($paramObj);
            $tempObj->save();
            $returnObj['statusCode'] = ReturnMessage::OK;
            return $returnObj;
        } catch (Exception $e) {
            $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
    }

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

    // room feature delete
    private static function deleteRoomSpecialFeature($id)
    {
        RoomSpecialFeature::where('room_id', $id)->delete();
        return true;
    }
    private static function deleteRoomAmenity($id)
    {
        RoomAmenity::where('room_id', $id)->delete();
        return true;
    }

    public function getRandomRoom()
    {
        try {
            $rooms = Room::select('id', 'name', 'price_per_day', 'thumbnail_img')
                ->whereNull('deleted_at')
                ->inRandomOrder()
                ->Limit(6)
                ->get();
            return $rooms;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function getRoomAmenity(int $id)
    {
        try {
            $data = RoomAmenity::select('amenities.name', 'amenities.type')
                ->where('room_amenities.room_id', $id)
                ->leftJoin('amenities', 'amenities.id', 'room_amenities.amenity_id')
                ->whereNull('room_amenities.deleted_at')
                ->whereNull('amenities.deleted_at')
                ->orderBy('amenities.type', 'asc')
                ->orderBy('room_amenities.id', 'asc')
                ->get();
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getRoomFeature(int $id)
    {
        try {
            $data = RoomSpecialFeature::select('special_features.name')
                ->where('room_special_features.room_id', $id)
                ->leftJoin('special_features', 'special_features.id', 'room_special_features.special_feature_id')
                ->whereNull('room_special_features.deleted_at')
                ->whereNull('special_features.deleted_at')
                ->orderBy('room_special_features.id')
                ->get();
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function search(array $data)
    {
        $remove_ids = [];
        $sql1 = Booking::select("room_id")
            ->where('check_in_date', '<=', $data['check_in'])
            ->where('check_out_date', '>=', $data['check_in'])
            ->where('status', '=', Constant::BOOKING_AVAILABLE)
            ->whereNull('deleted_at')
            ->get();
        foreach ($sql1 as $sql) {
            array_push($remove_ids, $sql->room_id);
        }
        $sql2 = Booking::select("room_id")
            ->where('check_in_date', '>=', $data['check_in'])
            ->where('check_in_date', '<=', $data['check_out'])
            ->where('status', '=', Constant::BOOKING_AVAILABLE)
            ->whereNull('deleted_at')
            ->get();
        foreach ($sql2 as $sql) {
            array_push($remove_ids, $sql->room_id);
        }
        $rooms = Room::select(
            "id",
            "name",
            "price_per_day",
            "thumbnail_img"
        )
            ->whereNotIn('id', $remove_ids)
            ->whereNull('deleted_at')
            ->orderByDesc('id')
            ->get();
        return $rooms;
    }
}
