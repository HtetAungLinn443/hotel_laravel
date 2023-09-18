<?php

namespace App\Http\Controllers\Amenity;

use Exception;
use App\Utility;
use App\Models\Amenity;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Amenity\AmenityCreateRequest;
use App\Http\Requests\Amenity\AmenityUpdateRequest;
use App\Repository\Amenity\AmenityRepositoryInterface;

class AmenityController extends Controller
{
    private AmenityRepositoryInterface $repository;
    public function __construct(AmenityRepositoryInterface $repository)
    {
        DB::connection()->enableQueryLog();
        $this->repository = $repository;
    }

    public function amenityLists()
    {
        try {
            $amenitys = $this->repository->getAmenities();
            Utility::saveDebugLog("Amenity Listing::");
            return view('admin.amenity.list', compact('amenitys'));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
    public function amenityCreate()
    {
        try {
            Utility::saveDebugLog("Amenity Create::");
            return view('admin.amenity.form');
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function amenityStore(AmenityCreateRequest $request)
    {
        try {
            $result = $this->repository->amenityCreated((array) $request->all());
            Utility::saveDebugLog("Amenity Store::");
            if ($result['statusCode'] == 200) {
                return to_route('amenityLists')
                    ->with(['success_msg' => 'Room Amenity Create Successfully!']);
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

    public function amenityEdit($id)
    {
        try {
            $amenity_data = Amenity::find($id);
            Utility::saveDebugLog("Amenity Edit::");
            return view('admin.amenity.form', compact('amenity_data'));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function amenityUpdate(AmenityUpdateRequest $request)
    {
        try {
            $result = $this->repository->amenityUpdated((array) $request->all());
            Utility::saveDebugLog("Amenity Update::");
            if ($result['statusCode'] == 200) {
                return to_route('amenityLists')
                    ->with(['success_msg' => 'Room Amenity Update Successfully!']);
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

    public function amenityDelete($id)
    {
        try {
            $delete     = $this->repository->amenityDeleted((int) $id);
            Utility::saveDebugLog("Amenity Delete::");
            return redirect()->back()->with('success_msg', 'Room Amenity Deleted!');
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
}
