<?php

namespace App\Http\Controllers\Bed;

use Exception;
use App\Utility;
use App\Models\BedType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bed\BedCreateRequest;
use App\Http\Requests\Bed\BedUpdateRequest;
use App\Repository\Bed\BedRepositoryInterface;

class BedController extends Controller
{
    private BedRepositoryInterface $repository;
    public function __construct(BedRepositoryInterface $repository)
    {
        DB::connection()->enableQueryLog();
        $this->repository = $repository;
    }

    public function bedLists()
    {
        try {
            $beds = $this->repository->getBeds();
            Utility::saveDebugLog("Bed Listing::");
            return view('admin.bed.list', compact('beds'));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
    public function bedCreate()
    {
        try {
            Utility::saveDebugLog("Bed Create::");
            return view('admin.bed.form');
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function bedStore(BedCreateRequest $request)
    {
        try {
            $result = $this->repository->bedCreated((array) $request->all());
            Utility::saveDebugLog("Bed Store::");
            if ($result['statusCode'] == 200) {
                return to_route('bedLists')
                    ->with(['success_msg' => 'Room Bed Create Successfully!']);
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

    public function bedEdit($id)
    {
        try {
            $bed_data = BedType::find($id);
            Utility::saveDebugLog("Bed Edit::");
            return view('admin.bed.form', compact('bed_data'));
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }

    public function bedUpdate(BedUpdateRequest $request)
    {
        try {
            $result = $this->repository->bedUpdated((array) $request->all());
            Utility::saveDebugLog("Bed Update::");
            if ($result['statusCode'] == 200) {
                return to_route('bedLists')
                    ->with(['success_msg' => 'Room Bed Update Successfully!']);
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

    public function bedDelete($id)
    {
        try {
            $delete     = $this->repository->bedDeleted((int) $id);
            Utility::saveDebugLog("Bed Delete::");
            return redirect()->back()->with('success_msg', 'Room Bed Deleted!');
        } catch (Exception $e) {
            Utility::saveErrorLog($e->getMessage());
            abort(500);
        }
    }
}
