<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Utility
{
    public static function addCreated($paramObj)
    {
        $today_date = date('Y-m-d H:i:s');
        $user_id = Auth::guard()->user()->id;
        $paramObj->created_at = $today_date;
        $paramObj->updated_at = $today_date;
        if (Auth::guard()->check()) {
            $paramObj->created_by = $user_id;
            $paramObj->updated_by = $user_id;
        }
        return $paramObj;
    }
    public static function addUpdate($paramObj)
    {
        $paramObj->updated_at = date('Y-m-d H:i:s');
        if (Auth::guard()->check()) {
            $paramObj->updated_by = Auth::guard()->user()->id;
        }
        return $paramObj;
    }

    public static function addDelete($paramObj)
    {
        $paramObj->deleted_at = date('Y-m-d H:i:s');
        if (Auth::guard()->check()) {
            $paramObj->deleted_by = Auth::guard()->user()->id;
        }
        return $paramObj;
    }

    public static function saveDebugLog($logMessage)
    {
        $logs = DB::getQueryLog();
        $query = "";
        foreach ($logs as $logItem) {
            $sql = $logItem["query"];
            $binds = $logItem["bindings"];
            $result = "";
            $sqlChunks = explode('?', $sql);
            foreach ($sqlChunks as $key => $sqlChunk) {
                if (isset($binds[$key])) {
                    $result .= $sqlChunk . '"' . $binds[$key] . '"';
                }
            }
            $query .= $result . "\n" . "__________________________________________" . "\n";
        }
        $log = $logMessage . "\n" . $query;
        Log::debug($log);
    }
    public static function saveErrorLog($logMessage)
    {
        $log = $logMessage;
        Log::error($log);
    }
}