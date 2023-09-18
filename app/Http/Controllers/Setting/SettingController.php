<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\HotelSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting =  HotelSetting::find(1);
        return view('admin.setting.form', compact('setting'));
    }
}
