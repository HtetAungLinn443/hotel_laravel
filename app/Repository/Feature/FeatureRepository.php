<?php

namespace App\Repository\Feature;

use App\Models\SpecialFeature;
use Exception;
use App\Utility;
use App\ReturnMessage;
use App\Repository\Feature\FeatureRepositoryInterface;

class FeatureRepository implements FeatureRepositoryInterface
{
    public function getFeatures()
    {
        $features = SpecialFeature::select('id', 'name')
            ->orderBy('id', 'desc')
            ->whereNull('deleted_at')
            ->get();
        return $features;
    }

    public function featureCreated(array $data)
    {
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paramObj           = new SpecialFeature();
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

    public function featureUpdated(array $data)
    {
        $returnObj                  = array();
        $returnObj['statusCode']    = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paramObj   = SpecialFeature::find($data['id']);
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

    public function featureDeleted(int $id)
    {
        $paramObj   = SpecialFeature::find($id);
        $tempObj    = Utility::addDelete($paramObj);
        $tempObj->save();
    }
}
