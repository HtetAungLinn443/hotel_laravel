<?php
namespace App;

use Illuminate\Support\Facades\Auth;

class Utility
{
    public static function addCreated($paramObj)
    {
        $today_date = date('Y-m-d H:i:s');
        $paramObj->created_at = $today_date;
        $paramObj->updated_at = $today_date;
        if (Auth::guard()->check()) {
            $paramObj->created_by = Auth::guard()->user()->id;
            $paramObj->updated_by = Auth::guard()->user()->id;
        }
        return $paramObj;
    }
    public static function addUpdate($paramObj)
    {
        $today_date = date('Y-m-d H:i:s');
        $paramObj->updated_at = $today_date;
        if (Auth::guard()->check()) {
            $paramObj->updated_by = Auth::guard()->user()->id;
        }
        return $paramObj;
    }
}