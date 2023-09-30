<?php

namespace App\Http\Controllers\Setting;

use Exception;
use App\Utility;
use App\Models\HotelSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repository\SiteSetting\SiteSettingRepositoryInterface;

class SettingController extends Controller
{
    private SiteSettingRepositoryInterface $siteSettingRepository;
    public function __construct(
        SiteSettingRepositoryInterface $siteSettingRepository,
    ) {
        DB::connection()->enableQueryLog();
        $this->siteSettingRepository    = $siteSettingRepository;
    }
    public function index()
    {
        $setting =  HotelSetting::find(1);
        return view('admin.setting.form', compact('setting'));
    }
    // public function eidt($id){
    //     try {
    //         $settingEdit  = $this->siteSettingRepository->edit((int) $id);
    //         Utility::saveDebugLog("Room Edit::");
    //         return view('admin.setting.form', compact('setting'));
    //     } catch (Exception $e) {
    //         Utility::saveErrorLog($e->getMessage());
    //         abort(500);
    //     }
    // }
    public function update(Request $request){
        try {
            $settingUpdate  = $this->siteSettingRepository->update((array) $request->all());
            Utility::saveDebugLog("Room Update::");
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
}
