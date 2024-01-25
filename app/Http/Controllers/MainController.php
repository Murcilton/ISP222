<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $title = 'Admin';
        $enter = users::orderBy('id', 'desc')->get();
        return view('admin.main', compact('title', 'enter'));
    }
}
