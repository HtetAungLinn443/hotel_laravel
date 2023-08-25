<?php

namespace App\Http\Controllers;

use App\Http\Requests\View\ViewStoreRequest;
use App\Http\Requests\View\ViewUpdateRequest;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function viewCreate()
    {
        return view('test.view_create');
    }

    public function ViewStore(ViewStoreRequest $request)
    {
        View::insert([
            'name' => $request->name,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return to_route('viewIndex')->with(['success' => 'Room View Create Successfully!']);
    }
    public function viewIndex()
    {
        $view_datas = View::select('id', 'name')
            ->whereNull('deleted_at')
            ->get();
        return view('test.view_index', compact('view_datas'));
    }

    public function viewEdit($id)
    {
        $view_data = View::find($id);
        return view('test.view_create', compact('view_data'));
    }
    public function viewUpdate(ViewUpdateRequest $request)
    {
        View::where('id', $request->id)->update(['name' => $request->name]);
        return redirect()
            ->route('viewIndex')
            ->with(['success' => 'Room View Update Successfuly!']);
    }
    public function viewDelete($id)
    {
        View::where('id', $id)->update([
            'deleted_at' => Carbon::now(),
            'deleted_by' => 1
        ]);

        return redirect()
            ->route('viewIndex')
            ->with(['deleted' => 'View Name Deleted!']);
    }
}