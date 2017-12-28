<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LEDController extends Controller
{
    public function index()
    {
        $status = file_get_contents("buttonStatus.txt");
        return view('led', ['status' => $status]);
    }
}
