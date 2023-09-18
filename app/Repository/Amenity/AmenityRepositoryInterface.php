<?php

namespace App\Repository\Amenity;

interface AmenityRepositoryInterface
{
    public function getAmenities();
    public function amenityCreated(array $data);
    public function amenityUpdated(array $data);
    public function amenityDeleted(int $id);
    public function getAmenityByRoomId(int $id);
}
