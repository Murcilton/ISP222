<?php

namespace App\Http\Controllers;

use App\Models\enter;
use Illuminate\Http\Request;

class EnterControlle extends Controller
{
    public function success()
    {
        $title = 'Home Page';
        $enter = enter::orderBy('id', 'desc')->get();
        return view('success', compact('title', 'enter'));
    }

    public function create2()
    {
        $title = 'Create Account';
        $account = enter::pluck('name', 'mail', 'phone')->all();
        return view('enter', compact('title', 'account'));
    }

    public function store2(Request $request)
    {
        // dump($request->input('title'));
        // dump($request->input('content'));
        // dump($request->input('rubric_id'));
        // dd($request->all());

        $this->validate($request, [
            'name' => 'required',
            'mail' => 'required|email',
            'phone' => 'required|regex:/[0-9]{9}/',
        ]);

        enter::create($request->all());

        return redirect()->route('success');
    }
}