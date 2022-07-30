<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetController extends Controller
{
    public function greet(Request $request)
    {
        $array = [["test
        "]];
        $name = $request->get("name");


        return [
            'name' => $name
        ];
    }
}
