<?php

namespace App\Http\Controllers\Room;

use Exception;
use App\Http\Controllers\Controller;
use App\Repository\Bed\BedRepository;
use App\Repository\View\ViewRepository;
use App\Http\Requests\Room\RoomCreateRequest;
use App\Repository\Amenity\AmenityRepository;
use App\Repository\Feature\FeatureRepository;
use App\Repository\Room\RoomRepositoryInterface;

class RoomController extends Controller
{
    private RoomRepositoryInterface $repository;
    private ViewRepositoryInterface $viewRepository;
    private BedRepositoryInterface $bedRepository;
    private AmenityRepositoryInterface $amenityRepository;

    public function __construct(
        AmenityRepositoryInterface $amenityRepository,
        BedRepositoryInterface $bedRepository,
        RoomRepositoryInterface $repository,
        ViewRepositoryInterface $viewRepository,
    ) {
        $this->amenityRepository    = $amenityRepository;
        $this->bedRepository        = $bedRepository;
        $this->repository           = $repository;
        $this->viewRepository       = $viewRepository;
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
            $view_repository = new ViewRepository();
            $view_list      = $view_repository->getViews();

            $bed_repository = new BedRepository();
            $bed_list       = $bed_repository->getBeds();

            $amenity_repository = new AmenityRepository();
            $amenity_list   = $amenity_repository->getAmenities();

            $amenity_groups = array();
            foreach($amenity_list as $row){
                $amenity_id = $row->id;
                $amenity_name = $row->name;
                $amenity_type =$row->type;
                if (!isset($amenity_groups[$amenity_type])) {
                    $amenity_groups[$amenity_type] = array();
                }
                $amenity_groups[$amenity_type][] = array('id' => $amenity_id, 'name' => $amenity_name);
            }
            $feature_repository = new FeatureRepository();
            $feature_list   = $feature_repository->getFeatures();
            return view('admin.room.form', compact(
                    'view_list',
                    'bed_list',
                    'amenity_groups',
                    'feature_list'
                )
            );
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
