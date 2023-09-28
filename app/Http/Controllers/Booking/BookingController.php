<?php

namespace App\Http\Controllers\Booking;

use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Reservation\ReservationConfirmRequest;
use App\Repository\Reservation\ReservationRepositoryInterface;
use Exception;

class BookingController extends Controller
{
    private ReservationRepositoryInterface $repository;
    public function __construct(ReservationRepositoryInterface $repository)
    {
        DB::connection()->enableQueryLog();
        $this->repository = $repository;
    }
    public function bookingLists()
    {
        try {
            $lists = $this->repository->getBookingLists();
            Utility::saveDebugLog("Reservation Listing::");
            return view('admin.reservation.list', compact('lists'));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function bookingConfirm( $id)
    {
        try {
            $result = $this->repository->bookingConfirm((int) $id);
            Utility::saveDebugLog("Booking Confirm::");
            
            if($result){
                return back()->with(['success_msg' => 'Successfully Booking Confirm']);
            }else{
                return back()->with(['error_msg' => 'This room is alerady Booking']);
            }

        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
}
