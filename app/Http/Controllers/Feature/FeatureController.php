<?php

namespace App\Http\Controllers\Feature;

use Exception;
use App\Models\SpecialFeature;
use App\Http\Controllers\Controller;
use App\Http\Requests\Feature\FeatureCreateRequest;
use App\Http\Requests\Feature\FeatureUpdateRequest;
use App\Repository\Feature\FeatureRepositoryInterface;

class FeatureController extends Controller
{
    private FeatureRepositoryInterface $repository;
    public function __construct(FeatureRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function featureLists()
    {
        try {
            $features = $this->repository->getFeatures();
            return view('admin.feature.list', compact('features'));
        } catch (Exception $e) {
            $e->getMessage();
            abort(500);
        }
    }
    public function featureCreate()
    {
        try {
            return view('admin.feature.form');
        } catch (Exception $e) {
            $e->getMessage();
            abort(500);
        }
    }

    public function featureStore(FeatureCreateRequest $request)
    {
        try {
            $result = $this->repository->featureCreated((array) $request->all());
            if ($result['statusCode'] == 200) {
                return to_route('featureLists')
                    ->with(['success_msg' => 'Room Special Feature Create Successfully!']);
            } elseif ($result['statusCode'] == 404) {
                abort(404);
            } else {
                abort(500);
            }
        } catch (Exception $e) {
            $e->getMessage();
            abort(500);
        }
    }

    public function featureEdit($id)
    {
        try {
            $feature_data = SpecialFeature::find($id);
            return view('admin.feature.form', compact('feature_data'));
        } catch (Exception $e) {
            $e->getMessage();
            abort(500);
        }
    }

    public function featureUpdate(FeatureUpdateRequest $request)
    {
        try {
            $result = $this->repository->featureUpdated((array) $request->all());
            if ($result['statusCode'] == 200) {
                return to_route('featureLists')
                    ->with(['success_msg' => 'Room Special Feature Update Successfully!']);
            } elseif ($result['statusCode'] == 404) {
                abort(404);
            } else {
                abort(500);
            }
        } catch (Exception $e) {
            abort(500);
        }
    }

    public function featureDelete($id)
    {
        try {
            $delete     = $this->repository->featureDeleted((int) $id);
            return redirect()->back()->with('success_msg', 'Room Special Feature Deleted!');
        } catch (Exception $e) {
            abort(500);
        }
    }
}
