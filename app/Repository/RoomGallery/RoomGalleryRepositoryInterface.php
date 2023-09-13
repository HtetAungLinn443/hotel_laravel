<?php

namespace App\Repository\RoomGallery;

interface RoomGalleryRepositoryInterface
{
    public function getRoomGallerires(int $id);
    public function roomGalleryStore(array $data);
    public function roomGalleryEdit(int $id);
    public function roomGalleryUpdate(array $data);
    public function roomGalleryDelete(int $id);
}
