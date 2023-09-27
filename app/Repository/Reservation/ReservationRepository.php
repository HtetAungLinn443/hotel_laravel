<?php

namespace App\Repository\Reservation;

use App\Models\Booking;
use Exception;
use App\Utility;
use App\Models\Room;
use App\ReturnMessage;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use App\Repository\Reservation\ReservationRepositoryInterface;
use Carbon\Carbon;

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
            $paramObj->check_out_date   = $checkOut;
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
}
