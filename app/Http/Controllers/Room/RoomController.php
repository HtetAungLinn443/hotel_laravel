<?php

namespace App\Http\Controllers\Room;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\Room\RoomCreateRequest;
use App\Repository\Room\RoomRepositoryInterface;

class RoomController extends Controller
{
    private RoomRepositoryInterface $repository;
    public function __construct(RoomRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function roomLists()
    {
        try {
            $rooms = $this->repository->getRooms();
            return view('admin.room.list', compact('rooms'));
        } catch (Exception $e) {
            $e->getMessage();
            abort(500);
        }
    }
    public function roomCreate()
    {
        try {
            return view('admin.room.form');
        } catch (Exception $e) {
            $e->getMessage();
            abort(500);
        }
    }

    public function roomStore(RoomCreateRequest $request)
    {
        try {
            $result = $this->repository->roomCreated((array) $request->all());
            if ($result['statusCode'] == 200) {
                return to_route('roomLists')
                    ->with(['success_msg' => 'Room Create Successfully!']);
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

    // public function featureEdit($id)
    // {
    //     try {
    //         $feature_data = SpecialFeature::find($id);
    //         return view('admin.feature.form', compact('feature_data'));
    //     } catch (Exception $e) {
    //         $e->getMessage();
    //         abort(500);
    //     }
    // }

    // public function featureUpdate(FeatureUpdateRequest $request)
    // {
    //     try {
    //         $result = $this->repository->featureUpdated((array) $request->all());
    //         if ($result['statusCode'] == 200) {
    //             return to_route('featureLists')
    //                 ->with(['success_msg' => 'Room Special Feature Update Successfully!']);
    //         } elseif ($result['statusCode'] == 404) {
    //             abort(404);
    //         } else {
    //             abort(500);
    //         }
    //     } catch (Exception $e) {
    //         abort(500);
    //     }
    // }

    // public function featureDelete($id)
    // {
    //     try {
    //         $delete     = $this->repository->featureDeleted((int) $id);
    //         return redirect()->back()->with('success_msg', 'Room Special Feature Deleted!');
    //     } catch (Exception $e) {
    //         abort(500);
    //     }
    // }
}
