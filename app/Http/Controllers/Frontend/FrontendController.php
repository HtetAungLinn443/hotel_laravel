<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repository\Room\RoomRepositoryInterface;
use App\Http\Requests\Frontend\ReserveCreateRequest;
use App\Repository\Reservation\ReservationRepositoryInterface;

class FrontendController extends Controller
{
    private RoomRepositoryInterface $repository;
    private ReservationRepositoryInterface $reservationRepository;
    public function __construct(
        RoomRepositoryInterface $repository,
        ReservationRepositoryInterface $reservationRepository
    ) {
        DB::connection()->enableQueryLog();
        $this->repository               = $repository;
        $this->reservationRepository    = $reservationRepository;
    }
    public function index()
    {
        try {
            $rooms = $this->repository->getRandomRoom();
            Utility::saveDebugLog("Room Listing::");
            return view('frontend.home.index', compact('rooms'));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function details($id)
    {
        try {
            $room = $this->repository->roomEdit((int) $id);
            $amenities = $this->repository->getRoomAmenity((int) $id);
            $features = $this->repository->getRoomFeature((int) $id);
            Utility::saveDebugLog('Frontend Room Details::');
            return view('frontend.home.detail', compact(
                'room',
                'amenities',
                'features'
            ));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
    public function getRooms()
    {
        try {
            $rooms = $this->repository->getRooms();
            return view('frontend.room.index', compact('rooms'));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
    public function about()
    {
        return view('frontend.about.index');
    }

    public function contact()
    {
        return view('frontend.contact.index');
    }

    public function roomReserve($id)
    {
        $room = $this->repository->roomEdit((int) $id);
        return view('frontend.room.reserve', compact('room'));
    }
    public function roomBooking(ReserveCreateRequest $request)
    {
        $result = $this->reservationRepository->store((array) $request->all());
        return $result;
    }
}
