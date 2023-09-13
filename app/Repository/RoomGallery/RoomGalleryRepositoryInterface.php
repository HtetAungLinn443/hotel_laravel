<?php

namespace App\Repository\RoomGallery;

interface RoomGalleryRepositoryInterface
{
    public function getRoomGallerires(int $id);
    public function roomGalleryStore(array $data);
    // public function roomCreated(array $data);
    // public function viewUpdated(array $data);
    // public function viewDeleted(int $id);
}
