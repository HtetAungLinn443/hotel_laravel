<?php

namespace App\Repository\View;

interface ViewRepositoryInterface
{
    public function getViews();
    public function viewCreated(array $data);
    public function viewUpdated(array $data);
    public function viewDeleted(int $id);
}
