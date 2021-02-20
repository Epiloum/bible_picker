<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bible extends Controller
{
    public function index()
    {
        return view('index', ['title' => ': 비대면 모임을 위한 간편한 성경공유']);
    }

    public function show()
    {
        return view('show', ['user' => '']);
    }
}
