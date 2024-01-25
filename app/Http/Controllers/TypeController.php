<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function showOne($id)
    {
        // $res = $id * $id;
        // echo"<h1>stroka $id</h1>";

        $types = [
            1 => "страница 1",
            2 => "страница 2",
            3 => "страница 3",
            4 => "страница 4",
            5 => "страница 5",
        ];

        foreach ($types as $key =>$type) { 
            if($key == $id) {
                $res = $type;
                echo $res;
            }
        }
        if (empty($res)) {
            echo "Error";
        }
    }

    public function showAll()
    {
        echo"<h1>vo na 2</h1>";
    }
    
}
