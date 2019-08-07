<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorsController extends Controller
{
    public function error($type)
    {
        if($type == "404") {
            $error = "404 - The Page can't be found";
        }

        return view('error', compact('error'));
    }
}
