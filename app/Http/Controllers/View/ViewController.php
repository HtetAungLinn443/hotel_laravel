<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Requests\View\ViewCreateRequest;

class ViewController extends Controller
{
    public function viewCreate()
    {
        return view('admin.view.form');
    }

    public function viewStore(ViewCreateRequest $request)
    {
        dd($request->all());
    }
}