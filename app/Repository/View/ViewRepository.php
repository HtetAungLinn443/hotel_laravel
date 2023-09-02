<?php

namespace App\Repository\View;

use App\Models\View;
use App\Repository\View\ViewRepositoryInterface;

class ViewRepository implements ViewRepositoryInterface
{
    public function getViews()
    {
        $views = View::select('id', 'name')
            ->orderBy('id', 'desc')
            ->whereNull('deleted_at')
            ->get();
        return $views;
    }

    public function viewCreated(array $data)
    {
        //
    }
}