<?php

namespace App\Repository\Bed;

interface BedRepositoryInterface
{
    public function getBeds();
    public function bedCreated(array $data);
    public function bedUpdated(array $data);
    public function bedDeleted(int $id);
}
