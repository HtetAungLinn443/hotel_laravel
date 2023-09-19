<?php

namespace App\Repository\Room;

interface RoomRepositoryInterface
{
    public function getRooms();
    public function roomCreated(array $data);
    public function roomEdit(int $id);
    public function roomUpdated(array $data);
    public function roomDeleted(int $id);
    public function getRandomRoom();
    public function getRoomAmenity(int $id);
    public function getRoomFeature(int $id);
}
