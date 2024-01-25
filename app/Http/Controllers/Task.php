<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Task extends Controller
{
    public function show(){

        $title = 'Задание тайтл страницы';
        return view('task', compact('title'));
    }
}
