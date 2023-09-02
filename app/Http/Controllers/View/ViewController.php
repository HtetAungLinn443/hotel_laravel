<?php

namespace App\Http\Controllers\View;

use App\Repository\View\ViewRepositoryInterface;
use Carbon\Carbon;
use App\Models\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\View\ViewCreateRequest;
use App\Http\Requests\View\ViewUpdateRequest;

class ViewController extends Controller
{
    private ViewRepositoryInterface $service;
    public function __construct(ViewRepositoryInterface $service)
    {
        $this->service = $service;
    }

    public function viewLists()
    {
        $views = $this->service->getViews();
        return view('admin.view.list', compact('views'));
    }
    public function viewCreate()
    {
        return view('admin.view.form');
    }

    public function viewStore(ViewCreateRequest $request)
    {
        $data = $this->service->viewCreated((array) $request->all());
        $dateTime = Carbon::now();
        $userId = Auth::guard()->user()->id;
        $data = [
            'name' => $request->name,
            'created_by' => $userId,
            'updated_by' => $userId,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ];
        View::create($data);
        return to_route('viewLists')
            ->with(['success_msg' => 'Room View Create Successfully!']);
    }

    public function viewEdit($id)
    {
        $view_data = View::find($id);
        return view('admin.view.form', compact('view_data'));
    }

    public function viewUpdate(ViewUpdateRequest $request)
    {
        $view = $this->service->getUpdate();
    }
}