<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Reservation\ReservationRepositoryInterface;

class BookingController extends Controller
{
    private ReservationRepositoryInterface $repository;
    public function __construct(ReservationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function bookingLists()
    {
        $lists = $this->repository->getBookingLists();
        return view('admin.reservation.list', compact('lists'));
    }
}
