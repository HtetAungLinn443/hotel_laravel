<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use App\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Room\RoomRepositoryInterface;
use App\Repository\Amenity\AmenityRepositoryInterface;
use App\Repository\Feature\FeatureRepositoryInterface;
use App\Repository\RoomGallery\RoomGalleryRepositoryInterface;

class FrontendController extends Controller
{
    private RoomRepositoryInterface $repository;
    public function __construct(RoomRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index(){
        try{
            $rooms = $this->repository->getRandomRoom();
            Utility::saveDebugLog("Room Listing::");
            return view('frontend.home.index',compact('rooms'));
        }catch(Exception $e){
             Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function details($id)
    {
        try{
            $room = $this->repository->roomEdit((int) $id);
            $amenity = $this->repository->getRoomAmenity((int $id));
            $feature = $this->repository->getRoomFeature((int $id));
            Utility::saveDebugLog('Frontend Room Details::');
            return view('frontend.home.detail', compact('room'));
        }catch(Exception $e){
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
}
