<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetController
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
