<?php

namespace App\Http\Controllers\Feature;

use Exception;
use App\Utility;
use App\Models\SpecialFeature;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Feature\FeatureCreateRequest;
use App\Http\Requests\Feature\FeatureUpdateRequest;
use App\Repository\Feature\FeatureRepositoryInterface;

class FeatureController extends Controller
{
    private FeatureRepositoryInterface $repository;
    public function __construct(FeatureRepositoryInterface $repository)
    {
        DB::connection()->enableQueryLog();
        $this->repository = $repository;
    }

    public function featureLists()
    {
        try {
            $features = $this->repository->getFeatures();
            Utility::saveDebugLog("Feature Listing::");
            return view('admin.feature.list', compact('features'));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
    public function featureCreate()
    {
        try {
            Utility::saveDebugLog("Feature Create::");
            return view('admin.feature.form');
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function featureStore(FeatureCreateRequest $request)
    {
        try {
            $result = $this->repository->featureCreated((array) $request->all());
            Utility::saveDebugLog("Feature Store::");
            if ($result['statusCode'] == 200) {
                return to_route('featureLists')
                    ->with(['success_msg' => 'Room Special Feature Create Successfully!']);
            } elseif ($result['statusCode'] == 404) {
                abort(404);
            } else {
                abort(500);
            }
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function featureEdit($id)
    {
        try {
            $feature_data = SpecialFeature::find($id);
            Utility::saveDebugLog("Feature Edit::");
            return view('admin.feature.form', compact('feature_data'));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function featureUpdate(FeatureUpdateRequest $request)
    {
        try {
            $result = $this->repository->featureUpdated((array) $request->all());
            Utility::saveDebugLog("Feature Update::");
            if ($result['statusCode'] == 200) {
                return to_route('featureLists')
                    ->with(['success_msg' => 'Room Special Feature Update Successfully!']);
            } elseif ($result['statusCode'] == 404) {
                abort(404);
            } else {
                abort(500);
            }
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function featureDelete($id)
    {
        try {
            $delete     = $this->repository->featureDeleted((int) $id);
            Utility::saveDebugLog("Feature Delete::");
            return redirect()->back()->with('success_msg', 'Room Special Feature Deleted!');
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
}
