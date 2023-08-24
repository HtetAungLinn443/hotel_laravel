<?php

namespace App\Http\Controllers;

use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function viewCreate()
    {
        $datas = View::whereNull('deleted_at')->get();
        return view('test.view_create', compact('datas'));
    }

    public function ViewStore(Request $request)
    {
        View::insert([
            'name' => $request->name,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return to_route('createForm');
    }
}
