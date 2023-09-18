<?php

namespace App\Http\Controllers\View;

use Exception;
use App\Utility;
use App\Models\View;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\View\ViewCreateRequest;
use App\Http\Requests\View\ViewUpdateRequest;
use App\Repository\View\ViewRepositoryInterface;

class ViewController extends Controller
{
    private ViewRepositoryInterface $repository;
    public function __construct(ViewRepositoryInterface $repository)
    {
        DB::connection()->enableQueryLog();
        $this->repository = $repository;
    }

    public function viewLists()
    {
        try {
            $views = $this->repository->getViews();
            Utility::saveDebugLog("View Listing");
            return view('admin.view.list', compact('views'));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
    public function viewCreate()
    {
        try {
            return view('admin.view.form');
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function viewStore(ViewCreateRequest $request)
    {
        try {
            $result = $this->repository->viewCreated((array) $request->all());
            Utility::saveDebugLog("View Store::");
            if ($result['statusCode'] == 200) {
                return to_route('viewLists')
                    ->with(['success_msg' => 'Room View Create Successfully!']);
            } elseif ($result['statusCode'] == 404) {
                abort(404);
            } else {
                abort(500);
            }
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function viewEdit($id)
    {
        try {
            $view_data = View::find($id);
            Utility::saveDebugLog("View Edit::");
            return view('admin.view.form', compact('view_data'));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function viewUpdate(ViewUpdateRequest $request)
    {
        try {
            $result = $this->repository->viewUpdated((array) $request->all());
            Utility::saveDebugLog("View Update::");
            if ($result['statusCode'] == 200) {
                return to_route('viewLists')
                    ->with(['success_msg' => 'Room View Update Successfully!']);
            } elseif ($result['statusCode'] == 404) {
                abort(404);
            } else {
                abort(500);
            }
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function viewDelete($id)
    {
        try {
            $delete = $this->repository->viewDeleted((int) $id);
            Utility::saveDebugLog("View Deleted::");
            return redirect()->back()->with('success_msg', 'Room View Deleted!');
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
}
