<?php

namespace App\Repository\Reservation;

interface ReservationRepositoryInterface
{
    public function store(array $data);
    public function getBookingLists();
    public function bookingConfirm(int $id);
}
