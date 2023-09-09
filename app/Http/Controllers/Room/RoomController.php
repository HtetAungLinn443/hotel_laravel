<?php

namespace App\Http\Controllers\Room;

use Exception;
use App\Models\SpecialFeature;
use App\Http\Controllers\Controller;
use App\Repository\Bed\BedRepository;
use App\Repository\View\ViewRepository;
use App\Http\Requests\Room\RoomCreateRequest;
use App\Repository\Amenity\AmenityRepository;
use App\Repository\Feature\FeatureRepository;
use App\Repository\Bed\BedRepositoryInterface;
use App\Repository\Room\RoomRepositoryInterface;
use App\Repository\View\ViewRepositoryInterface;
use App\Repository\Amenity\AmenityRepositoryInterface;
use App\Repository\Feature\FeatureRepositoryInterface;

class RoomController extends Controller
{
    private AmenityRepositoryInterface $amenityRepository;
    private BedRepositoryInterface $bedRepository;
    private FeatureRepositoryInterface $featureRepository;
    private RoomRepositoryInterface $repository;
    private ViewRepositoryInterface $viewRepository;

    public function __construct(
        AmenityRepositoryInterface $amenityRepository,
        BedRepositoryInterface $bedRepository,
        FeatureRepositoryInterface $featureRepository,
        RoomRepositoryInterface $repository,
        ViewRepositoryInterface $viewRepository,

    ) {
        $this->amenityRepository    = $amenityRepository;
        $this->bedRepository        = $bedRepository;
        $this->featureRepository    = $featureRepository;
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
            $amenity_list   = $this->amenityRepository->getAmenities();
            $bed_list       = $this->bedRepository->getBeds();
            $feature_list   = $this->featureRepository->getFeatures();
            $view_list      = $this->viewRepository->getViews();

            $amenity_groups = array();
            foreach ($amenity_list as $row) {
                $amenity_id = $row->id;
                $amenity_name = $row->name;
                $amenity_type = $row->type;
                if (!isset($amenity_groups[$amenity_type])) {
                    $amenity_groups[$amenity_type] = array();
                }
                $amenity_groups[$amenity_type][] = array('id' => $amenity_id, 'name' => $amenity_name);
            }
            return view(
                'admin.room.form',
                compact(
                    'amenity_groups',
                    'bed_list',
                    'feature_list',
                    'view_list',
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
