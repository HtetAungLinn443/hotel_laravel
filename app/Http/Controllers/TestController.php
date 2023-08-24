<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $string = 'Test String';
        $array = [
            'name' => 'Htet Aung Linn',
            'age' => 23,

        ];
        return view('test.index', compact('string', 'array'));
    }
}