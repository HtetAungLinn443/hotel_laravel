<?php

namespace App\Repository\View;

interface ViewRepositoryInterface
{
    public function getViews();
    public function viewCreated(array $data);
}