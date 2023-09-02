<?php

namespace App\Http\Controllers\Amenity;

use Exception;
use App\Models\Amenity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Amenity\AmenityCreateRequest;
use App\Http\Requests\Amenity\AmenityUpdateRequest;
use App\Repository\Amenity\AmenityRepositoryInterface;

class AmenityController extends Controller
{
    private AmenityRepositoryInterface $repository;
    public function __construct(AmenityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function amenityLists()
    {
        try {
            $amenitys = $this->repository->getAmenities();
            return view('admin.amenity.list', compact('amenitys'));
        } catch (Exception $e) {

            abort(500);
        }
    }
    public function amenityCreate()
    {
        try {
            return view('admin.amenity.form');
        } catch (Exception $e) {

            abort(500);
        }
    }

    public function amenityStore(AmenityCreateRequest $request)
    {
        try {
            $result = $this->repository->amenityCreated((array) $request->all());
            if ($result['statusCode'] == 200) {
                return to_route('amenityLists')
                    ->with(['success_msg' => 'Room Amenity Create Successfully!']);
            } elseif ($result['statusCode'] == 404) {
                abort(404);
            } else {
                abort(500);
            }
        } catch (Exception $e) {

            abort(500);
        }
    }

    public function amenityEdit($id)
    {
        try {
            $amenity_data = Amenity::find($id);
            return view('admin.amenity.form', compact('amenity_data'));
        } catch (Exception $e) {

            abort(500);
        }
    }

    public function amenityUpdate(AmenityUpdateRequest $request)
    {
        try {
            $result = $this->repository->amenityUpdated((array) $request->all());
            if ($result['statusCode'] == 200) {
                return to_route('amenityLists')
                    ->with(['success_msg' => 'Room Amenity Update Successfully!']);
            } elseif ($result['statusCode'] == 404) {
                abort(404);
            } else {
                abort(500);
            }
        } catch (Exception $e) {
            abort(500);
        }
    }

    public function amenityDelete($id)
    {
        try {
            $delete     = $this->repository->amenityDeleted((int) $id);
            return redirect()->back()->with('success_msg', 'Room Amenity Deleted!');
        } catch (Exception $e) {
            abort(500);
        }
    }
}
