<?php

namespace App\Repository\Reservation;

use App\Models\Customer;
use Exception;
use App\Utility;
use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use App\Repository\Reservation\ReservationRepositoryInterface;

class ReservationRepository implements ReservationRepositoryInterface
{
    public function store(array $data)
    {
        $returnObj = array();
        $returnObj['statusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        DB::beginTransaction();
        try {
            $name = $data['userName'];
            $email = $data['email'];
            $phone = $data['phone'];
            $customerId = self::getCustomerId($name, $email, $phone);
            dd($customerId);
            DB::commit();
        } catch (Exception $e) {
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
            $paramObj           = new Customer;
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
