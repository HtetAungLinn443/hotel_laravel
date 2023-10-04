<?php

namespace App\Repository\Reservation;

use Exception;
use App\Utility;
use App\Constant;
use Carbon\Carbon;
use App\Models\Room;
use App\ReturnMessage;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use App\Repository\Reservation\ReservationRepositoryInterface;

class ReservationRepository implements ReservationRepositoryInterface
{
    public function store(array $data)
    {
        DB::connection()->enableQueryLog();
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        DB::beginTransaction();
        try {
            $roomId = $data['roomId'];
            $roomData       = Room::find($roomId);
            $isExtraBed     = array_key_exists("is_extra_bed", $data) ? '1' : '0';
            $checkIn        = Carbon::parse($data['checkIn']);
            $checkOut       = Carbon::parse($data['checkOut']);
            $daffInDay      =  $checkIn->diffInDays($checkOut);
            if ($isExtraBed == 0) {
                $totalPrice = $roomData->price_per_day * $daffInDay;
            } else {
                $totalPrice = ($roomData->price_per_day + $roomData->extra_bed_price_per_day) * $daffInDay;
            }
            $name = $data['userName'];
            $email = $data['email'];
            $phone = $data['phone'];
            $customerId = self::getCustomerId($name, $email, $phone);
            $paramObj                   = new Booking();
            $paramObj->room_id          = $roomId;
            $paramObj->customer_id      = $customerId;
            $paramObj->is_extra_bed     = $isExtraBed;
            $paramObj->price            = $totalPrice;
            $paramObj->check_in_date    = $checkIn->format('Y-m-d');
            $paramObj->check_out_date   = $checkOut->format('Y-m-d');
            $tempObj                    = Utility::addCreated($paramObj);
            $tempObj->save();
            DB::commit();
            $returnObj['statusCode'] = ReturnMessage::OK;
            Utility::saveDebugLog('Frontend Reservation Store::');
            return $returnObj;
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            DB::rollback();
            $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnObj;
        }
    }
    private static function getCustomerId($name, $email, $phone)
    {
        $customerId = '';
        $customer = Customer::select('id')
            ->where('name', $name)
            ->where('email', $email)
            ->where('phone', $phone)
            ->whereNull('deleted_at')
            ->first();

        if ($customer == null) {
            $paramObj           = new Customer();
            $paramObj->name     = $name;
            $paramObj->email    = $email;
            $paramObj->phone    = $phone;
            $tempObj            = Utility::addCreated($paramObj);
            $tempObj->save();
            $customerId = $tempObj->id;
        } else {
            $customerId = $customer->id;
        }
        return $customerId;
    }

    // admin booking list
    public function getBookingLists()
    {
        $results = Booking::select(
            'id',
            'room_id',
            'customer_id',
            'is_extra_bed',
            'price',
            'check_in_date',
            'check_out_date',
            'status'
        )->whereNull('deleted_at')
            ->orderBy('status', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(Constant::PAGE_LIMIT);
        return $results;
    }

    public function bookingConfirm(int $id)
    {
        $booking            = Booking::find($id);
        $room_id            = $booking->room_id;
        $check_in_date      = $booking->check_in_date;
        $check_out_date     = $booking->check_out_date;

        $check_in_cnt = Booking::where('check_in_date', '<=', $check_in_date)
            ->where('check_out_date', '>=', $check_in_date)
            ->where('status', Constant::BOOKING_AVAILABLE)
            ->where('room_id', $room_id)
            ->whereNull('deleted_at')
            ->count();
        $check_out_cnt = Booking::where('check_in_date', '<=', $check_out_date)
            ->where('check_out_date', '>=', $check_out_date)
            ->where('status', Constant::BOOKING_AVAILABLE)
            ->where('room_id', $room_id)
            ->whereNull('deleted_at')
            ->count();
        if ($check_in_cnt === 0 && $check_out_cnt === 0) {
            $booking->status = Constant::BOOKING_AVAILABLE;
            $booking->save();
            return true;
        } else {
            return false;
        }
    }

    public function bookingCancel(int $id)
    {
        $paramObj   = Booking::find($id);
        $tempObj    = Utility::addDelete($paramObj);
        $tempObj->save();
    }
}
