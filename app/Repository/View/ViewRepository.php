<?php

namespace App\Repository\View;

use Carbon\Carbon;
use App\Models\View;
use Illuminate\Support\Facades\Auth;
use App\Repository\View\ViewRepositoryInterface;
use App\ReturnMessage;
use App\Utility;
use Exception;

class ViewRepository implements ViewRepositoryInterface
{
    public function getViews()
    {
        $views = View::select('id', 'name')
            ->orderBy('id', 'desc')
            ->whereNull('deleted_at')
            ->get();
        return $views;
    }

    public function viewCreated(array $data)
    {
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paramObj           = new View();
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

    public function viewUpdated(array $data)
    {
        $returnObj                  = array();
        $returnObj['statusCode']    = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paramObj   = View::find($data['id']);
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

    public function viewDeleted(int $id)
    {
        $paramObj   = View::find($id);
        $tempObj    = Utility::addDelete($paramObj);
        $tempObj->save();
    }
}
