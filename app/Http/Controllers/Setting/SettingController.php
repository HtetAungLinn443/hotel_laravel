<?php

namespace App\Http\Controllers\Setting;

use PDO;
use Exception;
use App\Utility;
use App\ReturnMessage;
use App\Models\HotelSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\SettingUpdateRequest;
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

    public function update(SettingUpdateRequest $request){
        try {
            $settingUpdate  = $this->siteSettingRepository->update((array) $request->all());
            Utility::saveDebugLog("Setting Update::");
            if($settingUpdate['statusCode'] == ReturnMessage::OK){
                return back()->with(['success_msg' => 'Hotel Setting Create Successfully...']);
            }else{
                return back()->with(['error_msg' => 'Hotel Setting Create Fail!']);
            }
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
}
