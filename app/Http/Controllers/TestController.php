<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function sum($num1, $num2) {
        return $num1 + $num2;
    }
}
