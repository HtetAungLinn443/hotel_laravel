<?php

namespace App\Http\Controllers\Room;

use Exception;
use App\Utility;
use App\Models\SpecialFeature;
use Illuminate\Support\Facades\DB;
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
use App\Repository\RoomGallery\RoomGalleryRepositoryInterface;
use App\Http\Requests\Room\RoomGalleryCreateRequest;
use App\Http\Requests\Room\RoomGalleryUpdateRequest;
use App\Http\Requests\Room\RoomUpdateRequest;

class RoomController extends Controller
{
    private AmenityRepositoryInterface $amenityRepository;
    private BedRepositoryInterface $bedRepository;
    private FeatureRepositoryInterface $featureRepository;
    private RoomRepositoryInterface $repository;
    private ViewRepositoryInterface $viewRepository;
    private RoomGalleryRepositoryInterface $galleryRepository;

    public function __construct(
        AmenityRepositoryInterface $amenityRepository,
        BedRepositoryInterface $bedRepository,
        FeatureRepositoryInterface $featureRepository,
        RoomRepositoryInterface $repository,
        ViewRepositoryInterface $viewRepository,
        RoomGalleryRepositoryInterface $galleryRepository
    ) {
        DB::connection()->enableQueryLog();
        $this->amenityRepository    = $amenityRepository;
        $this->bedRepository        = $bedRepository;
        $this->featureRepository    = $featureRepository;
        $this->repository           = $repository;
        $this->viewRepository       = $viewRepository;
        $this->galleryRepository    = $galleryRepository;
    }

    public function roomLists()
    {
        try {
            $rooms = $this->repository->getRooms();
            Utility::saveDebugLog("Room Listing::");
            return view('admin.room.list', compact('rooms'));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
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
            Utility::saveDebugLog("Room Create::");
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
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function roomStore(RoomCreateRequest $request)
    {
        try {
            $result = $this->repository->roomCreated((array) $request->all());
            Utility::saveDebugLog('Room Store::');
            if ($result['statusCode'] == 200) {
                $insertRoomId = $result['insertRoomId'];
                return to_route('roomGalleryIndex', $insertRoomId)
                    ->with(['success_msg' => 'Room Create Successfully!']);
            } else {
                return back()->withErrors(['error_msg' => 'Room Create Fail!']);
            }
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function roomEdit($id)
    {
        try {
            $amenity_list   = $this->amenityRepository->getAmenities();
            $bed_list       = $this->bedRepository->getBeds();
            $feature_list   = $this->featureRepository->getFeatures();
            $view_list      = $this->viewRepository->getViews();
            $amenity_by_room_id = $this->amenityRepository->getAmenityByRoomId((int) $id);
            $feature_by_room_id = $this->featureRepository->getFeatureByRoomId((int) $id);
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
            $room_data = $this->repository->roomEdit((int) $id);
            Utility::saveDebugLog('Room Edit::');
            return view('admin.room.form', compact(
                'room_data',
                'amenity_groups',
                'bed_list',
                'feature_list',
                'view_list',
                'amenity_by_room_id',
                'feature_by_room_id'
            ));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function roomUpdate(RoomUpdateRequest $request)
    {
        try {
            $result = $this->repository->roomUpdated((array) $request->all());
            Utility::saveDebugLog('Room Update::');
            if ($result['statusCode'] == 200) {
                return to_route('roomLists')
                    ->with(['success_msg' => 'Room Create Successfully!']);
            } else {
                return back()->withErrors(['error_msg' => 'Room Create Fail!']);
            }
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function roomDetail($id)
    {
        try {
            $room_data          = $this->repository->roomEdit((int) $id);
            $amenity_by_room_id = $this->amenityRepository->getAmenityByRoomId((int) $id);
            $feature_by_room_id = $this->featureRepository->getFeatureByRoomId((int) $id);
            $room_galleries     = $this->galleryRepository->getRoomGallerires((int) $id);
            Utility::saveDebugLog('Room Details::');
            return view('admin.room.detail', compact(
                'room_data',
                'amenity_by_room_id',
                'feature_by_room_id',
                'room_galleries'
            ));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function roomDelete($id)
    {
        try {
            $result = $this->repository->roomDeleted((int) $id);
            Utility::saveDebugLog('Room Delete::');
            if ($result == 200) {
                return back()->with(['success_msg' => 'Room Delete Successfully.']);
            } else {
                return back()->withErrors(['error_msg' => 'Room Delete Fail!']);
            }
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
    public function roomGalleryIndex($id)
    {
        try {
            $room_galleries = $this->galleryRepository->getRoomGallerires((int) $id);
            Utility::saveDebugLog('Room Gallery Index::');
            return view('admin.room.gallery', compact('room_galleries', 'id'));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function roomGalleryStore(RoomGalleryCreateRequest $request)
    {
        try {
            $gallery_data = $this->galleryRepository->roomGalleryStore((array) $request->all());
            Utility::saveDebugLog('Room Gallery Store::');
            if ($gallery_data == 200) {
                return back()->with(['success_msg' => 'Room Gallery Store Success']);
            } else {
                return back()->withErrors(['error_msg' => 'Room Gallery Store Fail!']);
            }
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function roomGalleryEdit($id)
    {
        try {
            $gallery_res = $this->galleryRepository->roomGalleryEdit((int) $id);
            Utility::saveDebugLog('Room Gallery Edit::');
            if ($gallery_res['statusCode'] == 200) {
                $gallery_update = $gallery_res['gallery_res'];
                return view('admin.room.gallery', compact('gallery_update'));
            } else {
                abort(404);
            }
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
    public function roomGalleryUpdate(RoomGalleryUpdateRequest $request)
    {
        try {
            if ($request->file == null) {
                return to_route('roomGalleryIndex', $request->room_id)
                    ->with(['success_msg' => 'Room Gallery Update Successfully.']);
            } else {
                $result = $this->galleryRepository->roomGalleryUpdate((array) $request->all());
                Utility::saveDebugLog('Room Gallery Update::');
                if ($result == 200) {
                    return to_route('roomGalleryIndex', $request->room_id)
                        ->with(['success_msg' => 'Room Gallery Update Successfully.']);
                } else {
                    return to_route('roomGalleryIndex', $request->room_id)
                        ->withErrors(['error_msg' => 'Room Gallery Update Fail!']);
                }
            }
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function roomGalleryDelete($id)
    {
        try {
            $this->galleryRepository->roomGalleryDelete((int) $id);
            Utility::saveDebugLog("Room Gallery Delete::");
            return back()->with('success_msg', 'Room Gallery Deleted.');
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
}
