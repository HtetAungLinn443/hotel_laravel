<?php

namespace App\Repository\Amenity;

use Exception;
use App\Utility;
use App\ReturnMessage;
use App\Models\Amenity;
use App\Models\RoomAmenity;
use App\Repository\Amenity\AmenityRepositoryInterface;

class AmenityRepository implements AmenityRepositoryInterface
{
    public function getAmenities()
    {
        $amenities = Amenity::select('id', 'name', 'type')
            ->orderBy('id', 'asc')
            ->whereNull('deleted_at')
            ->get();
        return $amenities;
    }

    public function amenityCreated(array $data)
    {
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paramObj = new Amenity();
            $paramObj->name = $data['name'];
            $paramObj->type = $data['type'];
            $tempObj = Utility::addCreated($paramObj);
            $tempObj->save();
            $returnObj['statusCode'] = ReturnMessage::OK;
            return $returnObj;
        } catch (Exception $e) {
            $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
    }

    public function amenityUpdated(array $data)
    {
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paramObj = Amenity::find($data['id']);
            $paramObj->name = $data['name'];
            $paramObj->type = $data['type'];
            $tempObj = Utility::addUpdate($paramObj);
            $tempObj->save();
            $returnObj['statusCode'] = ReturnMessage::OK;
            return $returnObj;
        } catch (Exception $e) {
            $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
    }

    public function amenityDeleted(int $id)
    {
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paramObj = Amenity::find($id);
            $tempObj = Utility::addDelete($paramObj);
            $tempObj->save();
            $returnObj['statusCode'] = ReturnMessage::OK;
            return $returnObj;
        } catch (Exception $e) {
            $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
    }
    public function getAmenityByRoomId(int $id)
    {
        try {
            $amenityData = [];
            $data = RoomAmenity::select('amenity_id')
                ->where('room_id', $id)
                ->whereNull('deleted_at')
                ->get();
            foreach ($data as $amenity) {
                array_push($amenityData, $amenity->amenity_id);
            }
            return $amenityData;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}
