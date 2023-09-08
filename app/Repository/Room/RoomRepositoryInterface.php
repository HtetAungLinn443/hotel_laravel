<?php

namespace App\Repository\Room;

interface RoomRepositoryInterface
{
    public function getRooms();
    public function roomCreated(array $data);
    // public function viewUpdated(array $data);
    // public function viewDeleted(int $id);
}
