<?php

namespace App\Http\Controllers\View;

use App\Repository\View\ViewRepositoryInterface;
use App\Models\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\View\ViewCreateRequest;
use App\Http\Requests\View\ViewUpdateRequest;
use Exception;
use PhpParser\Node\Stmt\Else_;

class ViewController extends Controller
{
    private ViewRepositoryInterface $repository;
    public function __construct(ViewRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function viewLists()
    {
        try {
            $views = $this->repository->getViews();
            return view('admin.view.list', compact('views'));
        } catch (Exception $e) {
            $e->getMessage();
            abort(500);
        }
    }
    public function viewCreate()
    {
        try {
            return view('admin.view.form');
        } catch (Exception $e) {
            $e->getMessage();
            abort(500);
        }
    }

    public function viewStore(ViewCreateRequest $request)
    {
        try {
            $result = $this->repository->viewCreated((array) $request->all());
            if ($result['statusCode'] == 200) {
                return to_route('viewLists')
                    ->with(['success_msg' => 'Room View Create Successfully!']);
            } elseif ($result['statusCode'] == 404) {
                abort(404);
            } else {
                abort(500);
            }
        } catch (Exception $e) {
            $e->getMessage();
            abort(500);
        }
    }

    public function viewEdit($id)
    {
        try {
            $view_data = View::find($id);
            return view('admin.view.form', compact('view_data'));
        } catch (Exception $e) {
            $e->getMessage();
            abort(500);
        }
    }

    public function viewUpdate(ViewUpdateRequest $request)
    {
        try {
            $result = $this->repository->viewUpdated((array) $request->all());
            if ($result['statusCode'] == 200) {
                return to_route('viewLists')
                    ->with(['success_msg' => 'Room View Update Successfully!']);
            } elseif ($result['statusCode'] == 404) {
                abort(404);
            } else {
                abort(500);
            }
        } catch (Exception $e) {
            abort(500);
        }
    }

    public function viewDelete($id)
    {
        try {
            $delete     = $this->repository->viewDeleted((int) $id);
            return redirect()->back()->with('success_msg', 'Room View Deleted!');
        } catch (Exception $e) {
            abort(500);
        }
    }
}
