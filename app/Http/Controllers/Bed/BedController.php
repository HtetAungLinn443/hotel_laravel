<?php

namespace App\Http\Controllers\Bed;

use Exception;
use App\Models\BedType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bed\BedCreateRequest;
use App\Http\Requests\Bed\BedUpdateRequest;
use App\Repository\Bed\BedRepositoryInterface;

class BedController extends Controller
{
    private BedRepositoryInterface $repository;
    public function __construct(BedRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function bedLists()
    {
        try {
            $beds = $this->repository->getBeds();
            return view('admin.bed.list', compact('beds'));
        } catch (Exception $e) {
            $e->getMessage();
            abort(500);
        }
    }
    public function bedCreate()
    {
        try {
            return view('admin.bed.form');
        } catch (Exception $e) {
            $e->getMessage();
            abort(500);
        }
    }

    public function bedStore(BedCreateRequest $request)
    {
        try {
            $result = $this->repository->bedCreated((array) $request->all());
            if ($result['statusCode'] == 200) {
                return to_route('bedLists')
                    ->with(['success_msg' => 'Room Bed Create Successfully!']);
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

    public function bedEdit($id)
    {
        try {
            $bed_data = BedType::find($id);
            return view('admin.bed.form', compact('bed_data'));
        } catch (Exception $e) {
            $e->getMessage();
            abort(500);
        }
    }

    public function bedUpdate(BedUpdateRequest $request)
    {
        try {
            $result = $this->repository->bedUpdated((array) $request->all());
            if ($result['statusCode'] == 200) {
                return to_route('bedLists')
                    ->with(['success_msg' => 'Room Bed Update Successfully!']);
            } elseif ($result['statusCode'] == 404) {
                abort(404);
            } else {
                abort(500);
            }
        } catch (Exception $e) {
            abort(500);
        }
    }

    public function bedDelete($id)
    {
        try {
            $delete     = $this->repository->bedDeleted((int) $id);
            return redirect()->back()->with('success_msg', 'Room Bed Deleted!');
        } catch (Exception $e) {
            abort(500);
        }
    }
}
