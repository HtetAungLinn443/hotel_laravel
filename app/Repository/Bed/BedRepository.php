<?php

namespace App\Repository\Bed;

use App\Models\BedType;
use Exception;
use App\Utility;
use App\ReturnMessage;
use App\Repository\Bed\BedRepositoryInterface;

class BedRepository implements BedRepositoryInterface
{
    public function getBeds()
    {
        $beds = BedType::select('id', 'name')
            ->orderBy('id', 'desc')
            ->whereNull('deleted_at')
            ->get();
        return $beds;
    }

    public function bedCreated(array $data)
    {
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paramObj           = new BedType();
            $paramObj->name     = $data['name'];
            $tempObj            = Utility::addCreated($paramObj);
            $tempObj->save();
            $returnObj['statusCode'] = ReturnMessage::OK;
            return $returnObj;
        } catch (Exception $e) {
            $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
    }

    public function bedUpdated(array $data)
    {
        $returnObj                  = array();
        $returnObj['statusCode']    = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paramObj   = BedType::find($data['id']);
            $paramObj->name = $data['name'];
            $tempObj    = Utility::addUpdate($paramObj);
            $tempObj->save();
            $returnObj['statusCode'] = ReturnMessage::OK;
            return $returnObj;
        } catch (Exception $e) {
            $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
    }

    public function bedDeleted(int $id)
    {
        $paramObj   = BedType::find($id);
        $tempObj    = Utility::addDelete($paramObj);
        $tempObj->save();
    }
}
